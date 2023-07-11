<?php

session_start();

if(!isset($_SESSION['Details']))
{
    header('Location: homepage.php');
}
require_once('fpdf.php');

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
        

<?php
class timeTable extends fpdf
{
    function FePrintTable($Dt, $Start1, $Finish1, $sub)
    {
        //$this->Title();
        echo '<header class="col-md-12"><label>Timetable for FE: </label></header>';
        $yearTimeTable = $_SESSION[$GLOBALS['Year']];
        $Arrange = explode("  ", trim($yearTimeTable['Arrangement']));
        unset($yearTimeTable['Arrangement']);
        $yearTimeTable = array_values($yearTimeTable);

        $html = '<table class="table table-bordered" style="border-color: black;">';
        $html .= '<tr><th style="text-align:center">Date</th><th style="text-align:center">From</th><th style="text-align:center">To</th><th style="text-align:center">Subject</th></tr>';

        $i = 0;
        foreach ($Arrange as $value) {
            if ($value == 1) {
                $Dt = $yearTimeTable[$i++];
                $sub = $yearTimeTable[$i++];
                //$html .= '<tr><td>'.$Dt.'</td><td>'.$Start1.'</td><td>'.$Finish1.'</td><td>'.$sub.'</td></tr>';
                $html .= '<tr><td><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"></td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub.'</td></tr>';
            }
            if ($value == 2) {
                $Dt = $yearTimeTable[$i++];
                $sub1 = $yearTimeTable[$i++];
                $html .= '<tr><td rowspan="2"><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"></td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub1.'</td></tr>';
            }
        }
        $html .= '</table><br>';

        // Display the timetable on the webpage
        echo $html;
    }
    function SePrintTable($Dt, $Start1, $Finish1, $sub)
    {
        //$this->Title();
        echo '<header class="col-md-12"><label>Timetable for SE: </label></header>';
        $yearTimeTable = $_SESSION[$GLOBALS['Year']];
        $Arrange = explode("  ", trim($yearTimeTable['Arrangement']));
        unset($yearTimeTable['Arrangement']);
        $yearTimeTable = array_values($yearTimeTable);

        $html = '<table class="table table-bordered" style="border-color: black;">';
        $html .= '<tr><th style="text-align:center">Date</th><th style="text-align:center">From</th><th style="text-align:center">To</th><th style="text-align:center">Subject</th></tr>';

        $i = 0;
        foreach ($Arrange as $value) {
            if ($value == 1) {
                $Dt = $yearTimeTable[$i++];
                $sub = $yearTimeTable[$i++];
                //$html .= '<tr><td>'.$Dt.'</td><td>'.$Start1.'</td><td>'.$Finish1.'</td><td>'.$sub.'</td></tr>';
                $html .= '<tr><td><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"></td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub.'</td></tr>';
            }
            if ($value == 2) {
                $Dt = $yearTimeTable[$i++];
                $sub1 = $yearTimeTable[$i++];
                $html .= '<tr><td rowspan="2"><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"></td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub1.'</td></tr>';
            }
        }
        $html .= '</table><br>';

        // Display the timetable on the webpage
        echo $html;
    }
    function TePrintTable($Dt, $Start1, $Finish1, $sub)
    {
        //$this->Title();
        echo '<header class="col-md-12"><label>Timetable for TE: </label></header>';
        $yearTimeTable = $_SESSION[$GLOBALS['Year']];
        $Arrange = explode("  ", trim($yearTimeTable['Arrangement']));
        unset($yearTimeTable['Arrangement']);
        $yearTimeTable = array_values($yearTimeTable);

        $html = '<table class="table table-bordered" style="border-color: black;">';
        $html .= '<tr><th style="text-align:center">Date</th><th style="text-align:center">From</th><th style="text-align:center">To</th><th style="text-align:center">Subject</th></tr>';

        $i = 0;
        foreach ($Arrange as $value) {
            if ($value == 1) {
                $Dt = $yearTimeTable[$i++];
                $sub = $yearTimeTable[$i++];
                //$html .= '<tr><td>'.$Dt.'</td><td>'.$Start1.'</td><td>'.$Finish1.'</td><td>'.$sub.'</td></tr>';
                $html .= '<tr><td><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"></td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub.'</td></tr>';
            }
            if ($value == 2) {
                $Dt = $yearTimeTable[$i++];
                $sub1 = $yearTimeTable[$i++];
                $html .= '<tr><td rowspan="2"><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"></td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub1.'</td></tr>';
            }
        }
        $html .= '</table><br>';

        // Display the timetable on the webpage
        echo $html;
    }
    function BePrintTable($Dt, $Start1, $Finish1, $sub)
    {
        //$this->Title();
        echo '<header class="col-md-12"><label>Timetable for BE: </label></header>';
        $yearTimeTable = $_SESSION[$GLOBALS['Year']];
        $Arrange = explode("  ", trim($yearTimeTable['Arrangement']));
        unset($yearTimeTable['Arrangement']);
        $yearTimeTable = array_values($yearTimeTable);

        $html = '<table class="table table-bordered" style="border-color: black;">';
        $html .= '<tr><th style="text-align:center">Date</th><th style="text-align:center">From</th><th style="text-align:center">To</th><th style="text-align:center">Subject</th></tr>';

        $i = 0;
        foreach ($Arrange as $value) {
            if ($value == 1) {
                $Dt = $yearTimeTable[$i++];
                $sub = $yearTimeTable[$i++];
                //$html .= '<tr><td>'.$Dt.'</td><td>'.$Start1.'</td><td>'.$Finish1.'</td><td>'.$sub.'</td></tr>';
                $html .= '<tr><td><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"></td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub.'</td></tr>';
            }
            if ($value == 2) {
                $Dt = $yearTimeTable[$i++];
                $sub1 = $yearTimeTable[$i++];
                $html .= '<tr><td rowspan="2"><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"></td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub1.'</td></tr>';
            }
        }
        $html .= '</table><br>';

        // Display the timetable on the webpage
        echo $html;
    }


