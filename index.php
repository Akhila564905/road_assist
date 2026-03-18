<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>OVBP - Breakdown Prediction System</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:"Segoe UI",sans-serif;
}

body{
background:#f5f7fb;
color:#111;
}

/* BLUR EFFECT WHEN MODAL OPEN */
body.blur{
filter:blur(4px);
}

/* NAVBAR */

.navbar{
display:flex;
justify-content:space-between;
align-items:center;
padding:15px 60px;
background:white;
position:sticky;
top:0;
z-index:1000;
border-bottom:1px solid #eee;
}

.logo{
display:flex;
align-items:center;
gap:10px;
font-weight:600;
}

.logo-box{
width:28px;
height:28px;
background:#2563eb;
border-radius:6px;
}

.logo span{
font-size:14px;
color:#666;
}

.nav-links{
display:flex;
gap:30px;
align-items:center;
}

.logout{
color:#ff4d4d;
text-decoration:none;
}

/* HERO */

.hero{
height:90vh;
display:flex;
align-items:center;
padding-left:120px;
background:
linear-gradient(rgba(5,10,30,0.85), rgba(5,10,30,0.85)),
url("https://images.unsplash.com/photo-1503376780353-7e6692767b70");
background-size:cover;
background-position:center;
color:white;
}

.hero-content{max-width:650px;}

.tag{
display:inline-block;
background:#1e293b;
padding:6px 14px;
border-radius:20px;
font-size:13px;
margin-bottom:25px;
color:#cbd5f5;
}

.hero h1{
font-size:52px;
font-weight:700;
line-height:1.2;
margin-bottom:20px;
}

