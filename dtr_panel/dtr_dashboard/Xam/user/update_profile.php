<?php
require_once('../connection.php');
$query = mysqli_query($con, "SELECT * from student WHERE rno = '$user'");
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.css" />
    <style>
        .mcontainer {
            width: 50%;
            margin: auto;
        }

        .myform {
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 5px;
        }

        .tit {
            text-align: center;
        }

        .td1 {
            padding-bottom: 10px;
        }

        .required {
            font-weight: bold;
        }

        .login_btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            width: 100px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
        }

        .reset_btn {
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            width: 100px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
        }
        
    </style>
</head>

<body>
    <?php
    extract($_POST);
    if (isset($Update)) {
        $q = "UPDATE student set fname = '$fname',lname = '$lname',phno = '$phone' where rno = '$user'";
        $run = mysqli_query($con, $q);
        if ($run) {
            $err = "<font color='green' align='center'>Profile Updated Successfully...!</font>";
        } else {
            $err = "<font color='red' align='center'>Error in Updating Profile.!</font>";
        }
    }
    ?>
    <div class="mcontainer">
        <form name="register" method="post" class="myform" action="" enctype="multipart/form-data">
            <h1 class="tit">Update Your Profile</h1>
            <?php echo @$err; ?>
            <hr>
            <table width="100%">
                <tr>
                    <td>
                        <label class="required">First Name</label>
                    </td>
                    <td></td>
                    <td class="td1">
                        <input type="text" autocomplete="off" name="fname" placeholder="First Name" class="form-control required" value="<?php echo $row['fname']; ?>" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="required">Last Name</label>
                    </td>
                    <td></td>
                    <td class="td1">
                        <input type="text" name="lname" autocomplete="off" placeholder="Last Name" required value="<?php echo $row['lname']; ?>" class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="required">Category</label>
                    </td>
                    <td></td>
                    <td class="td1">
                        <input type="text" name="categry" value="<?php echo $row['categry']; ?>" readonly class="form-control" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="required">Roll Number</label>
                    </td>
                    <td></td>
                    <td class="td1">
                        <input type="text" name="rno" autocomplete="off" readonly value="<?php echo $row['rno']; ?>" class="form-control" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="required">Email</label>
                    </td>
                    <td></td>
                    <td class="td1">
                        <input type="email" name="mail" autocomplete="off" readonly value="<?php echo $row['email']; ?>" class="form-control" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Phone</label>
                    </td>
                    <td></td>
                    <td class="td1">
                        <input type="phone" autocomplete="off" name="phone" id="phone" value="<?php echo $row['phno']; ?>" class="form-control" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="required">Department</label>
                    </td>
                    <td></td>
                    <td class="td1">
                        <input type="text" name="dept" readonly value="<?php echo $row['dept']; ?>" class="form-control" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label class="required">Semester</label>
                    </td>
                    <td></td>
                    <td class="td1">
                        <input type="text" name="sem" value="<?php echo $row['sem']; ?>" readonly class="form-control" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="required">RC</label>
                    </td>
                    <td></td>
                    <td class="td1">
                        <input type="text" name="rc" value="<?php echo $row['rc']; ?>" readonly class="form-control" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" name="Update" class="login_btn" value="Update" />
                    </td>
                    <td></td>
                    <td class="td1">
                        <input type="reset" onClick="window.location.href=window.location.href" class="reset_btn" value="Reset" />
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>
