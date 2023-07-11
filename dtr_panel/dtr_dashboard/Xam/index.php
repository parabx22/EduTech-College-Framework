<?php
require_once('connection.php');
session_start();
extract($_POST);

if (isset($Login)) {
    if ($rno == "" || $Password == "") {
        $err = "<font color='red' align='center'>Enter a Valid Rno & Password</font>";
    } else {
        $pass = md5($Password);
        $sql1 = mysqli_query($con, "select * from `student` where rno='$rno' and password='$pass'");
        $r1 = mysqli_num_rows($sql1);
        if ($r1) {
            $_SESSION['user'] = $rno;
            header('location:user/dashboard.php');
        } else {
            $err = "<font color='red'>Invalid login details</font>" . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
        /* Custom CSS styles */
        body {
            padding-right: 0px;
            margin-right: 0%;
        }

        

       .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
/*
        .logo-container img {
            max-height: 357px;
            max-width: 500px;
        } */

        .card-header {
            background-color: #fff;
            color: grey;
            text-align: center;
            font-size: 12px;
            padding: 10px;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
        }

        .card-body {
            padding: 30px;
            font-family: times;
        }

        .card-footer {
            background-color: #343a40;
            color: #fff;
        }

        .form-control {
            height: 40px;
            border-radius: 4px;
        }

        .login_btn {
            color: #fff;
            background-color: #d6a92b;
            border: none;
            transition: all 0.2s;
            width: 220px;
        }

        .login_btn:hover {
            background-color: #c79528;
        }

        .card-footer {
            background-color: #fff;
            color: #333;
            text-align: center;
            padding: 20px;
            border-bottom-left-radius: 6px;
            border-bottom-right-radius: 6px;
            font-family: times;
        }

        .card-footer a {
            color: #333;
            text-decoration: none;
        }


        .content-centered {
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 100vh; */
    }
    </style>
</head>

<body>

           
                
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark static-top">
        <div class="container">
        <!-- <div class="col-md-8"> -->
            <a class="navbar-brand" href="http://dbcegoa.ac.in">
                <h3 style="font-family:'PT Serif';"><span class="mh3">DBCE</span><br /></h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mnav" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="fa fa-key" aria-hidden="true"></i> Login
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- ---LOGOOOOO--------- -->

    <div class="container content-centered">
        <div class="row">
            <div class="col-md-5">
                <div class="logo-container">
                    <img src="logo.jpg" alt="Logo" height="357" width="500">
                </div>
            </div>
    <div class="col-md-6">
    <!-- <div class="container"> -->
        <div class="d-flex justify-content-center h-100">
            <div class="card mcon" id="card">
                <div class="card-header" id="card-header">
                    <h3 align="center" style="color:gray; font-family:times; font-size:16px">LOGIN HERE</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <p align='center'><b><?php echo @$err; ?></b></p>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <!-- <span class="input-group-text"><i class="fas fa-user"></i></span> -->
                            </div>
                            <input type="text" autocapitalize="characters" autocomplete="off" class="form-control a" name="rno" placeholder="Roll Number">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <!-- <span class="input-group-text"><i class="fas fa-key"></i></span> -->
                            </div>
                            <input type="password" class="form-control" name="Password" placeholder="Password">
                        </div>
                        <div class="row justify-content-center">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" value="Login"  name="Login" class="btn btn-primary login_btn">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer" id="card-footer">
                    <div class="d-flex justify-content-center">
                        <a href="register.php" style="text-decoration:none; color:black;">New User.? Register Here</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
