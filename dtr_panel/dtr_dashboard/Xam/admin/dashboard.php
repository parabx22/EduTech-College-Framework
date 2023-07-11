<?php
// session_start();
require_once('../connection.php');
// $faculty = $_SESSION['faculty'];
// if ($faculty == "") {
//     header('location:index.php');
// }
include('count.php');
?>

<!-- dashboard.php -->
<!-- ADMIN DASHBOARD -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Dashboard.!</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #ffffff;
        }

        .navbar {
            padding: 8px;
            border: none;
            background-color: #343a40; /* Change the background color to blue */
            border-bottom: 1px solid black;
            box-shadow: 3px 3px 5px black;
        }

        .navbar-brand {
            /* font-family: 'Acme'; */
            font-size: 30px;
            color: white;
        }

        .wrapper {
            display: flex;
        }

        .sidebar {
            background-color: #343a40;
            width: 200px;
            height: 1000px;
            padding: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .main {
            flex: 1;
            padding: 20px;
        }
    </style>

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom Favicon -->
    <link rel="icon" type="image/png" sizes="64x64" href="../css/images/logo.png">

</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                   
                </a>
                <a class="navbar-brand" href="#">Welcome, Admin</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="../../dashboard.php" style=color:white><i class="fas fa-sign-out-alt" aria-hidden="true"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li><a href="dashboard.php?page=manage_sub" style="color: #ffffff"><i class="fas fa-clipboard"></i>Dashboard</a></li>
                <li><a href="dashboard.php?page=manage_users" style="color: #ffffff"><i class="fas fa-users"></i>Students</a></li>
            </ul>
        </div>
        <div class="main">
            <?php
            @$page = $_GET['page'];
            if ($page != "") {
                if ($page == "manage_users") {
                    include('manage_users.php');
                }
                if ($page == "manage_sub") {
                    include('manage_sub.php');
                }
            } else {
                // Add your content here
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
