<?php
session_start();
require_once('../connection.php');

$user = $_SESSION['user'];
if ($user == "") {
    header('location:../index.php');
} else {
    $stud =  mysqli_query($con, "SELECT * from student where rno = '$user'");
}
$row = mysqli_fetch_array($stud);
$sem = $row['sem'];

$q = mysqli_query($con, "select * from exam_reg where rno='" . $_SESSION['user'] . "'");
$rr = mysqli_num_rows($q);
if (!$rr) {
    $exerrr = "<font color='red';font-family:'Acme';>You have not Registered for Exam Yet!</font>";
} else {
    $exerrr = "<font color='primary'>Your Application has Been Submitted..! </font>";
}

?>

<!-- dashboard.php -->
<!-- Student DASHBOARD -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>User Dashboard.!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 70px;
        }

        .navbar-brand {
         
            font-size: 30px;
            color: white;
            padding-right: 750px;
        }

        .text-black {
            color: black;
        }

        .sidebar {
            margin-top:-20px;
            padding-top: 20px;
            width: 200px;
            height: 1000px;
            position: fixed;
            background-color: #343a40;
            overflow-x: hidden;
            overflow-y: auto;
           
        }
       

        .main {
            margin-left: 200px;
            padding: 20px;
        }

       
        .fa-caret-down {
            float: right;
            padding-right: 8px;
        }

        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
             
            }

            .sidebar a {
                font-size: 18px;
            }
        }
    </style>
   
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container-fluid"style="background-color:#343a40;">
            <div class="navbar-header">
                
                <a class="navbar-brand text-black" style="font-size:20px;color: white;background-color:#343a40">Welcome, <?php echo '' . $row['fname'] . ' ' . $row['lname']; ?> </a>

            </div>
            <ul class="nav navbar-nav navbar-right collapsed text-black" id="navbar">
                <li>
                    <a class="mnav11" style="color:white;font-size:20px;background-color:#343a40" href="../logout.php?logout"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> Logout</a>
                </li>
            </ul>
    </nav>

    <div class="wrapper">
        <div class="sidebar col -l2 -s4">
            <ul>
                
                <li><a href="dashboard.php"style="color:white"><i class="fas fa-clipboard"></i>Dashboard</a></li><br>
                <li><a href="dashboard.php?page=update_profile"style="color:white"><i class="fas fa-user-edit"></i> Update Profile</a></li><br>
                <li><a href="dashboard.php?page=reg2"style="color:white"><i class="fas fa-pen"></i>Register For Exam</a></li><br>
                <li><a href="dashboard.php?page=subjects_reg"style="color:white"><i class="far fa-file"></i> Registered Subjects</a></li><br>
            </ul>
        </div>
        <div class="col-sm-12 col-sm-offset-12 col-md-10 col-md-offset-2 main">
            <!-- container-->

            <?php
            @$page =  $_GET['page'];
            if ($page != "") {
                if ($page == "register") {
                 
                }

                if ($page == "update_profile") {
                    include('update_profile.php');
                }
                if ($page == "reg2") {
                    include('reg2.php');
                }

                if ($page == "subjects_reg") {
                    include('subjects_reg.php');
                }
                
            } else {
            ?><h2 style="margin-left: 2%;font-weight:600;"><?php echo @$exerrr; ?></h2>

                <!-- container end-->


            <?php } ?>


            <a id="back-to-top">
            <script>
                /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
                var dropdown = document.getElementsByClassName("dropdown-btn");
                var i;

                for (i = 0; i < dropdown.length; i++) {
                    dropdown[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var dropdownContent = this.nextElementSibling;
                        if (dropdownContent.style.display === "block") {
                            dropdownContent.style.display = "none";
                        } else {
                            dropdownContent.style.display = "block";
                        }
                    });
                }
            </script>
</body>

</html>