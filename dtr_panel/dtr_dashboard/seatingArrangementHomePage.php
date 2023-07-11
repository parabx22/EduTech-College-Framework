<?php

session_start();
if(!isset($_SESSION['Details']))
{
    header('Location: homepage.php');
}
else
{
    ?>

    <!doctype html>
    <html>
    <head>
        <title>
            Print TimeTable
        </title>
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
    <div class="col-md-4 col-md-push-4">
        <div class="data">
            <h1>Time Table Ready For Print </h1>
        </div>
        <button name="Print" id="Print" onclick="printTimeTable()" class="btn btn-primary btn-block">Print</button><br/>
        
    </div>
</div>
<!-- Button For Seating Arrangement-->
    <div>

</div>
<script>
    
    function printTimeTable()
    {
        alert("Printing TimeTable For All Years");
        document.getElementById('seatingArrangement').removeAttribute("disabled");
        window.location.assign("TimeTablePdf.php");
    }
</script>
</body>
    </html>
    <?php
}
?>