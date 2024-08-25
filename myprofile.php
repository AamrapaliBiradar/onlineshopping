<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Online Shopping</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet" />

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link type="text/css" rel="stylesheet" href="css/accountbtn.css" />


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        
        
        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .profile-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .profile-sidebar {
            flex: 1 1 250px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .profile-sidebar h3 {
            color: #555;
            margin-bottom: 20px;
        }

        .profile-sidebar ul {
            list-style: none;
            padding: 0;
        }

        .profile-sidebar ul li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .profile-sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            display: block;
        }

        .profile-sidebar ul li a:hover {
            color: #007BFF;
        }

        .profile-content {
            flex: 3;
            background-color: #fff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        .form-group input[type="radio"] {
            width: auto;
            margin-right: 10px;
        }

        .form-group button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 13px;
            font-size: 13px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
    
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .faq {
            margin-top: 40px;
        }

        .faq h3 {
            margin-bottom: 20px;
            font-size: 18px;
            color: #333;
        }

        .faq p {
            margin-bottom: 15px;
            color: #555;
            line-height: 1.6;
        }

        .faq a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }

        .faq a:hover {
            text-decoration: underline;
        }

        .clear {
            clear: both;
        }

        @media (max-width: 768px) {
            .profile-wrapper {
                flex-direction: column;
            }

            .profile-sidebar {
                margin-bottom: 20px;
            }
        }

        #top-header {


            background: #870000;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #190A05, #870000);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #190A05, #870000);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }

        .header-links li a {
            color: black;
        }

        .header {

            background: #780206;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #061161, #780206);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #061161, #780206);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }
    </style>
</head>

<body>
    <!-- TOP HEADER -->
    <div id="header">
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li ><a href="#"><i class="fa fa-phone"></i> +91-8080707957</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> aamrapalibiradarofficial27@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> INDIA</a></li>
                </ul>

                <ul class="header-links pull-right">
                <div class="form-group"> <button><a href="./index.php" >Back To Home</a></button></div>
                </ul>


            </div>
        </div>
    </div>
    <div class="container">
        <?php
        include "db.php";
        if (isset($_SESSION["uid"])) {
            $sql = "SELECT first_name, last_name, email FROM user_info WHERE user_id='$_SESSION[uid]'";
            $query = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($query);

            echo '
        <div class="dropdownn">
    <a href="#" class="dropdownn" data-toggle="modal" data-target="#myModal" >
    <i class="fa fa-user-o"></i><b> HELLO ' . $row["first_name"] . " " . $row["last_name"] . '</b></a>
</div>';
        }
        ?>

        <!-- <h2>Hello, Aamrapali Biradar</h2> -->
        <div class="profile-wrapper">
            <div class="profile-sidebar">
                <h3>Account Settings</h3>
                <ul>
                    <li><a href="#">Profile Information</a></li>
                    <li><a href="#">Manage Addresses</a></li>
                    <li><a href="#">PAN Card Information</a></li>
                    <li><a href="#">Payments</a></li>
                    <li><a href="#">My Stuff</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </div>

            <div class="profile-content">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" value="" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" value="" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="gender">Your Gender</label>
                        <input type="radio" id="male" name="gender" value="Male"> Male
                        <input type="radio" id="female" name="gender" value="Female"> Female
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" value="" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label for="phone">Mobile Number</label>
                        <input type="text" id="phone" name="phone" value="" placeholder="Mobile Number">
                    </div>
                    <div class="form-group">
                        <button type="submit"><a href="./index.php" class="signup-image-link">Save Changes</a></button>
                        <button><a href="./index.php" class="signup-image-link">Back To Home</a></button>

                    </div>

                </form>


            </div>
        </div>
    </div>

    <?php
	include "newslettter.php";
    include "footer.php";
    ?>

</body>

</html>