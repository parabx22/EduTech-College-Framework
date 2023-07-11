<?php

session_start();

if(!isset($_SESSION['Details']))
{
    header('Location: homepage.php');
	//header('Location: TimeTableDisplay.php');
}
require_once('fpdf.php');

class timeTable extends fpdf
{
	function Header()
	{
	$this->SetMargins(3,3,3);
	$this->Ln();
	$this->SetFont('Times','B',24);
	$this->Cell(0,1,"Don Bosco College Of Engineering",0,1,'C');
	$this->SetFont('Times','B',14);
	$this->Cell(0,1,"Department Of Computer Engineering",0,1,'C');
	$this->Cell(0,1,$GLOBALS['Year'],0,1,'C');
	$this->Cell(0,1,$GLOBALS['Exam'],0,1,'C');
	$this->SetFont('Times','B',12);
	$date = Date("d/m/Y");
	$this->Cell(0,1,"Date: $date",0,1,'L');
	$this->Ln();
	}

	function Footer()
	{
	$this->SetY(-3);
	$this->	Cell(10,0,"____________________");
	$this->SetX(-(9));
	$this->Cell(0,0,"____________________");
	$this->SetY(-2);
	$this->	Cell(4.2,1,"IT Cordinator",0,0,'C');
	$this->SetX(-9);
	$this->Cell(4,1,"HOD",0,0,'C');
	}
	function SingleDataBlock($Date,$from,$to,$sub)
	{
		$this->Cell(3,1,"$Date",1,0,'C');
		$this->Cell(3,1,"$from",1,0,'C');
		$this->Cell(3,1,"$to",1,0,'C');
		//$this->Cell(3,1,"$duration",1,0,'C');
		$this->Cell(3,1,"$sub",1,0,'C');
		$this->Ln();
	}

	function DoubleDataBlock($Date,$from1,$to1,$sub1,$from2,$to2,$sub2)
	{
		$this->Cell(3,2,"$Date",1,0,'C');

		$this->Cell(3,1,"$from1",1,0,'C');
		$this->Cell(3,1,"$to1",1,0,'C');
		//$this->Cell(3,1,"$duration1",1,0,'C');
		$this->Cell(3,1,"$sub1",1,0,'C');

		$this->Ln();
		$this->SetX(($this->GetX())+3);

		$this->Cell(3,1,"$from2",1,0,'C');
		$this->Cell(3,1,"$to2",1,0,'C');
		//$this->Cell(3,1,"$duration2",1,0,'C');
		$this->Cell(3,1,"$sub2",1,0,'C');

		$this->Ln();

	}

	function Title()
	{
	$this->SetFont('Times','B',14);
	$this->Cell(3,2,"Date",1,0,"C");
	$x = $this->GetX();
	$y = $this->GetY();
	$this->Cell(6,1,"Time",1,0,"C");
	//$this->Cell(3,2,"Duration",1,0,"C");
	$this->Cell(3,2,"Subject",1,0,"C");
	$this->SetY($y+1);
	$this->SetX($x);
	$this->SetFont('Times','I',14);
	$this->Cell(3,1,"From",1,0,"C");
	$this->Cell(3,1,"To",1,0,"C");
	$this->Ln();
	}
}
try {
     //   var_dump($_SESSION);

        $DETAILS = $_SESSION['Details'];
        $TimeTableData  = array('FE'=>$_SESSION['FE'],'SE'=>$_SESSION['SE'],'TE'=>$_SESSION['TE'],'BE'=>$_SESSION['BE']);
//var_dump($TimeTableData);
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

        //$Finish2 = $DETAILS['endTime2'];
//unset($_SESSION[$_POST['Year']]['Arrangement']);

        // $Duration1 = $Finish1 - $Start1;
        // $Duration2 = $Finish2 - $Start2;
//var_dump($_SESSION);

        $tt = new timeTable("P", "cm", "A4");
        foreach ($TimeTableData as $year => $yearTimeTable) {
            try {
                $GLOBALS['Year'] = $year;
                unset($_SESSION[$year]['Year']);
                //	var_dump($_SESSION[$year]["Arrangement"]);
                $Arrange = explode("  ",trim($_SESSION[$year]['Arrangement']));
                unset($yearTimeTable['Arrangement']);
                $yearTimeTable = array_values($yearTimeTable);
                $tt->AddPage();
                $tt->Title();
                $i = 0;
                foreach ($Arrange as $value) {
                    //var_dump($yearTimeTable);
                    //var_dump($i);
                    if ($value == 1) {
                        $Dt = $yearTimeTable[$i++];
                       // echo $Dt."<br/>";
                        $sub = $yearTimeTable[$i++];
                        //echo $sub."<br/>";
						if($year=='SE' || $year=='TE' ){
							$tt->SingleDataBlock($Dt, $Start1, $Finish1, $sub);
						}
						else{
							$tt->SingleDataBlock($Dt, $Start3, $Finish3, $sub);
						}
                        
                    }
                    if ($value == 2) {
                        $Dt = $yearTimeTable[$i++];
                        //echo $Dt."<br/>";
                        $sub1 = $yearTimeTable[$i++];
                        //echo $sub1."<br/>";
                        $sub2 = $yearTimeTable[$i++];
                        //echo $sub2."<br/>";
                        
						if($year=='SE' || $year=='TE' ){
							$tt->DoubleDataBlock($Dt, $Start1, $Finish1, $sub1, $Start2, $Finish2, $sub2);
						}
						else{
							$tt->DoubleDataBlock($Dt, $Start3, $Finish3, $sub1, $Start4, $Finish4, $sub2);
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
$tt->output('D','TimeTable.pdf');
$tt->Close();
//end;

?>