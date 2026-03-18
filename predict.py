import sys
import json
import pandas as pd
from sklearn.ensemble import RandomForestClassifier

# Load dataset
data = pd.read_csv("vehicle_breakdown_dataset_500.csv")

features = [
    "vehicle_type","brand","fuel_type","vehicle_age",
    "days_since_last_service","daily_usage_km","total_km_driven","service_history",
    "road_type","traffic_level","weather_condition",
    "engine_overheating","abnormal_sound","starting_trouble","brake_issue","smoke","vibration",
    "engine_temperature","battery_voltage","oil_level","tire_pressure","fuel_efficiency",
    "battery_health","charging_cycles","motor_efficiency"
]

X = data[features]
y = data["breakdown_risk"]

# Train model
model = RandomForestClassifier(n_estimators=100)
model.fit(X, y)

# Get input from PHP
values = list(map(float, sys.argv[1:]))

if len(values) != 25:
    print(json.dumps({"error": "Need 25 inputs"}))
    sys.exit()

# Prediction
pred = model.predict([values])[0]
prob = model.predict_proba([values])[0][1]

result = {
    "risk": "HIGH" if pred == 1 else "LOW",
    "probability": round(prob * 100, 2)
}

print(json.dumps(result))