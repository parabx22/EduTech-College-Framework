<?php
session_start();


if(!isset($_SESSION['Details']))
{
    header('Location: homepage.php');
}
else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $_SESSION['SE'] = $_POST;
        unset($_SESSION['SE']['Year']);
        $str =<<<end
<script>

window.location.assign("TimeTableTe.php");
</script>
end;
        echo $str;
    }
    else
        {
        ?>


        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Time Table: Second Year</title>
            <link rel="stylesheet" href="bootstrap/bootstrap.css"/>
        </head>
        <body>
        <nav class="navbar navbar-default bg-primary">
            <div class="container-fluid">
                <!--header-->
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">TIMETABLE GENERATION SYSTEM</a>
                </div>

            </div>
        </nav>
        <div class="container-fluid">
            <div class="col-md-6 col-md-push-3">
                <div class="row">
                    <header>
                        <h1>Time Table: Second Year</h1>
                    </header>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="Add">Add Row</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select name="RowCount" title="RolwCount" class="form-control">
                            <option value="One" id="one">1 Subject</option>
                            <option value="two" id="two">2 Subjects</option>
                        </select>
                    </div>
                    <?php

                            //$date = date('Y-m-d');
                            $conn = mysqli_connect("localhost", "root", "", "college");

                            $sql = "SELECT Date, Time2 FROM timetable";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $date1 = $row['Date'];
                            $from1 = $row['Time2'];
                            //echo $from1;
                            $to1 = date('H:i', strtotime("+1 hour", strtotime($from1)));
                            //echo $to1;
                            $date2 = date('Y-m-d', strtotime("+1 day", strtotime($date1)));
                            $n = date('w', strtotime($date2));
                            //echo $n;
                            if ( $n == 0) { 
                                 $date2 = date('Y-m-d', strtotime("+1 day", strtotime($date2)));
                                 //echo $date2;
                              }

                            $date3 = date('Y-m-d', strtotime("+1 day", strtotime($date2)));
                            $m = date('N', strtotime($date3));
                            if ($m == 7) { // 7 is the ISO-8601 numeric representation of Sunday
                                $date3 = date('Y-m-d', strtotime("+1 day", strtotime($date3)));
                              }
                            // echo $date1;                
                            // echo $date2;
                            // echo $date3;                                       
                            ?>
                    <div class="col-md-4">
                        
                        <button name="Add" id="Add" onclick="addRow()" class="btn btn-primary btn-block">Add</button>
                        
                    </div>
                </div>
            </div>
            <form id="form1" method="post" class="form-group" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <br/>
                
                <input type="hidden" name="Year" id="year" value="SE"/>  <!-- For subjects dropdown -->
                <input type="hidden" name="Arrangement" id="Arrangement" value="<?php //echo $date ?>" title="Arrangement" >
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
                <br/><br/>
                <input type="Submit" name="submit" class="btn btn-primary btn-block"/> 
            </form>
            
            <?php
        // $subject = $_POST['Sub1'];
        // echo $subject;

        if (isset($_POST['submit'])) {
            // $date =  $_POST['Exam'];
            // $from = $_POST['Semester'];
            // $to =  $_POST['time1'];
            // $subject = $_POST['Sub1'];
            // echo $subject;
            //$date = $_POST['date'];

            $sql = mysqli_query($conn, "INSERT INTO `se_timetable`(`Date`, `FromTime`, `ToTime`) VALUES ('$date1','$from1','$to1')");
            
            mysqli_close($conn);
        }
?>

            </div>
        </div>
        
        <script> 
        var sdate= new Date();
        sdate1= '<?=$date1 ?>';
        sdate2= '<?=$date2 ?>';
        sdate3= '<?=$date3 ?>';

        var Sub = 1;
        var Dt = 1;
        var SubCount=1;
        function addRow()
        {
            var tbl = document.getElementById('table');
            if(document.getElementById('one').selected==true) 
            {
                document.getElementById('Arrangement').value = document.getElementById('Arrangement').value + " 1 ";
                var row1 = tbl.insertRow(tbl.childElementCount);
                /*Date*/
                var cell1 = row1.insertCell(row1.childElementCount);
                date="date"+Dt;  Dt++;
                cell1.setAttribute("name",date);
                //cell1.setAttribute("value", sdate)
                var inputDt = document.createElement("input");
                inputDt.setAttribute("type","date");
                inputDt.className="form-control";
                inputDt.setAttribute("name",date);
                inputDt.setAttribute("id",'date');

                if(Dt==2)
                    inputDt.setAttribute("value", sdate1);
                if(Dt==3)
                    inputDt.setAttribute("value", sdate2);
                if(Dt==4){
                    inputDt.setAttribute("value", sdate3);
                    var myButton = document.getElementById("Add");

                    // Disable the button
                    myButton.disabled = true;
                }
                cell1.appendChild(inputDt);
                

                /*sub1*/
                var subject = "Sub"+Sub;  Sub++;
                var cell4 = row1.insertCell(row1.childElementCount);
                cell4.setAttribute("name",subject);
                cell4.setAttribute("id",subject);
                loadDoc(cell4);

            }
            else
            {
                document.getElementById('Arrangement').value = document.getElementById('Arrangement').value + " 2 ";

                /*first row*/
                var row2 = tbl.insertRow(tbl.childElementCount);

                /*Date*/
                var cell1 = row2.insertCell(row2.childElementCount);
                cell1.setAttribute("rowspan","2");
                date="date"+Dt;  Dt++;
                cell1.setAttribute("name",date);

                var inputDt = document.createElement("input");
                inputDt.setAttribute("type","date");
                inputDt.setAttribute("name",date);
                //inputDt.setAttribute("value", sdate);
                inputDt.className = "form-control";

                if(Dt==2)
                    inputDt.setAttribute("value", sdate1);
                if(Dt==3)
                    inputDt.setAttribute("value", sdate2);
                if(Dt==4){
                    inputDt.setAttribute("value", sdate3);
                    var myButton = document.getElementById("Add");

                    // Disable the button
                    myButton.disabled = true;
                }
                cell1.appendChild(inputDt);

                /*sub1*/
                var subject = "Sub"+Sub;  Sub++;
                var cell4 = row2.insertCell(row2.childElementCount);
                cell4.setAttribute("name",subject);
                loadDoc(cell4);



                /*Second tr*/
                var  row3 = tbl.insertRow(tbl.childElementCount);

                /*sub1*/
                var subject01 = "Sub"+Sub;  Sub++;
                var cell3 = row3.insertCell(row3.childElementCount);
                cell3.setAttribute("name",subject01);
                loadDoc(cell3);

            }
        }

        function loadDoc(element)
            {
                var xhttp = new XMLHttpRequest();
                if(!xhttp)
                {
                xmlhhtp = new ActiveXObject('Microsoft.HTTPXML');
                }

                xhttp.onreadystatechange = function()
                {
                if(this.readyState == 4 && this.status ==200)
                {
                    element.innerHTML=this.responseText;

                }
                };
                var year = document.getElementById("year").value;
                xhttp.open("GET","SubjectData.php?subject="+SubCount+"&Year="+year,true);
                xhttp.send();
                SubCount++;
            }
        </script>

        <script>
            document.getElementById('Arrangement').value = "";
        </script>
        

        
        </body>
        </html>
   