    function FePrintTable2($Dt, $Start1, $Finish1, $sub1, $Start2, $Finish2, $sub2)
    {

        echo '<header class="col-md-12"><label>Timetable for FE: </label></header>';
        $yearTimeTable = $_SESSION[$GLOBALS['Year']];
        $Arrange = explode("  ", trim($yearTimeTable['Arrangement']));
        unset($yearTimeTable['Arrangement']);
        $yearTimeTable = array_values($yearTimeTable);

        $html = '<table class="table table-bordered" >';
        $html .= '<tr><th style="text-align:center">Date</th><th style="text-align:center">From</th><th style="text-align:center">To</th><th style="text-align:center">Subject</th></tr>';

        $i = 0;
        foreach ($Arrange as $value) {
            if ($value == 1) {
                $Dt = $yearTimeTable[$i++];
                $sub = $yearTimeTable[$i++];
                $html .= '<tr><td><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"</td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub.'</td></tr>';
            }
            if ($value == 2) {
                $Dt = $yearTimeTable[$i++];
                $sub1 = $yearTimeTable[$i++];
                $sub2 = $yearTimeTable[$i++];
                $html .= '<tr><td rowspan="2"><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"</td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub1.'</td></tr>';
                $html .= '<tr><td><input type="time" name="startTime2" title="startTime2" class="form-control" value="'.$Start2.'"</td><td><input type="time" name="finishTime2" title="finishTime2" class="form-control" value="'.$Finish2.'"</td><td>'.$sub2.'</td></tr>';
            }
        }
        $html .= '</table><br>';

        // Display the timetable on the webpage
        echo $html;
    }
    
