<?php
    require_once('../connection.php');
    $query1 = "SELECT * FROM student";
    $result = mysqli_query($con,$query1);
    $rr=mysqli_num_rows($result);
    if(!$rr) {
        echo "<h2 style='color:black;position:relative;top:35px;left:30%;'>No Students Have Registered For Exams Yet.</h2>";
    }
    else {
?>

<h3 style="color:black;" class="page-header"><u>Students Registered For Semester End Examination :</u></h3>

<div class="col-lg-12 mcon text-center">
    <table id="mytab1" width="100%" class="mtab table table-bordered table-hover table-responsive" style="margin-top:0;">
        <tr align='center' class="text-center" style="background-color:rgba(23,162,184,255);color:black;text-align:center;" class="table-info">
            <th style='border:2px solid black'>SL.No</th>
            <th style='border:2px solid black'>Name</th>
            <th style='border:2px solid black'>Roll Number</th>
            <th style='border:2px solid black'>Semester</th>
            <th style='border:2px solid black'>Mail - Id</th>
            <th style='border:2px solid black'>Phone</th>
            <th style='border:2px solid black'>RC</th>
            <th style='border:2px solid black'>Category</th>
        </tr>
        <?php
        $i=1;
        while($row = mysqli_fetch_array($result)) {
            echo "<tr style='color:black;border-bottom:2px solid black;border-right:2px solid black;border-top:2px solid black;border-left:2px solid black;'>";
            echo "<td style='border:2px solid black' align='center'>".$i."</td>";
            echo "<td style='border:2px solid black' align='center'>".$row['fname'].' '.$row['lname']."</td>";
            echo "<td style='border:2px solid black' align='center'>".$row['rno']."</td>";
            echo "<td style='border:2px solid black' align='center'>".$row['sem']."</td>";
            echo "<td style='border:2px solid black' align='center'>".$row['email']."</td>";
            echo "<td style='border:2px solid black' align='center'>".$row['phno']."</td>";
            echo "<td style='border:2px solid black' align='center'>".$row['rc']."</td>";
            echo "<td style='border:2px solid black' align='center'>".$row['categry']."</td>";
            echo "<tr />";
            $i++;
        }
        ?>
    </table>
    <!-- <button id="mbtn-a" class="mybtn" style="padding:5px;font-size:20px;">Create Excel</button> -->
</div>
<script>
    var wb = XLSX.utils.table_to_book(document.getElementById('mytab1'), {sheet:"Sheet JS"});
    var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type:'binary'});
    function s2ab(s) {
        var buf = new ArrayBuffer(s.length);
        var view = new Uint8Array(buf);
        for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
        return buf;
    }
    document.getElementById("mbtn-a").addEventListener("click", function(){
        saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'Sem_End.xlsx');
    });
</script>

<?php
    }
?>
