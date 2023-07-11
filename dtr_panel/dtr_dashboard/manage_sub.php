<?php
include 'header/main_header.php';?>

<?php
include 'sidebar/main_sidebar.php'; ?>
<?php
    require_once('connection.php');
    $query1 = "SELECT * FROM subject";
    $result = mysqli_query($con, $query1);
    $rr = mysqli_num_rows($result);
    if (!$rr) {
        echo "<h2 style='color:black;position:relative;top:35px;left:30%;'>No Students Have Registered For Exams Yet.</h2>";
    }
?>

<head>
    <title> Students Registered for Examination</title>
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
                    <h1>Subjects Offered</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Students Registered</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content content-centered">
    

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
    
            <div class="card">

              <div class="card-body">
                <table id="mytab1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Sr.No</th>
                                <th>Subject Id</th>
                                <th>Subject Name</th>
                                <th>Subject Code</th>
                                <th>Credits</th>
                                <th>Semester</th>
                                <th>RC</th>
                                <th>Dept</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php 
                      $conn = new class_model();
                      $emp = $conn->fetchAll_empAttendance();
                  ?>
                
        <?php
        $i=1;
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td >".$i."</td>";
            echo "<td >".$row['sub_id']."</td>";
            echo "<td >".$row['sub_name']."</td>";
            echo "<td >".$row['sub_code']."</td>";
            echo "<td >".$row['credits']."</td>";
            echo "<td >".$row['sem']."</td>";
            echo "<td >".$row['rc']."</td>";
            echo "<td >".$row['dept']."</td>";
            echo "<tr />";
            $i++;
        }
        ?>
                  </tr>
               <?php //}?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>




    </section>

</div>

<?php include 'footer/footer.php'; ?>
<aside class="control-sidebar control-sidebar-dark">
</aside>
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

<!-- <?php
    // }
?> -->


<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>

<script src="js/jquery-3.1.1.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
  $(function () {
    $("#mytab1").DataTable({
    });

  });

</script>


</body>

</html>

        
                