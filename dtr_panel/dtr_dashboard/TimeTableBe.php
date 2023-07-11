<?php 
// include 'header/main_header.php'; ?>
<?php
session_start();
include 'header2/main_header.php';
include 'sidebar/main_sidebar.php';

if (!isset($_SESSION['Details'])) {
    header('Location: homepage.php');
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['BE'] = $_POST;
        unset($_SESSION['BE']['Year']);
        $str = <<<end
<script>

window.location.assign("TimeTableDisplay.php");
</script>
end;
        echo $str;
    } else {
?>



        <head>
    <title>Time Table: Final Year</title>
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
              <li class="breadcrumb-item"><a href="timeTableTe.php">Time Table: Third Year</a></li>
              <li class="breadcrumb-item active">IT Timetable</li>
            </ol>
          </div>
        </div>
      </div>
    </section> 

    <section class="content content-centered">
    <div class="col-md-10 col-md-push-3">
                    <div class="row">
                        <header>
                            <h1>Time Table: Final Year</h1>
                        </header>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="Add">Add Row</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="RowCount" title="RolwCount" class="form-control">
                                        <option value="One" id="one">1 Subject</option>
                                        <option value="two" id="two">2 Subjects</option>
                                    </select>
                                    <!-- <button name="Add" id="Add" onclick="addRow()" class="btn btn-primary btn-block">Add</button>  -->
                                </div>
                                <?php

                                $conn = mysqli_connect("localhost", "root", "", "college");

                                $sql = "SELECT Date,Time1 FROM timetable";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $date1 = $row['Date'];
                                
                                $date2 = date('Y-m-d', strtotime("+1 day", strtotime($date1)));
                                $n = date('w', strtotime($date2));
                            
                                if ($n == 0) {
                                    $date2 = date('Y-m-d', strtotime("+1 day", strtotime($date2)));
                                    
                                }

                                $date3 = date('Y-m-d', strtotime("+1 day", strtotime($date2)));
                                $m = date('N', strtotime($date3));
                                if ($m == 7) { // 7 is the ISO-8601 numeric representation of Sunday
                                    $date3 = date('Y-m-d', strtotime("+1 day", strtotime($date3)));
                                }

                                ?>
                                <div class="col-md-4">

                                    <button name="Add" id="Add" onclick="addRow()" class="btn btn-primary btn-block">Add</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="form1" method="post" class="form-group" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <br />

                        <input type="hidden" name="Year" id="year" value="BE" /> 
                        <input type="hidden" name="Arrangement" id="Arrangement" title="Arrangement">
                <?php
            }
        }

                ?>
                <table class="table table-bordered table-condensed">
                    <tbody id="table">
                        <tr>
                            <th>Date</th>
                            <th>Subject</th>
                        </tr>
                    </tbody>
                </table>
                <br /><br />
                <input type="submit" name="submit" class="btn btn-primary btn-block" />
                    </form>

                </div>
        </section>

  </div>

  <?php include 'footer/footer.php';?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script>
                var sdate = new Date();
                sdate1 = '<?= $date1 ?>';
                sdate2 = '<?= $date2 ?>';
                sdate3 = '<?= $date3 ?>';

                var Sub = 1;
                var Dt = 1;
                var SubCount = 1;

                function addRow() {
                    var tbl = document.getElementById('table');
                    if (document.getElementById('one').selected == true) {
                        document.getElementById('Arrangement').value = document.getElementById('Arrangement').value + " 1 ";
                        var row1 = tbl.insertRow(tbl.childElementCount);
                        /*Date*/
                        var cell1 = row1.insertCell(row1.childElementCount);
                        date = "date" + Dt;
                        Dt++;
                        cell1.setAttribute("name", date);
                        //cell1.setAttribute("value", sdate)
                        var inputDt = document.createElement("input");
                        inputDt.setAttribute("type", "date");
                        inputDt.className = "form-control";
                        inputDt.setAttribute("name", date);
                        inputDt.setAttribute("id", 'date');

                        if (Dt == 2)
                            inputDt.setAttribute("value", sdate1);
                        if (Dt == 3)
                            inputDt.setAttribute("value", sdate2);
                        if (Dt == 4) {
                            inputDt.setAttribute("value", sdate3);
                            var myButton = document.getElementById("Add");

                            // Disable the button
                            myButton.disabled = true;
                        }
                        cell1.appendChild(inputDt);


                        /*sub1*/
                        var subject = "Sub" + Sub;
                        Sub++;
                        var cell4 = row1.insertCell(row1.childElementCount);
                        cell4.setAttribute("name", subject);
                        loadDoc(cell4);

                    } else {
                        document.getElementById('Arrangement').value = document.getElementById('Arrangement').value + " 2 ";

                        /*first row*/
                        var row2 = tbl.insertRow(tbl.childElementCount);

                        /*Date*/
                        var cell1 = row2.insertCell(row2.childElementCount);
                        cell1.setAttribute("rowspan", "2");
                        date = "date" + Dt;
                        Dt++;
                        cell1.setAttribute("name", date);

                        var inputDt = document.createElement("input");
                        inputDt.setAttribute("type", "date");
                        inputDt.setAttribute("name", date);
                        //inputDt.setAttribute("value", sdate);
                        inputDt.className = "form-control";

                        if (Dt == 2)
                            inputDt.setAttribute("value", sdate1);
                        if (Dt == 3)
                            inputDt.setAttribute("value", sdate2);
                        if (Dt == 4) {
                            inputDt.setAttribute("value", sdate3);
                            var myButton = document.getElementById("Add");

                            // Disable the button
                            myButton.disabled = true;
                        }
                        cell1.appendChild(inputDt);

                        /*sub1*/
                        var subject = "Sub" + Sub;
                        Sub++;
                        var cell4 = row2.insertCell(row2.childElementCount);
                        cell4.setAttribute("name", subject);
                        loadDoc(cell4);



                        /*Second tr*/
                        var row3 = tbl.insertRow(tbl.childElementCount);

                        /*sub1*/
                        var subject01 = "Sub" + Sub;
                        Sub++;
                        var cell3 = row3.insertCell(row3.childElementCount);
                        cell3.setAttribute("name", subject01);
                        loadDoc(cell3);

                    }
                }

                function loadDoc(element) {
                    var xhttp = new XMLHttpRequest();
                    if (!xhttp) {
                        xmlhhtp = new ActiveXObject('Microsoft.HTTPXML');
                    }

                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            element.innerHTML = this.responseText;

                        }
                    };
                    var year = document.getElementById("year").value;
                    xhttp.open("GET", "SubjectData.php?subject=" + SubCount + "&Year=" + year, true);
                    xhttp.send();
                    SubCount++;
                }
            </script>

            <script>
                document.getElementById('Arrangement').value = "";
            </script>

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