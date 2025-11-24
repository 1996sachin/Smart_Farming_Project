
import json
import sys
from pathlib import Path

import joblib
import pandas as pd


BASE_DIR = Path(__file__).resolve().parent
MODEL_PATH = BASE_DIR / "cropprediction.pkl"

SEASON_NORMALIZATION = {
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


def load_arg(index: int) -> str:
    raw = sys.argv[index]
    try:
        return json.loads(raw)
    except json.JSONDecodeError:
        return raw


def normalize_season(value: str) -> str:
    key = value.strip().lower()
    normalized = SEASON_NORMALIZATION.get(key, value.strip())
    return normalized.title()


def main() -> None:
    model = joblib.load(MODEL_PATH)

    province = load_arg(1)
    district = load_arg(2)
    season_input = load_arg(3)
    season = normalize_season(season_input)

    sample = pd.DataFrame(
        [{
            "Province_Name": province.strip(),
            "District_Name": district.strip(),
            "Season": season
        }]
    )

    if hasattr(model, "predict_proba"):
        probabilities = model.predict_proba(sample)[0]
        labels = model.classes_
        sorted_idx = probabilities.argsort()[::-1]
        top_labels = [
            labels[idx]
            for idx in sorted_idx
            if probabilities[idx] > 0
        ][:15]
    else:
        top_labels = model.predict(sample)

    if not top_labels:
        print("No crop recommendation found for the selected inputs.")
        return

    print(", ".join(top_labels))


if __name__ == "__main__":
    main()