<?php
require_once('connection.php');
session_start();
extract($_POST);

if (isset($Register)) {
    //check user already exists or not
    $sql = mysqli_query($con, "select * from student where rno = '$rno'");
    $r = mysqli_num_rows($sql);
    if ($r == true) {
        $err = "<font color='red'>Roll Number Already Exists..!</font>";
    } else {
        //encrypt your password
        $pass = md5($psswd);

        $query = "insert into student values('$fname','$lname','$rno','$mail','$dept','$sem','$gen','$phone','$pass','$categry','$rc')";
        $data = mysqli_query($con, $query);


        if ($data) {
            $err = "<font color='green'>Registered successfully...!!</font>";
        }
    }
}
?>
<!-- register.php -->
<!-- REGISTRATION FORM -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
        window.onload = function() {
            document.getElementById("phone").onchange = passwdlen;
            document.getElementById("pass1").onchange = passwdlen2;
            document.getElementById("rno").onchange = passwdlen3;
        }

        function passwdlen() {
            var num = document.getElementById("phone").value;
            if (num.length != 10)
                document.getElementById("phone").setCustomValidity("Phone length should be 10");
            else
                document.getElementById("phone").setCustomValidity('');
        }

        function passwdlen2() {
            var pass = document.getElementById("pass1").value;
            if (pass.length < 8)
                document.getElementById("pass1").setCustomValidity("Password length should be greater than 8");
            else
                document.getElementById("pass1").setCustomValidity('');
        }

        function passwdlen3() {
            var rolno = document.getElementById("rno").value;
            if (rolno.length != 7)
                document.getElementById("rno").setCustomValidity("Roll no length should be 7");
            else
                document.getElementById("rno").setCustomValidity('');
        }
    </script>
    <title>Registration</title>

    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/libs/css/style.css">
    <style>
        html,
        body {
            height: 100%;
        }

        .content-centered {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        body {
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #fff;
            font-family: Times;
            
        }

        form {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }

        form h1 {
            text-align: center;
        }

        form div {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        form label {
            width: 110px;
            flex-shrink: 0;
            font-weight: bold;
            margin-bottom: 0;
        }

        form input[type="text"],
        form input[type="email"],
        form input[type="password"],
        form select {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form input[type="radio"],
        form input[type="checkbox"] {
            margin-right: 5px;
        }

        form div label {
            display: inline;
            margin-right: 10px;
        }

        form input[type="submit"],
        form input[type="reset"] {
            background-color: #d6a92b;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        form input[type="submit"]:hover,
        form input[type="reset"]:hover {
            background-color: #b5891b;
        }



        .container.content-centered input[type="submit"],
        .container.content-centered input[type="reset"] {
            margin-right: 10px;
            width: 150px;
        }

        .card {
            border: none;
            border-radius: 6px;
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #fff;
            color: grey;
            text-align: center;
            font-size: 16px;
            padding: 20px;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
        }

        .card-body {
            padding: 30px;
        }

        .card-footer {
            color: black;
        }

        .card-header {
            /* background-color: #343a40; */
            color: gray;
            font-size: 20px;
        }
    </style>


</head>

<body>

    <!--Form-->
    <div class="container content-centered">
        <div class="card">
            <div class="card-header">
                REGISTER HERE
            </div>
            <form name="register" method="post" action="" enctype="multipart/form-data">

                <?php echo @$err; ?>

                <div>
                    <label for="fname">First Name</label>
                    <input type="text" autocomplete="off" name="fname" id="fname" placeholder="First Name" required />
                </div>

                <div>
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" autocomplete="off" placeholder="Last Name" required />
                </div>

                <div>
                    <label>Gender</label>
                    <div>
                        <input type="radio" name="gen" id="male" value="M" />
                        <label for="male">Male</label>
                        <input type="radio" name="gen" id="female" value="F" />
                        <label for="female">Female</label>
                    </div>
                </div>

                <div>
                    <label>Category</label>
                    <div>
                        <input type="radio" name="categry" id="general" value="General" />
                        <label for="general">General</label>
                        <input type="radio" name="categry" id="obc" value="OBC" />
                        <label for="obc">OBC</label>
                        <input type="radio" name="categry" id="scst" value="SC/ST" />
                        <label for="scst">SC/ST</label>
                        <input type="radio" name="categry" id="tuition" value="Tuition Waiver" />
                        <label for="tuition">Tuition Waiver</label>
                    </div>
                </div>

                <div>
                    <label for="rno">Roll Number</label>
                    <input type="text" name="rno" id="rno" autocomplete="off" placeholder="1914000" required />
                </div>

                <div>
                    <label for="mail">Email</label>
                    <input type="email" name="mail" id="mail" autocomplete="off" placeholder="rollno@dbcegoa.ac.in" required />
                </div>

                <div>
                    <label for="dept">Department</label>
                    <select name="dept" id="dept" autocomplete="off" placeholder="computer science" required>
                        <option selected>Computer Engineering</option>
                        <option>Civil Engineering</option>
                        <option>Mechanical Engineering</option>
                        <option>Electronincs & Telecommunication</option>
                    </select>
                </div>

                <div>
                    <label for="sem">Semester</label>
                    <select name="sem" id="sem" autocomplete="off" placeholder="" required>
                        <option disabled>1</option>
                        <option>2</option>
                        <option disabled>3</option>
                        <option selected>4</option>
                        <option disabled>5</option>
                        <option>6</option>
                        <option disabled>7</option>
                        <option>8</option>
                    </select>
                </div>

                <div>
                    <label for="phone">Phone</label>
                    <input type="text" autocomplete="off" name="phone" id="phone" placeholder="9998887776" />
                </div>

                <div>
                    <label for="rc">RC</label>
                    <select name="rc" id="rc" autocomplete="off" placeholder="RC 2019-20" required>
                        <option selected>RC 2019-20</option>
                        <option>RC 2016-17</option>
                    </select>
                </div>

                <div>
                    <label for="pass1">Password</label>
                    <input type="password" name="psswd" id="pass1" placeholder="Password" required />
                </div>

                <div class="container content-centered">
                    <input type="submit" name="Register" value="Submit" />
                    <input type="reset" onClick="window.location.href=window.location.href" value="Reset" />
                </div>
            </form>

            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <a href="index.php">Have an Account? Login Here</a>
                </div>
            </div>


        </div>


    </div>
    <!--Scroll Up js File-->
    <script src="js/scroll.js"></script>
</body>

</html>