    function SePrintTable2($Dt, $Start1, $Finish1, $sub1, $Start2, $Finish2, $sub2)
    {

        echo '<header class="col-md-12"><label>Timetable for SE: </label></header>';
        $yearTimeTable = $_SESSION[$GLOBALS['Year']];
        $Arrange = explode("  ", trim($yearTimeTable['Arrangement']));
        unset($yearTimeTable['Arrangement']);
        $yearTimeTable = array_values($yearTimeTable);

        $html = '<table class="table table-bordered" >';
        $html .= '<tr><th style="text-align:center">Date</th><th style="text-align:center">From</th><th style="text-align:center">To</th><th style="text-align:center">Subject</th></tr>';

        $i = 0;
        foreach ($Arrange as $value) {
            if ($value == 1) {
                $Dt = $yearTimeTable[$i++];
                $sub = $yearTimeTable[$i++];
                $html .= '<tr><td><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"</td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub.'</td></tr>';
            }
            if ($value == 2) {
                $Dt = $yearTimeTable[$i++];
                $sub1 = $yearTimeTable[$i++];
                $sub2 = $yearTimeTable[$i++];
                $html .= '<tr><td rowspan="2"><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"</td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub1.'</td></tr>';
                $html .= '<tr><td><input type="time" name="startTime2" title="startTime2" class="form-control" value="'.$Start2.'"</td><td><input type="time" name="finishTime2" title="finishTime2" class="form-control" value="'.$Finish2.'"</td><td>'.$sub2.'</td></tr>';
            }
        }
        $html .= '</table><br>';

        // Display the timetable on the webpage
        echo $html;
    }
    function TePrintTable2($Dt, $Start1, $Finish1, $sub1, $Start2, $Finish2, $sub2)
    {

        echo '<header class="col-md-12"><label>Timetable for TE: </label></header>';
        $yearTimeTable = $_SESSION[$GLOBALS['Year']];
        $Arrange = explode("  ", trim($yearTimeTable['Arrangement']));
        unset($yearTimeTable['Arrangement']);
        $yearTimeTable = array_values($yearTimeTable);

        $html = '<table class="table table-bordered" >';
        $html .= '<tr><th style="text-align:center">Date</th><th style="text-align:center">From</th><th style="text-align:center">To</th><th style="text-align:center">Subject</th></tr>';

        $i = 0;
        foreach ($Arrange as $value) {
            if ($value == 1) {
                $Dt = $yearTimeTable[$i++];
                $sub = $yearTimeTable[$i++];
                $html .= '<tr><td><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"</td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub.'</td></tr>';
            }
            if ($value == 2) {
                $Dt = $yearTimeTable[$i++];
                $sub1 = $yearTimeTable[$i++];
                $sub2 = $yearTimeTable[$i++];
                $html .= '<tr><td rowspan="2"><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"</td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub1.'</td></tr>';
                $html .= '<tr><td><input type="time" name="startTime2" title="startTime2" class="form-control" value="'.$Start2.'"</td><td><input type="time" name="finishTime2" title="finishTime2" class="form-control" value="'.$Finish2.'"</td><td>'.$sub2.'</td></tr>';
            }
        }
        $html .= '</table><br>';

        // Display the timetable on the webpage
        echo $html;
    }
    function BePrintTable2($Dt, $Start1, $Finish1, $sub1, $Start2, $Finish2, $sub2)
    {

        echo '<header class="col-md-12"><label>Timetable for BE: </label></header>';
        $yearTimeTable = $_SESSION[$GLOBALS['Year']];
        $Arrange = explode("  ", trim($yearTimeTable['Arrangement']));
        unset($yearTimeTable['Arrangement']);
        $yearTimeTable = array_values($yearTimeTable);

        $html = '<table class="table table-bordered" >';
        $html .= '<tr><th style="text-align:center">Date</th><th style="text-align:center">From</th><th style="text-align:center">To</th><th style="text-align:center">Subject</th></tr>';

        $i = 0;
        foreach ($Arrange as $value) {
            if ($value == 1) {
                $Dt = $yearTimeTable[$i++];
                $sub = $yearTimeTable[$i++];
                $html .= '<tr><td><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"</td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub.'</td></tr>';
            }
            if ($value == 2) {
                $Dt = $yearTimeTable[$i++];
                $sub1 = $yearTimeTable[$i++];
                $sub2 = $yearTimeTable[$i++];
                $html .= '<tr><td rowspan="2"><input type="date" name="date" title="date" class="form-control" value="'.$Dt.'"</td><td><input type="time" name="startTime1" title="startTime1" class="form-control" value="'.$Start1.'"</td><td><input type="time" name="finishTime1" title="finishTime1" class="form-control" value="'.$Finish1.'"</td><td>'.$sub1.'</td></tr>';
                $html .= '<tr><td><input type="time" name="startTime2" title="startTime2" class="form-control" value="'.$Start2.'"</td><td><input type="time" name="finishTime2" title="finishTime2" class="form-control" value="'.$Finish2.'"</td><td>'.$sub2.'</td></tr>';
            }
        }
        $html .= '</table><br>';

        // Display the timetable on the webpage
        echo $html;
    }
}
try {


        $DETAILS = $_SESSION['Details'];
        $TimeTableData  = array('FE'=>$_SESSION['FE'],'SE'=>$_SESSION['SE'],'TE'=>$_SESSION['TE'],'BE'=>$_SESSION['BE']);

        $GLOBALS['Exam'] = $DETAILS['Exam'];
        $Start1 = $DETAILS['startTime1'];
        $Finish1 = strtotime("+1 hour", strtotime($Start1));
		$Finish1 = date('H:i', $Finish1);
		$Start2 = strtotime("+1 hour", strtotime($Finish1));
		$Start2 = date('H:i', $Start2);
		$Finish2 = strtotime("+1 hour", strtotime($Start2));
		$Finish2 = date('H:i', $Finish2);

		$Start3 = $DETAILS['startTime3'];
		$Finish3 = strtotime("+1 hour", strtotime($Start3));
		$Finish3 = date('H:i', $Finish3);
		$Start4 = strtotime("+1 hour", strtotime($Finish3));
		$Start4 = date('H:i', $Start4);
		$Finish4 = strtotime("+1 hour", strtotime($Start4));
		$Finish4 = date('H:i', $Finish4);


        $tt = new timeTable("P", "cm", "A4");
        foreach ($TimeTableData as $year => $yearTimeTable) {
            try {
                $GLOBALS['Year'] = $year;
                unset($_SESSION[$year]['Year']);
                $Arrange = explode("  ",trim($_SESSION[$year]['Arrangement']));
                $Arrange = array_reverse($Arrange);

                //var_dump($Arrange);
                unset($yearTimeTable['Arrangement']);
                $yearTimeTable = array_values($yearTimeTable);
                $tt->AddPage();
                //$tt->Title();
                $i = 0;
                foreach ($Arrange as $value) {
                    //var_dump($value);
                    //var_dump($i);
                    if ($value == 1) {
                        $Dt = $yearTimeTable[$i++];
                       // echo $Dt."<br/>";
                        $sub = $yearTimeTable[$i++];
                        //echo $sub."<br/>";
						if($year=='SE'){
							//$tt->SingleDataBlock($Dt, $Start1, $Finish1, $sub);
                            // $tt->AddPage();
                            $tt->SePrintTable($Dt, $Start1, $Finish1, $sub);
                            break;
                            
						}
                        if($year=='TE'){
							//$tt->SingleDataBlock($Dt, $Start1, $Finish1, $sub);
                            // $tt->AddPage();
                             $tt->TePrintTable($Dt, $Start1, $Finish1, $sub);
                            break;
                            
						}
						if($year=='FE'){
							//$tt->SingleDataBlock($Dt, $Start3, $Finish3, $sub);
                            //$tt->AddPage();
                            $tt->FePrintTable($Dt, $Start3, $Finish3, $sub);
                            break;
						}
                        if($year=='BE'){
							//$tt->SingleDataBlock($Dt, $Start3, $Finish3, $sub);
                            //$tt->AddPage();
                            $tt->BePrintTable($Dt, $Start3, $Finish3, $sub);
                            break;
						}
                        
                    }
                    if ($value == 2) {
                        $Dt = $yearTimeTable[$i++];
                        //echo $Dt."<br/>";
                        $sub1 = $yearTimeTable[$i++];
                        //echo $sub1."<br/>";
                        $sub2 = $yearTimeTable[$i++];
                        //echo $sub2."<br/>";
                        
						if($year=='SE'){
							//$tt->DoubleDataBlock($Dt, $Start1, $Finish1, $sub1, $Start2, $Finish2, $sub2);
                            //$tt->AddPage();
                            $tt->SePrintTable2($Dt, $Start1, $Finish1, $sub1, $Start2, $Finish2, $sub2);
                            break;
						}
                        if($year=='TE' ){
							//$tt->DoubleDataBlock($Dt, $Start1, $Finish1, $sub1, $Start2, $Finish2, $sub2);
                            //$tt->AddPage();
                            $tt->TePrintTable2($Dt, $Start1, $Finish1, $sub1, $Start2, $Finish2, $sub2);
                            break;
						}
						if($year=='FE'){
							//$tt->DoubleDataBlock($Dt, $Start3, $Finish3, $sub1, $Start4, $Finish4, $sub2);
                            //$tt->AddPage();
                            $tt->FePrintTable2($Dt, $Start3, $Finish3, $sub1, $Start4, $Finish4, $sub2);
                            break;
						}
                        if($year=='BE'){
							//$tt->DoubleDataBlock($Dt, $Start3, $Finish3, $sub1, $Start4, $Finish4, $sub2);
                            //$tt->AddPage();
                            $tt->BePrintTable2($Dt, $Start3, $Finish3, $sub1, $Start4, $Finish4, $sub2);
                            break;
						}
                        
                    }
                    
                    
                }
                
            } catch (ErrorException $e) {
                //echo $e;
                header('Location:homepage.php');
            }         
    }
}
catch(Exception $e)
{
    header('Location: homepage.php');
}
?>
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
            window.location.assign("TimeTablePdf.php");
        }
    </script>
    </body>
        </html>
<?php
$tt->Close();
?>