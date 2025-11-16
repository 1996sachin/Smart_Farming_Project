import __future__ 
import pandas as pd
import joblib
import numpy as np
import matplotlib.pyplot as plt
from sklearn.metrics import classification_report
from sklearn.metrics import confusion_matrix
from sklearn.metrics import cohen_kappa_score
from sklearn import metrics
from sklearn import tree
import sys
import json
import warnings
import os
warnings.filterwarnings('ignore')

# Get the script directory to ensure we can find the model file
script_dir = os.path.dirname(os.path.abspath(__file__))

# Parse command line arguments
jsonn = sys.argv[1]
jsonp = sys.argv[2]
jsonk = sys.argv[3]
jsont = sys.argv[4]
jsonh = sys.argv[5]
jsonph = sys.argv[6]
jsonr = sys.argv[7]

# Debug: Print received arguments to stderr
print("Received arguments:", file=sys.stderr)
print(f"  N: {jsonn}", file=sys.stderr)
print(f"  P: {jsonp}", file=sys.stderr)
print(f"  K: {jsonk}", file=sys.stderr)
print(f"  T: {jsont}", file=sys.stderr)
print(f"  H: {jsonh}", file=sys.stderr)
print(f"  PH: {jsonph}", file=sys.stderr)
print(f"  R: {jsonr}", file=sys.stderr)

# Parse JSON arguments
try:
    n_params = json.loads(jsonn)
    p_params = json.loads(jsonp)
    k_params = json.loads(jsonk)
    t_params = json.loads(jsont)
    h_params = json.loads(jsonh)
    ph_params = json.loads(jsonph)
    r_params = json.loads(jsonr)
    
    # Debug: Print parsed values
    print("Parsed values:", file=sys.stderr)
    print(f"  N: {n_params}, P: {p_params}, K: {k_params}, T: {t_params}, H: {h_params}, PH: {ph_params}, R: {r_params}", file=sys.stderr)
except json.JSONDecodeError as e:
    print(f"Error parsing JSON arguments: {e}", file=sys.stderr)
    sys.exit(1)

# Load the model using absolute path
model_path = os.path.join(script_dir, 'croprecommendation.pkl')
if not os.path.exists(model_path):
    print(f"Error: Model file not found at {model_path}", file=sys.stderr)
    sys.exit(1)

with open(model_path, 'rb') as f:
    fm = joblib.load(f)

# Prepare data array - order: N, P, K, Temperature, Humidity, PH, Rainfall
# Create DataFrame with feature names to match training data format
data_dict = {
    'N': [n_params],
    'P': [p_params],
    'K': [k_params],
    'temperature': [t_params],
    'humidity': [h_params],
    'ph': [ph_params],
    'rainfall': [r_params]
}
data_df = pd.DataFrame(data_dict)

# Debug: Print input data
print(f"Input data DataFrame:", file=sys.stderr)
print(data_df, file=sys.stderr)

# Get predictions using DataFrame (with feature names)
prediction = fm.predict_proba(data_df)[0]
crop_labels = fm.classes_
crop_probs = list(zip(crop_labels, prediction))

# Debug: Print top 5 predictions
sorted_probs = sorted(crop_probs, key=lambda x: x[1], reverse=True)
print("Top 5 predictions:", file=sys.stderr)
for crop, prob in sorted_probs[:5]:
    print(f"  {crop}: {prob:.4f}", file=sys.stderr)

# Output JSON to stdout
print(json.dumps(crop_probs))

