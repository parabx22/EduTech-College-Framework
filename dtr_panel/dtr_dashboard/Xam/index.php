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
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
      body {
        display: -ms-flexbox;
        display: flex;
        justify-items: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        width: 950px;
        margin-left: 20%;
        margin-top: 10%;
        }

        

       .logo-container {
            display: flex;
            justify-content: left;
            align-items: left;
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
            font-size: 15px;
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

        .btn {
      background-color: #d6a92b; /* Green */
      border: none;
      color: white;
      padding: 8px 90px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }

    .btn{
      background-color: white; 
      color: black; 
      border: 2px solid #d6a92b;
    }

    .btn:hover {
      background-color: #d6a92b;
      color: white;
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
        border-radius: 0px;
	box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
         height: 100%;
         width:80%;
         padding: 0.1px;
         
    }
   </style>
</head>

<body>

           
                
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark static-top">
        <div class="container">
        <!-- <div class="col-md-8"> -->
         
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
            <div class="col-md-7">
                <div class="logo-container">
                    <img src="logo.jpg" alt="Logo" height="300" width="480">
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header text-center">LOGIN HERE</div>
                    <div class="card-body">
                        <form method="post" name="login_sform">
                            <div class="form-group">
                                <input class="form-control form-control-lg" id="rno" name="rno" alt="rno" type="text" placeholder="Roll Number" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-lg" id="password" name="Password" type="password" alt="password" placeholder="Password" autocomplete="off">
                            </div>
                            <div class="form-group">
                            <input type="submit" value="Login"  name="Login" class="btn">
                            </div>
                            <div class="card-footer">
                             <h6 style="color:gray;">New User?</h6>
                            <a href="register.php" <b style=" text-decoration:underline; color:black;" > Register Here </b></a>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
                      

</body>

</html>