.hero h1 span{color:#4ea1ff;}

.hero p{
color:#cbd5f5;
font-size:17px;
line-height:1.6;
margin-bottom:35px;
}

.buttons{
display:flex;
gap:18px;
}

.btn{
padding:12px 28px;
border-radius:8px;
font-size:16px;
cursor:pointer;
border:none;
}

.btn-primary{
background:#2563eb;
color:white;
}

.btn-secondary{
background:#1e293b;
color:white;
border:1px solid #3b82f6;
}

/* FEATURES */

.features{
padding:80px 10%;
text-align:center;
}

.features h2{font-size:32px;margin-bottom:10px;}

.features p{color:#666;margin-bottom:50px;}

.cards{
display:flex;
gap:30px;
justify-content:center;
flex-wrap:wrap;
}

.card{
background:white;
padding:35px;
border-radius:12px;
width:320px;
box-shadow:0 5px 20px rgba(0,0,0,0.05);
text-align:left;
}

.icon{
width:45px;
height:45px;
border-radius:10px;
margin-bottom:15px;
}

.icon.blue{background:#e7efff;}
.icon.green{background:#e7f9ef;}
.icon.purple{background:#f3e8ff;}

.card p{color:#666;font-size:14px;}

/* HOW IT WORKS */

.how{
padding:80px 10%;
text-align:center;
background:#fafafa;
}

.steps{
display:flex;
justify-content:center;
gap:70px;
margin-top:50px;
flex-wrap:wrap;
}

.step{width:200px;}

.step-icon{
width:55px;
height:55px;
border-radius:12px;
margin:auto;
margin-bottom:15px;
}

.step-icon.blue{background:#2563eb;}
.step-icon.purple{background:#9333ea;}
.step-icon.orange{background:#f97316;}
.step-icon.green{background:#10b981;}

.step p{font-size:13px;color:#666;}

/* STATS */

.stats{
background:#2b56d8;
color:white;
display:flex;
justify-content:center;
gap:80px;
padding:40px 20px;
flex-wrap:wrap;
}

.stat{text-align:center;}
.stat h3{font-size:28px;}

/* CTA */

.cta{
text-align:center;
padding:90px 20px;
color:white;
background:
linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),
url("https://images.unsplash.com/photo-1487754180451-c456f719a1fc");
background-size:cover;
}

.cta h2{font-size:32px;margin-bottom:10px;}

.cta p{margin-bottom:30px;color:#ddd;}

/* MODAL POPUP */

.modal{
display:none;
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.5);
backdrop-filter:blur(6px);
justify-content:center;
align-items:center;
z-index:2000;
}

.modal-content{
background:white;
padding:40px;
border-radius:10px;
text-align:center;
width:350px;
position:relative;
}

.role-btn{
display:block;
margin:15px 0;
padding:12px;
border-radius:6px;
background:#2563eb;
color:white;
text-decoration:none;
}

.role-btn.mechanic{
background:#16a34a;
}

.close{
position:absolute;
top:10px;
right:15px;
cursor:pointer;
font-size:20px;
}

</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
<div class="logo">
<div class="logo-box"></div>
<strong>OVBP</strong>
<span>Breakdown Prediction System</span>
</div>

<div class="nav-links">
<a class="logout" href="#">Logout</a>
</div>
</div>

<!-- HERO -->
<section class="hero">
<div class="hero-content">

<div class="tag">AI Powered Vehicle Safety System</div>

<h1>
On-Road Vehicle <br>
<span>Breakdown Prediction</span> <br>
& Assistance System
</h1>

<p>
Harness the power of Machine Learning to predict vehicle breakdowns before they happen.
Get instant mechanic assistance when you need it most.
</p>

<div class="buttons">
<button class="btn btn-primary" onclick="openModal()">Sign Up →</button>
<button class="btn btn-secondary">Login</button>
</div>

</div>
</section>

<!-- FEATURES -->
<section class="features">
<h2>Everything in One Platform</h2>
<p>Predict breakdowns, book mechanics, and stay safe on every journey.</p>

<div class="cards">

<div class="card">
<div class="icon blue"></div>
<h3>AI Breakdown Prediction</h3>
<p>Our Random Forest ML model analyses vehicle parameters to predict breakdown risk.</p>
</div>

<div class="card">
<div class="icon green"></div>
<h3>Instant Mechanic Booking</h3>
<p>Book normal or emergency mechanic services with quick dispatch.</p>
</div>

<div class="card">
<div class="icon purple"></div>
<h3>Smart AI Assistant</h3>
<p>Integrated chatbot guides you through vehicle issues and maintenance tips.</p>
</div>

</div>
</section>

<!-- HOW IT WORKS -->
<section class="how">

<h2>How It Works</h2>

<div class="steps">

<div class="step">
<div class="step-icon blue"></div>
<h4>Enter Vehicle Data</h4>
<p>Input vehicle details and sensor data.</p>
</div>

<div class="step">
<div class="step-icon purple"></div>
<h4>ML Analysis</h4>
<p>Random Forest model processes parameters instantly.</p>
</div>

<div class="step">
<div class="step-icon orange"></div>
<h4>Get Risk Score</h4>
<p>Receive precise breakdown risk percentage.</p>
</div>

<div class="step">
<div class="step-icon green"></div>
<h4>Take Action</h4>
<p>Book mechanic instantly if risk is high.</p>
</div>

</div>
</section>

<!-- STATS -->
<section class="stats">
<div class="stat"><h3>95%</h3><p>Prediction Accuracy</p></div>
<div class="stat"><h3>&lt;5min</h3><p>Mechanic Response</p></div>
<div class="stat"><h3>15+</h3><p>Parameters Analysed</p></div>
<div class="stat"><h3>24/7</h3><p>AI Support</p></div>
</section>

<!-- CTA -->
<section class="cta">
<h2>Ready to drive with confidence?</h2>
<p>Join thousands of drivers using AI-powered breakdown prediction.</p>
<button class="btn btn-primary" onclick="openModal()">Get Started Free →</button>
</section>

<!-- SIGNUP MODAL -->

<div id="signupModal" class="modal">

<div class="modal-content">

<span class="close" onclick="closeModal()">×</span>

<h2>Create Account</h2>

<p>Select your role</p>

<a href="user_dashboard.php" class="role-btn">User / Driver</a>

<a href="mechanics.php" class="role-btn">Mechanic</a>

</div>

</div>

<script>

function openModal(){
document.getElementById("signupModal").style.display="flex";
}

function closeModal(){
document.getElementById("signupModal").style.display="none";
}

</script>

</body>
</html>
