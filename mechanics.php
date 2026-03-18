

<?php
include("db_connect.php");

$query = "SELECT * FROM booking_details ORDER BY created_at DESC";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>

<head>

<title>Mechanic Portal</title>

<style>

body{
font-family:Segoe UI;
background:#f3f4f6;
margin:0;
}

/* NAVBAR */

.navbar{
display:flex;
justify-content:space-between;
align-items:center;
padding:15px 40px;
background:white;
border-bottom:1px solid #ddd;
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

.mechanic-btn{
background:#2563eb;
color:white;
}

.logout-btn{
background:none;
color:red;
font-weight:bold;
}

/* PAGE */

.container{
padding:30px 80px;
}

/* FILTER BUTTONS */

.filters{
margin-top:20px;
display:flex;
gap:10px;
}

.filters button{
padding:8px 14px;
border-radius:20px;
border:1px solid #ddd;
background:white;
cursor:pointer;
}

/* CARD */

.card{
background:white;
padding:20px;
border-radius:12px;
margin-top:20px;
border:2px solid #f87171;
}

.card h3{
margin:0;
}

/* BADGES */

.badge{
padding:4px 10px;
border-radius:20px;
font-size:12px;
margin-left:5px;
}

.emergency{
background:#fee2e2;
color:red;
}

.normal{
background:#e0f2fe;
color:#0369a1;
}

.status{
background:#e5e7eb;
}

.accepted{
background:#dbeafe;
}

.inprogress{
background:#ede9fe;
}

/* ACTION */

.action{
margin-top:15px;
display:flex;
justify-content:space-between;
align-items:center;
}

textarea{
padding:10px;
border-radius:6px;
border:1px solid #ccc;
}

.btn{
padding:10px 14px;
border:none;
border-radius:8px;
cursor:pointer;
}

.start{
background:#7c3aed;
color:white;
}

.complete{
background:#16a34a;
color:white;
}

</style>

</head>

<body>

<div class="navbar">

<div class="logo">
OVBP Breakdown Prediction System
</div>

<div class="nav-buttons">

<button class="mechanic-btn">🔧 Mechanic Portal</button>

<button class="logout-btn">Logout</button>

</div>

</div>

<div class="container">

<h2>🔧 Mechanic Portal</h2>
<p>View and manage all service requests</p>

<div class="filters">

<button>All</button>
<button>Emergency</button>
<button>Pending</button>
<button>In Progress</button>
<button>Completed</button>

</div>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<div class="card">

<h3>

🚗 <?php echo $row['make']." ".$row['model']." ".$row['year']; ?>

<span class="badge <?php echo $row['service_type']=='Emergency Service'?'emergency':'normal'; ?>">
<?php echo $row['service_type']; ?>
</span>

<span class="badge status">
<?php echo $row['booking_status']; ?>
</span>

</h3>

<p><?php echo $row['issue_description']; ?></p>

<p>
👤 <?php echo $row['full_name']; ?>
&nbsp;&nbsp;📞 <?php echo $row['phone']; ?>
&nbsp;&nbsp;📧 <?php echo $row['email']; ?>
&nbsp;&nbsp;📍 <?php echo $row['location']; ?>
</p>

<div class="action">

<textarea placeholder="Add mechanic notes..."></textarea>

<div>

<button class="btn start">Start Service</button>

<button class="btn complete">Mark Completed</button>

</div>

</div>

</div>

<?php
}
?>

</div>

</body>

</html>