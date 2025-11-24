#!/usr/bin/env python3
"""Train the crop recommendation model with the new season names."""

from __future__ import annotations

import argparse
from pathlib import Path
from typing import Iterable

import joblib
import pandas as pd
from sklearn.compose import ColumnTransformer
from sklearn.pipeline import Pipeline
from sklearn.preprocessing import OneHotEncoder
from sklearn.tree import DecisionTreeClassifier

BASE_DIR = Path(__file__).resolve().parent
DATA_PATH = BASE_DIR / "Crops_prediction.csv"
PREPARED_DATA_PATH = BASE_DIR / "Crops_prediction_prepared.csv"
MODEL_PATH = BASE_DIR / "cropprediction.pkl"

SEASON_MAP = {
    "kharif": "Monsoon",
    "monsoon": "Monsoon",
    "mansoon": "Monsoon",
    "rabi": "Winter",
    "winter": "Winter",
    "summer": "Summer",
    "zaid": "Summer",
    "spring": "Spring",
    "autumn": "Autumn",
}

TARGET_SEASONS = ("Summer", "Winter", "Monsoon", "Spring", "Autumn")


def standardize_season(value: str) -> str:
    text = str(value).strip()
    mapped = SEASON_MAP.get(text.lower())
    return mapped if mapped else text.title()


def prepare_dataset(df: pd.DataFrame) -> pd.DataFrame:
    prepared = df.copy()
    prepared["Province_Name"] = prepared["Province_Name"].str.strip().str.title()
    prepared["District_Name"] = prepared["District_Name"].str.strip().str.title()
    prepared["Crop"] = prepared["Crop"].str.strip()
    prepared["Season"] = prepared["Season"].apply(standardize_season)

    base = prepared[prepared["Season"].isin(["Summer", "Winter", "Monsoon"])]

    spring = base[base["Season"] == "Summer"].copy()
    spring["Season"] = "Spring"

    autumn = base[base["Season"] == "Monsoon"].copy()
    autumn["Season"] = "Autumn"

    combined = pd.concat([base, spring, autumn], ignore_index=True)
    combined = combined.drop_duplicates()

    missing = set(TARGET_SEASONS) - set(combined["Season"].unique())
    if missing:
        raise ValueError(f"Missing seasons in prepared dataset: {missing}")

    return combined


def build_pipeline(max_depth: int | None, min_samples_leaf: int) -> Pipeline:
    categorical_features: Iterable[str] = ["Province_Name", "District_Name", "Season"]
    preprocessor = ColumnTransformer(
        transformers=[
            (
                "categorical",
                OneHotEncoder(handle_unknown="ignore"),
                list(categorical_features),
            )
        ],
        remainder="drop",
    )

    classifier = DecisionTreeClassifier(
        criterion="entropy",
        max_depth=max_depth,
        min_samples_leaf=min_samples_leaf,
        random_state=42,
    )

    return Pipeline(
        steps=[
            ("preprocessor", preprocessor),
            ("classifier", classifier),
        ]
    )


def train_model(args: argparse.Namespace) -> None:
    if not DATA_PATH.exists():
        raise FileNotFoundError(f"Dataset not found at {DATA_PATH}")

    raw_df = pd.read_csv(DATA_PATH)
    prepared_df = prepare_dataset(raw_df)
    prepared_df.to_csv(PREPARED_DATA_PATH, index=False)

    features = prepared_df[["Province_Name", "District_Name", "Season"]]
    target = prepared_df["Crop"]

    pipeline = build_pipeline(args.max_depth, args.min_samples_leaf)
    pipeline.fit(features, target)

    joblib.dump(pipeline, MODEL_PATH)

    print(
        f"Model trained on {len(prepared_df)} samples with seasons: "
        f"{', '.join(sorted(set(prepared_df['Season'].unique())))}"
    )
    print(f"Saved model to {MODEL_PATH}")
    print(f"Saved prepared dataset to {PREPARED_DATA_PATH}")


def parse_args() -> argparse.Namespace:
    parser = argparse.ArgumentParser(
        description="Train the crop prediction model with normalized seasons."
    )
    parser.add_argument(
        "--max-depth",
        type=int,
        default=None,
        help="Optional max depth for the decision tree (default: unlimited).",
    )
    parser.add_argument(
        "--min-samples-leaf",
        type=int,
        default=5,
        help="Minimum samples required at a leaf node (default: 5).",
    )
    return parser.parse_args()


if __name__ == "__main__":
    train_model(parse_args())

