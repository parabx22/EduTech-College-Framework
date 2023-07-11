<?php

session_start();
//session_unset();

// $_SESSION['startTime1'] = $time1;
// $_SESSION['startTime2'] = $time2;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['Details'] = $_POST;
    $str = <<< _alert
<script>
window.location.assign("TimeTableFe.php");
</script>
_alert;
    echo $str;
} //else { 
?>

<!doctype html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.css" />

</head>

<body>
    <nav class="navbar navbar-default bg-primary">
        <div class="container-fluid">
            <!--header-->
            <div class="navbar-header">
                <div class="navbar-brand">
                    TIMETABLE GENERATION SYSTEM
                    <div class="col-md-3" >
                    <div style="position:absolute; margin-left: 1400px; font-size: 20px; margin-top:-20px"> <a href="../../dashboard.php">Dashboard</a></div>

        </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid" style="position:relative; margin-top:100px">
        <div class="form-group col-md-4 col-md-push-4">
            <form method="POST" action="" id="form1">
                <div>
                    <label for="Exam">Exam: </label> &nbsp;
                    <select name="Exam" title="exam" class="form-control">
                        <option value="Internal Test 1">Internal Test 1</option>
                        <option value="Internal Test 2">Internal Test 2</option>
                        <option value="Internal Test 3">Internal Test 3</option>
                    </select><br />
                    <label for="Semester">Semester: </label>
                    <select name="Semester" id="sem" title="Semester" class="form-control">
                        <option value="odd">Odd Semester</option>
                        <option value="even">Even Semester</option>
                    </select>
                    <br />
                </div>
                <div class="row">
                    <div id="slot1">
                        <header class="col-md-12"><label for="startTime1">Enter Start Time for FE, BE: </label></header>
                        <div class="col-md-6">
                            <?php

                            $time = date("h:i a"); 
                            $host = 'localhost';
                            $username = 'root';
                            $password = '';
                            $dbname = "college";
                            $conn = mysqli_connect($host, $username, $password, "$dbname");
                            if (!$conn) {
                                die('Could not Connect MySql Server!');
                            }

                            $result3 = mysqli_query($conn, "DELETE FROM `timetable`");
                            $result = mysqli_query($conn, "SELECT * FROM `timings` WhERE Year='FE'");
                            $result2 = mysqli_query($conn, "SELECT * FROM `timings` WhERE Year='SE'");

                            if (mysqli_num_rows($result) > 0) {
                                $i = 0;
                                $row2 = mysqli_fetch_array($result2);
                                while ($row = mysqli_fetch_array($result)) {

                            ?>

                            <input type='time' name='startTime1' title='startTime1' class='form-control' value="<?php echo date('H:i', strtotime($row['StartTime'])); 
                                                                                                            ?>" required /><br />
                        </div>

                    </div>
                </div> 
                <div class="row">
                    <div id="slot2">
                        <header class="col-md-12"><label for="time2">Enter Start Time for SE, TE: </label></header>
                        <div class="col-md-6">
                            <input type="time" name="startTime3" title="startTime3" class="form-control" value="<?php   echo date('H:i', strtotime($row2['StartTime'])); 
                                                                                    ?>" required /><br />
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div id="slot3">
                        <header class="col-md-12"><label for="time2">Enter Start Date: </label></header>
                        <div class="col-md-6">
                            <input type="date" name="date" title="date" class="form-control" value="<?php  // echo date('H:i', strtotime($row2['StartTime'])); 
                                                                                    ?>" required /><br />
                        </div>

                    </div>
                </div>
                <?php
                    $i++;
                }
                ?>

                <input type="submit" name="submit" value="Start" class="form-control btn btn-primary">
                <?php
                } else {
                    echo "No result found";
                }
                ?>
            </form>
            <?php

            if (isset($_POST['submit'])) {
                $exam =  $_POST['Exam'];
                $semester = $_POST['Semester'];
                $time1 =  $_POST['startTime1'];
                $time2 = $_POST['startTime2'];
                $date = $_POST['date'];

                $sql = mysqli_query($conn, "INSERT INTO timetable (Exam, Semester, Time1, Time2, Date ) VALUES ('$exam', '$semester','$time1','$time2', '$date')");
            }
            ?>
        </div>
    </div>
</body>

</html>
<?php //}
?>

