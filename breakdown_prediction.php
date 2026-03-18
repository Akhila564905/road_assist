<?php
session_start();

$result = null;
$risk_percent = 0;

if(isset($_POST['predict'])){

$data = [
$_POST['vehicle_type'] ?? 0,
$_POST['brand'] ?? 0,
$_POST['fuel_type'] ?? 0,
$_POST['vehicle_age'] ?? 0,
$_POST['days_since_last_service'] ?? 0,
$_POST['daily_usage_km'] ?? 0,
$_POST['total_km_driven'] ?? 0,
$_POST['service_history'] ?? 0,
$_POST['road_type'] ?? 0,
$_POST['traffic_level'] ?? 0,
$_POST['weather_condition'] ?? 0,
$_POST['engine_overheating'] ?? 0,
$_POST['abnormal_sound'] ?? 0,
$_POST['starting_trouble'] ?? 0,
$_POST['brake_issue'] ?? 0,
$_POST['smoke'] ?? 0,
$_POST['vibration'] ?? 0,
$_POST['engine_temperature'] ?? 0,
$_POST['battery_voltage'] ?? 0,
$_POST['oil_level'] ?? 0,
$_POST['tire_pressure'] ?? 0,
$_POST['fuel_efficiency'] ?? 0,
$_POST['battery_health'] ?? 0,
$_POST['charging_cycles'] ?? 0,
$_POST['motor_efficiency'] ?? 0
];

$command = "python predict.py " . implode(" ", $data);

// ✅ EXECUTE PYTHON
$output = shell_exec($command);

// ✅ DEBUG (optional)
// echo "<pre>$output</pre>";

$response = json_decode($output, true);

// ✅ SAFE CHECK
if($response && isset($response['risk'])){
    $result = $response['risk'];
    $risk_percent = $response['probability'];
}else{
    $result = "ERROR";
    $risk_percent = 0;
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Predict Breakdown</title>

<style>
body{
font-family:Segoe UI;
background:#f4f6fb;
margin:0;
}

.navbar{
display:flex;
justify-content:space-between;
padding:15px 40px;
background:white;
}

.container{padding:30px;}

.card{
background:white;
padding:20px;
border-radius:10px;
margin-bottom:20px;
}

.row{display:flex;gap:15px;}

.col{flex:1;}

input,select{
width:100%;
padding:10px;
margin-top:5px;
}

.predict-btn-main{
width:100%;
padding:15px;
background:#9333ea;
color:white;
border:none;
border-radius:8px;
}
</style>
</head>

<body>

<div class="container">

<h2>🚗 Breakdown Prediction</h2>

<form method="POST">

<input type="number" name="vehicle_type" placeholder="Vehicle Type">
<input type="number" name="brand" placeholder="Brand">
<input type="number" name="fuel_type" placeholder="Fuel Type">
<input type="number" name="vehicle_age" placeholder="Vehicle Age">

<input type="number" name="days_since_last_service" placeholder="Service Days">
<input type="number" name="daily_usage_km" placeholder="Daily KM">
<input type="number" name="total_km_driven" placeholder="Total KM">
<input type="number" name="service_history" placeholder="Service History">

<input type="number" name="road_type" placeholder="Road Type">
<input type="number" name="traffic_level" placeholder="Traffic">
<input type="number" name="weather_condition" placeholder="Weather">

<input type="number" name="engine_overheating" placeholder="Overheat">
<input type="number" name="abnormal_sound" placeholder="Sound">
<input type="number" name="starting_trouble" placeholder="Start Issue">
<input type="number" name="brake_issue" placeholder="Brake">
<input type="number" name="smoke" placeholder="Smoke">
<input type="number" name="vibration" placeholder="Vibration">

<input type="number" name="engine_temperature" placeholder="Temp">
<input type="number" name="battery_voltage" placeholder="Voltage">
<input type="number" name="oil_level" placeholder="Oil">
<input type="number" name="tire_pressure" placeholder="Tire">
<input type="number" name="fuel_efficiency" placeholder="Efficiency">

<input type="number" name="battery_health" placeholder="Battery">
<input type="number" name="charging_cycles" placeholder="Cycles">
<input type="number" name="motor_efficiency" placeholder="Motor">

<button type="submit" name="predict" class="predict-btn-main">
🔮 Predict Breakdown Risk
</button>

</form>

<?php if($result && $result != "ERROR"){ ?>

<div style="margin-top:20px; padding:20px;
background:<?php echo ($result=="HIGH")?"#ffe5e5":"#e6f7ec"; ?>">

<h2>
<?php echo $result; ?> - <?php echo $risk_percent; ?>%
</h2>

</div>

<?php } ?>

</div>

</body>
</html>