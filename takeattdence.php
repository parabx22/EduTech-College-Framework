
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <script>
        $(document).ready(function() {
            $('#dataTable_1').DataTable();
        });
    </script>

    <title>DTR Management System</title>
</head>
<nav class="navbar navbar-expand-lg" style="background-color: #343a40">
    <a class="navbar-brand" href="#"><strong style="color: #fff"><i class='fa fa-user-clock'></i> DAILY TIME RECORD</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="dtr_panel/dtr_dashboard/dashboard.php" style="color: #fff"><b><i class="fa fa-user"></i> DASHBOARD </b></a>
            
            </li>
            <!-- <a class="nav-link" href="employee/index.php" style="color: #fff"><b><i class="fa fa-user"></i>STUDENT LOGIN </b></a> -->
        </ul>

    </div>
</nav><br>

<body onload="startTime()"><br>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <center>
                    <p style="border: 1px solid #343a40;background-color: #343a40;color: #fff"><i class="fas fa-qrcode"></i> TAP HERE</p>
                </center>
                 <video id="preview" width="100%"></video>
                 <?php include 'config/attendance_process.php';?>
                 <hr></hr>
            </div>

            <div class="col-md-8">
                <center>
                    <div id="clockdate" style="border: 1px solid #343a40;background-color: #343a40">
                        <div class="clockdate-wrapper">
                            <div id="clock" style="font-weight: bold; color: #fff;font-size: 40px"></div>
                            <div id="date" style="color: #fff"><i class="fas fa-calendar"></i> <?php echo date('l, F j, Y'); ?></div>
                        </div>
                    </div>
                </center>
                <form action="" method="POST" class="form-harizontal">

                    <label><b>SCAN QR CODE</b></label>
                    <input type="text" name="employee_qrcode" id="employee_qrcode" readonly="" placeholder="scan qrcode" class="form-control">
                </form>
                <hr>
                </hr>
               <div class="table-responsive">
                <table id="dataTable_1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Student-ID NO.</th>
                            <th>Student Name</th>
                            <th>TIME IN</th>
                            <!-- <th>TIME OUT</th> -->
                            <th>LOGDATE</th>

                        </tr>
                    </thead>
                    <tbody>    
                   <?php 
                      include('init/model/class_model.php');
                      $conn = new class_model();
                      $dtr = $conn->fetchAll_attendance();
                    ?>
                    <?php foreach ($dtr as $row) { ?>
                        <tr align="center">
                            <td><?= htmlentities($row['employee_idno']); ?></td>
                            <td><?= htmlentities($row['first_name']); ?></td>
                            <td><?= htmlentities($row['time_in']); ?></td>
                            <td><?= htmlentities(date("M d, Y",strtotime($row['logdate']))); ?></td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
          </div>

      </div>
    </div>

    <script>
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('No cameras found');
            }

        }).catch(function(e) {
            console.error(e);
        });

        scanner.addListener('scan', function(c) {
            document.getElementById('employee_qrcode').value = c;
            document.forms[0].submit();
        });
    </script>

     <script type="text/javascript">
      document.oncontextmenu = document.body.oncontextmenu = function() {return false;}//disable right click
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>