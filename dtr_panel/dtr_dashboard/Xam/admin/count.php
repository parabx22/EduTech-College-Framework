<?php
    
    #Count the number of Students Register For Sem End exams.
    $sreg = "SELECT * FROM student";
    $runsr = mysqli_query($con,$sreg);

    if($runsr){
    
    }
    $count=0;
    while($rowsr=mysqli_fetch_assoc($runsr))
    {
        $count++;
    }

  

    
?>