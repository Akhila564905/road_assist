<?php
session_start();
include('includes/dbconnection.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>User Dashboard</title>

<style>

body{
font-family:Segoe UI;
background:#f4f6fb;
margin:0;
}

/* NAVBAR */

.navbar{
display:flex;
justify-content:space-between;
align-items:center;
padding:15px 40px;
background:white;
border-bottom:1px solid #eee;
}

.logo{
font-weight:bold;
}

.nav-buttons{
display:flex;
gap:15px;
}

.nav-buttons button{
padding:10px 16px;
border:none;
border-radius:6px;
cursor:pointer;
font-weight:500;
}

.dashboard-btn{background:#e8f0ff;color:#2563eb;}
.predict-btn{background:#9333ea;color:white;}
.book-btn{background:#2563eb;color:white;}
.logout-btn{background:none;color:red;font-weight:bold;}

/* PAGE */

.container{
padding:30px 50px;
}

/* HEADER */

.header{
display:flex;
justify-content:space-between;
align-items:center;
}

/* ALERT */

.alert{
background:#fff3cd;
border:1px solid #ffeeba;
padding:15px;
border-radius:8px;
margin-top:20px;
display:flex;
justify-content:space-between;
}

/* STATS */

.stats{
display:flex;
gap:20px;
margin-top:25px;
}

.card{
background:white;
padding:20px;
border-radius:10px;
width:220px;
box-shadow:0 4px 10px rgba(0,0,0,0.05);
}

/* MAIN GRID */

.grid{
display:grid;
grid-template-columns:1fr 1fr;
gap:20px;
margin-top:30px;
}

/* REQUEST BOX */

.box{
background:white;
padding:20px;
border-radius:10px;
}

.request{
border:1px solid #eee;
padding:10px;
border-radius:8px;
margin-top:10px;
display:flex;
justify-content:space-between;
}

.status{
padding:4px 10px;
border-radius:20px;
font-size:12px;
}

.pending{background:#ffeeba;}
.accepted{background:#cce5ff;}
.completed{background:#d4edda;}

.high{
color:red;
font-weight:bold;
}

</style>
</head>

<body>

<div class="navbar">

<div class="logo">
OVBP Breakdown Prediction System
</div>

<div class="nav-buttons">

<button class="dashboard-btn">Dashboard</button>

<button class="predict-btn" onclick="window.location.href='breakdown_prediction.php'">Predict Breakdown</button>

<button class="book-btn" onclick="window.location.href='book_mechanic.php'">Book Mechanic</button>

<button class="logout-btn" onclick="window.location.href='index.php'">Logout</button>

</div>

</div>

<div class="container">

<div class="header">
<div>
<h2>User Dashboard</h2>
<p>Manage your vehicle safety and mechanic bookings</p>
</div>
</div>

<div class="alert">
<span>You have 1 completed service awaiting your feedback.</span>
<button>Rate Now</button>
</div>

<!-- STATS -->

<div class="stats">

<div class="card">
<h2>3</h2>
<p>Total Bookings</p>
</div>

<div class="card">
<h2>2</h2>
<p>Active</p>
</div>

<div class="card">
<h2>1</h2>
<p>Completed</p>
</div>

<div class="card">
<h2>2</h2>
<p>Risk Checks</p>
</div>

</div>

<!-- MAIN -->

<div class="grid">

<!-- BOOKING REQUESTS -->

<div class="box">

<h3>Mechanic Requests</h3>

<?php
$sql="SELECT * FROM booking_history";
$query=$dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

foreach($results as $row){
?>

<div class="request">

<div>
<b><?php echo $row->vehicle_name;?></b><br>
<small><?php echo $row->issue;?></small>
</div>

<div class="status <?php echo strtolower($row->status);?>">
<?php echo $row->status;?>
</div>

</div>

<?php } ?>

</div>


<!-- PREDICTION HISTORY -->

<div class="box">

<h3>Prediction History</h3>

<?php
$sql="SELECT * FROM prediction_history";
$query=$dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

foreach($results as $row){
?>

<div class="request">

<div>
<b><?php echo $row->vehicle_name;?></b><br>
<small><?php echo $row->fuel_type;?> - <?php echo $row->location;?></small>
</div>

<div class="high">
<?php echo $row->risk_level;?> <br>
<?php echo $row->risk_percent;?>%
</div>

</div>

<?php } ?>

</div>

</div>

</div>

</body>
</html>