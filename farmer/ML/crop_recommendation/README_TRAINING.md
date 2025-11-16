# Crop Recommendation Model Training

## Overview
This directory contains the training script and dataset for the crop recommendation model.

## Files
- `train_model.py` - Training script to retrain the model
- `Crop_recommendation.csv` - Training dataset (2200 samples, 22 crop types)
- `croprecommendation.pkl` - Trained model file (saved after training)
- `recommend.py` - Prediction script (used by the web application)

## Training the Model

### Quick Start
To retrain the model, simply run:

```bash
cd /home/blink/smart-farming-advisor/farmer/ML/crop_recommendation
python3 train_model.py
```

### What the Script Does

1. **Loads the Dataset**: Reads `Crop_recommendation.csv` (2200 samples)
2. **Prepares Features**: Extracts 7 features (N, P, K, temperature, humidity, ph, rainfall)
3. **Splits Data**: 80% training, 20% testing
4. **Trains Model**: RandomForestClassifier with improved parameters:
   - 100 trees (n_estimators=100)
   - Max depth: 10
   - Criterion: entropy
   - Random state: 42 (for reproducibility)
5. **Evaluates Model**: 
   - Training accuracy
   - Test accuracy
   - Cross-validation scores
   - Feature importance
6. **Saves Model**: Saves to `croprecommendation.pkl` (backs up existing model)

### Expected Results

- **Test Accuracy**: ~99%+
- **Cross-Validation**: ~99%+ mean accuracy
- **Model Type**: RandomForestClassifier
- **Crop Classes**: 22 different crops

### Model Parameters

The current model uses:
- **Algorithm**: RandomForestClassifier
- **Trees**: 100 (increased from original 5)
- **Max Depth**: 10 (prevents overfitting)
- **Criterion**: entropy
- **Min Samples Split**: 5
- **Min Samples Leaf**: 2

### Feature Importance

Based on training, the most important features are:
1. Humidity (~22%)
2. Potassium (K) (~20%)
3. Rainfall (~18%)
4. Phosphorous (P) (~15%)
5. Nitrogen (N) (~14%)
6. Temperature (~7%)
7. PH (~3%)

## Updating the Dataset

To improve the model with new data:

1. Add new rows to `Crop_recommendation.csv` with format:
   ```
   N,P,K,temperature,humidity,ph,rainfall,label
   90,42,43,20.88,82.00,6.50,202.94,rice
   ```

2. Run the training script:
   ```bash
   python3 train_model.py
   ```

3. The new model will automatically be saved and used by the web application.

## Notes

- The script automatically backs up the existing model before saving a new one
- Training takes approximately 10-30 seconds depending on system
- The model is saved using `joblib` format for compatibility with scikit-learn

