<!DOCTYPE html>
<html lang='en'>
    <head>
        <title>About Us Page</title>
        <link rel="stylesheet" href="Aboutus.css">
    </head>
    <body>
    <?php
include("fyprodbconnection.php");
session_start();
if (!isset($_SESSION['loggedin'])) {
	include("header.php");
}
else
	include("header(loggedin).php");

?>

<div class="about-section">
  <h1><i><b>Fy<span style="color:red;">Pro</span></b></i></h1>
  <p>Badminton accessories online store</p>
  <p>Created in 2023</p>
</div>

<h2>Our Company Team</h2>
<div class="namecard">

        <div class="card">
            <img src="image/supervisor.jpg" alt="Supervisor" style="height:450px;width:450px;">
                <div class="container">
                    <h4><b>Ms. Nur Liyana Binti Rosli</b></h4><br>
                    <ul>
                        <li>Position      : Supervisor of FyPro</li>
                        <li>Birthday      : 27/11/1985</li>
                        <li>Company Name  : Fypro</li>
                        <li>Contact No    : 06-2523826</li>
                        <li>Email address : liyana.rosli@mmu.edu.my</li>
                        <li>Instagram     : lia.lilana85</li>
                    </ul>
                </div>
        </div>

        <div class="card">
            <img src="image/ivan.jpeg" alt="Supervisor" style="height:450px;width:450px;">
                <div class="container">
                    <h4><b>Mr.Teok Tze Earn</b></h4><br>
                    <ul>
                        <li>Position      : Website Developer & Designer</li>
                        <li>Birthday      : 30/05/2002</li>
                        <li>Company Name  : Fypro</li>
                        <li>Contact.No    : 018-6609887</li>
                        <li>Email address : 1211204451@student.mmu.edu.my</li>
                        <li>Instagram     : ivan__0530</li>
                    </ul>
                </div>
        </div>

        <div class="card">
            <img src="image/chinghong.jpg" alt="Supervisor" style="height:450px;width:450px;">
                <div class="container">
                    <h4><b>Mr.Lim Ching Hong</b></h4><br>
                    <ul>
                        <li>Position      : User account administrator</li>
                        <li>Birthday      : 07/11/2002</li>
                        <li>Company Name  : Fypro</li>
                        <li>Contact.No    : 011 1929 5205</li>
                        <li>Email address : 1211204346@student.mmu.edu.my</li>
                        <li>Instagram     : chinghong_1107</li>
                    </ul>
                </div>
        </div>

        <div class="card">
            <img src="image/eyang.jpg" alt="Supervisor" style="height:450px;width:450px;">
                <div class="container">
                    <h4><b>Mr.Si E Yang</b></h4><br>
                    <ul>
                        <li>Position      : Admin account administrator</li>
                        <li>Birthday      : 13/11/2003</li>
                        <li>Company Name  : Fypro</li>
                        <li>Contact.No    : 018 388 2392</li>
                        <li>Email address : 1211203714@student.mmu.edu.my</li>
                        <li>Instagram     : eyangsi</li>
                    </ul>
                </div>
        </div>

</div>
<?php 
	include 'footer.php'; 
	?>
    </body>
</html>