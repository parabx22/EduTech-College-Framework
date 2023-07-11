<?php
session_start();
include 'header2/main_header.php';
?>

<?php
include 'sidebar/main_sidebar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['Details'] = $_POST;
    $str = <<< _alert
<script>
window.location.assign("TimeTableFe.php");
</script>
_alert;
    echo $str;
}  
?>

  <head>
    <title>Home Page</title>
    <!-- <link rel="stylesheet" href="bootstrap/bootstrap.css" /> -->
    <style>
    .content-centered {
        display: flex;
        justify-content: center;
        align-items: center;
        /* height: 100vh; */
    }
</style>

</head>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>IT Timetable Generation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">IT Timetable</li>
            </ol>
          </div>
        </div>
      </div>
    </section> 

    <section class="content content-centered">
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
                        <div class="col-md-12">
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
                        <div class="col-md-12">
                            <input type="time" name="startTime3" title="startTime3" class="form-control" value="<?php   echo date('H:i', strtotime($row2['StartTime'])); 
                                                                                    ?>" required /><br />
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div id="slot3">
                        <header class="col-md-12"><label for="time2">Enter Start Date: </label></header>
                        <div class="col-md-12">
                            <input type="date" name="date" title="date" class="form-control" value="<?php   echo date('H:i', strtotime($row2['StartTime'])); 
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
        </section>

  </div>

  <?php include 'footer/footer.php';?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>


<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>

<script src = "js/jquery-3.1.1.js"></script>
<script src = "js/jquery-ui.js"></script>
 
</body>
</html>