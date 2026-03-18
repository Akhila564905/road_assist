<?php
include("db_connect.php");

if(isset($_POST['book_mechanic']))
{

$service_type=$_POST['service_type'];
$full_name=$_POST['full_name'];
$phone=$_POST['phone'];
$email=$_POST['email'];

$make=$_POST['make'];
$model=$_POST['model'];
$year=$_POST['year'];

$issue=$_POST['issue'];
$location=$_POST['location'];

$image="";

if($_FILES['vehicle_image']['name']!="")
{
$image=$_FILES['vehicle_image']['name'];
$tmp=$_FILES['vehicle_image']['tmp_name'];
move_uploaded_file($tmp,"uploads/".$image);
}

$sql="INSERT INTO booking_details
(service_type,full_name,phone,email,make,model,year,issue_description,location,vehicle_image)

VALUES
('$service_type','$full_name','$phone','$email','$make','$model','$year','$issue','$location','$image')";

$conn->query($sql);

echo "<script>alert('Mechanic request sent successfully');</script>";

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Book Mechanic</title>

<style>

/* BODY */

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
font-size:18px;
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
width:900px;
margin:auto;
padding:30px;
}

/* CARD */

.card{
background:white;
padding:25px;
border-radius:12px;
margin-bottom:20px;
box-shadow:0 4px 12px rgba(0,0,0,0.05);
}

/* SERVICE BUTTONS */

.service-box{
display:flex;
gap:20px;
margin-top:15px;
}

.service-option{
flex:1;
border:2px solid #ddd;
padding:20px;
border-radius:12px;
cursor:pointer;
transition:0.3s;
}

.service-option input{
margin-right:10px;
}

.normal:hover{
border-color:#3aa3ff;
background:#f0f7ff;
}

.emergency:hover{
border-color:red;
background:#fff0f0;
}

/* FORM */

.row{
display:flex;
gap:20px;
margin-bottom:15px;
}

.col{
flex:1;
}

label{
font-weight:500;
font-size:14px;
}

input,textarea{
width:100%;
padding:12px;
border-radius:8px;
border:1px solid #ddd;
margin-top:5px;
font-size:14px;
}

textarea{
height:80px;
}

/* BUTTON */

.book-btn-main{
margin-top:20px;
width:100%;
background:#2563eb;
color:white;
padding:15px;
border:none;
border-radius:8px;
font-size:16px;
cursor:pointer;
transition:0.3s;
}

.book-btn-main:hover{
background:#1d4ed8;
}

</style>

</head>

<body>

<!-- NAVBAR -->

<div class="navbar">

<div class="logo">
OVBP Breakdown Prediction System
</div>

<div class="nav-buttons">

<button class="dashboard-btn" onclick="window.location.href='user_dashboard.php'">Dashboard</button>

<button class="predict-btn" onclick="window.location.href='breakdown_prediction.php'">Predict Breakdown</button>

<button class="book-btn" onclick="window.location.href='book_mechanic.php'">Book Mechanic</button>

<button class="logout-btn" onclick="window.location.href='index.php'">Logout</button>


</div>

</div>

<div class="container">

<h2>🔧 Book a Mechanic</h2>
<p>Get professional vehicle assistance at your location</p>

<form method="POST" enctype="multipart/form-data">

<!-- SERVICE TYPE -->

<div class="card">

<h3>Select Service Type</h3>

<div class="service-box">

<label class="service-option normal">

<input type="radio" name="service_type" value="Normal Service" checked>

<b>Normal Service</b><br>
<small>Scheduled maintenance & repairs</small>

</label>

<label class="service-option emergency">

<input type="radio" name="service_type" value="Emergency Service">

<b>Emergency Service</b><br>
<small>Immediate roadside assistance</small>

</label>

</div>

</div>


<!-- YOUR DETAILS -->

<div class="card">

<h3>📞 Your Details</h3>

<div class="row">

<div class="col">

<label>Full Name</label>

<input type="text" name="full_name" placeholder="Enter your full name">

</div>

<div class="col">

<label>Phone Number</label>

<input type="text" name="phone" placeholder="📱 Enter phone number">

</div>

</div>

<label>Email</label>

<input type="email" name="email" placeholder="example@email.com">

</div>


<!-- VEHICLE DETAILS -->

<div class="card">

<h3>🚗 Vehicle Details</h3>

<div class="row">

<div class="col">

<label>Vehicle Make</label>

<input type="text" name="make" placeholder="Toyota / Honda / Hyundai">

</div>

<div class="col">

<label>Model</label>

<input type="text" name="model" placeholder="Camry / Swift / Creta">

</div>

<div class="col">

<label>Year</label>

<input type="number" name="year" placeholder="2021">

</div>

</div>

</div>


<!-- ISSUE -->

<div class="card">

<h3>⚠ Issue & Location</h3>

<label>Describe the Issue</label>

<textarea name="issue" placeholder="Engine not starting, tyre puncture, overheating etc..."></textarea>

<label style="margin-top:10px;">Your Location</label>

<input type="text" name="location" placeholder="Street, City, Landmark">

<label style="margin-top:10px;">Upload Vehicle Image (optional)</label>

<input type="file" name="vehicle_image">

</div>

<button class="book-btn-main" name="book_mechanic">🔧 Book Mechanic</button>

</form>

</div>

</body>
</html>