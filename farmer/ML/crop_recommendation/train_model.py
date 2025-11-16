#!/usr/bin/env python3
"""
Crop Recommendation Model Training Script
This script trains a RandomForestClassifier on the crop recommendation dataset
and saves the trained model for use in the recommendation system.
"""

import pandas as pd
import numpy as np
import joblib
import os
import sys
from sklearn.model_selection import train_test_split, cross_val_score
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import classification_report, accuracy_score, confusion_matrix
import warnings
warnings.filterwarnings('ignore')

# Get the script directory
script_dir = os.path.dirname(os.path.abspath(__file__))

# File paths
csv_path = os.path.join(script_dir, 'Crop_recommendation.csv')
model_path = os.path.join(script_dir, 'croprecommendation.pkl')

def load_data():
    """Load the crop recommendation dataset"""
    print("=" * 60)
    print("Loading Dataset...")
    print("=" * 60)
    
    if not os.path.exists(csv_path):
        print(f"Error: Dataset file not found at {csv_path}")
        sys.exit(1)
    
    crops = pd.read_csv(csv_path)
    print(f"Dataset loaded: {len(crops)} rows, {len(crops.columns)} columns")
    print(f"\nDataset Info:")
    print(crops.info())
    print(f"\nFirst 5 rows:")
    print(crops.head())
    print(f"\nUnique crops: {crops['label'].nunique()}")
    print(f"Crop distribution:")
    print(crops['label'].value_counts())
    
    return crops

def prepare_features(crops):
    """Prepare features and target variables"""
    print("\n" + "=" * 60)
    print("Preparing Features...")
    print("=" * 60)
    
    # Features: N, P, K, temperature, humidity, ph, rainfall
    features = crops[['N', 'P', 'K', 'temperature', 'humidity', 'ph', 'rainfall']]
    target = crops['label']
    
    print(f"Features shape: {features.shape}")
    print(f"Target shape: {target.shape}")
    print(f"\nFeature statistics:")
    print(features.describe())
    
    return features, target

def train_model(features, target):
    """Train the RandomForest model"""
    print("\n" + "=" * 60)
    print("Training Model...")
    print("=" * 60)
    
    # Split data into training and testing sets
    X_train, X_test, y_train, y_test = train_test_split(
        features, target, test_size=0.2, random_state=42, stratify=target
    )
    
    print(f"Training set: {len(X_train)} samples")
    print(f"Test set: {len(X_test)} samples")
    
    # Create and train RandomForestClassifier
    # Using better parameters than the original (more trees for better accuracy)
    print("\nTraining RandomForestClassifier...")
    print("Parameters: n_estimators=100, random_state=42, criterion='entropy', max_depth=10")
    
    model = RandomForestClassifier(
        n_estimators=100,  # Increased from 5 for better accuracy
        random_state=42,
        criterion='entropy',
        max_depth=10,  # Added to prevent overfitting
        min_samples_split=5,
        min_samples_leaf=2,
        n_jobs=-1  # Use all available cores
    )
    
    model.fit(X_train, y_train)
    
    print("Model training completed!")
    
    return model, X_train, X_test, y_train, y_test

def evaluate_model(model, X_train, X_test, y_train, y_test):
    """Evaluate the trained model"""
    print("\n" + "=" * 60)
    print("Evaluating Model...")
    print("=" * 60)
    
    # Training accuracy
    train_pred = model.predict(X_train)
    train_accuracy = accuracy_score(y_train, train_pred)
    print(f"\nTraining Accuracy: {train_accuracy * 100:.2f}%")
    
    # Test accuracy
    test_pred = model.predict(X_test)
    test_accuracy = accuracy_score(y_test, test_pred)
    print(f"Test Accuracy: {test_accuracy * 100:.2f}%")
    
    # Classification report
    print("\nClassification Report:")
    print(classification_report(y_test, test_pred))
    
    # Cross-validation score
    print("\nPerforming 5-fold Cross-Validation...")
    cv_scores = cross_val_score(model, X_train, y_train, cv=5, scoring='accuracy')
    print(f"Cross-Validation Scores: {cv_scores}")
    print(f"Mean CV Accuracy: {cv_scores.mean() * 100:.2f}% (+/- {cv_scores.std() * 2 * 100:.2f}%)")
    
    # Feature importance
    print("\nFeature Importance:")
    feature_importance = pd.DataFrame({
        'feature': X_train.columns,
        'importance': model.feature_importances_
    }).sort_values('importance', ascending=False)
    print(feature_importance)
    
    return test_accuracy

def save_model(model):
    """Save the trained model"""
    print("\n" + "=" * 60)
    print("Saving Model...")
    print("=" * 60)
    
    # Backup existing model if it exists
    if os.path.exists(model_path):
        backup_path = model_path + '.backup'
        print(f"Backing up existing model to {backup_path}")
        import shutil
        shutil.copy2(model_path, backup_path)
    
    # Save the new model
    joblib.dump(model, model_path)
    print(f"Model saved successfully to {model_path}")
    
    # Verify the model can be loaded
    print("Verifying saved model...")
    loaded_model = joblib.load(model_path)
    print(f"Model verified! Model type: {type(loaded_model)}")
    print(f"Model classes: {len(loaded_model.classes_)} crops")

def main():
    """Main training function"""
    print("\n" + "=" * 60)
    print("CROP RECOMMENDATION MODEL TRAINING")
    print("=" * 60)
    
    try:
        # Load data
        crops = load_data()
        
        # Prepare features
        features, target = prepare_features(crops)
        
        # Train model
        model, X_train, X_test, y_train, y_test = train_model(features, target)
        
        # Evaluate model
        test_accuracy = evaluate_model(model, X_train, X_test, y_train, y_test)
        
        # Save model
        save_model(model)
        
        print("\n" + "=" * 60)
        print("TRAINING COMPLETED SUCCESSFULLY!")
        print("=" * 60)
        print(f"Final Test Accuracy: {test_accuracy * 100:.2f}%")
        print(f"Model saved to: {model_path}")
        print("=" * 60 + "\n")
        
    except Exception as e:
        print(f"\nError during training: {e}")
        import traceback
        traceback.print_exc()
        sys.exit(1)

if __name__ == "__main__":
    main()

