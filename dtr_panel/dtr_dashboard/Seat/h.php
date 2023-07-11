
<!doctype html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.css"/>
</head>
<body>
    
<?php include 'header/main_header.php';?>
  <?php include 'sidebar/main_sidebar.php';?>
  <?php include '../../../../init/model/class_model.php'; ?>

  
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage Report</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
    
            <div class="card">
<nav class="navbar navbar-default bg-primary">
    <div class="container-fluid">
        <!--header-->
        <div class="navbar-header">
            <div class="navbar-brand">
                SEATING ARRANGEMENT SYSTEM
            </div>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="form-group col-md-4 col-md-push-4">
        <form id="form1" action="seating_arrangement.php" method="POST">


            <!-- Adding Classes -->
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <label>Class A:</label>
                        <select name="Class_A" title="Class A" class="form-control" required>
                            <option value="Fe Comp">FE Comp</option>
                            <option value="Se Comp">SE Comp</option>
                            <option value="Te Comp">TE Comp</option>
                            <option value="Be Comp">BE Comp</option>
                        </select><br/>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Class B:</label>
                    <select name="Class_B" title="Class B" class="form-control" required>
                        <option value="Fe Comp">FE Comp</option>
                        <option value="Se Comp">SE Comp</option>
                        <option value="Te Comp">TE Comp</option>
                        <option value="Be Comp">BE Comp</option>
                    </select><br/>
                </div>
            </div>

            <!-- Capacity -->
            <div>
                <label>Capacity:</label>
                <select name="capacity" id="capacity" title="capacity" class="form-control" required>
                    <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'college') or die("Connection failed: " . mysqli_connect_error());

                    $query = "SELECT DISTINCT capacity FROM seat";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['capacity'] . '">' . $row['capacity'] . '</option>';
                        }
                    }

                    mysqli_close($conn);
                    ?>
                </select>
                <br/>
            </div>

            <!-- Available Rooms -->
            <label>Available Rooms:</label>
            <input type="text" name="rooms" id="rooms" class="form-control" readonly>
            <br/>

           <!-- Roll Numbers -->
<div class="row">
    <div class="col-md-6">
        <div>
            <label>Starting Roll No. for Class A:</label>
            <input type="number" name="startRollno1" id="startRollno1" class="form-control" required/><br/>
        </div>
    </div>
    <div class="col-md-6">
        <label>Ending Roll No. for Class A:</label>
        <input type="number" name="endRollno1" id="endRollno1" class="form-control" required/><br/>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div>
            <label>Starting Roll No. for Class B:</label>
            <input type="number" name="startRollno2" id="startRollno2" class="form-control" required/><br/>
        </div>
    </div>
    <div class="col-md-6">
        <label>Ending Roll No. for Class B:</label>
        <input type="number" name="endRollno2" id="endRollno2" class="form-control" required/><br/>
    </div>
</div>

</div>
        </div>
      </div>
    </section>
  </div>

<!-- <div class="text-center">
    <input type="button" name="submit" value="Submit" class="btn btn-primary" onclick="fetchRollNumbers()"/>
</div> -->

<script>
    function fetchRollNumbers() {
        var startRollno1 = document.getElementById('startRollno1').value;
        var endRollno1 = document.getElementById('endRollno1').value;
        var startRollno2 = document.getElementById('startRollno2').value;
        var endRollno2 = document.getElementById('endRollno2').value;

        // Perform an AJAX request to fetch the roll numbers from the database
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                var rollNumbers = response.rollNumbers;

                // Update the roll numbers in the respective input fields
                document.getElementById('startRollno1').value = rollNumbers.startRollno1;
                document.getElementById('endRollno1').value = rollNumbers.endRollno1;
                document.getElementById('startRollno2').value = rollNumbers.startRollno2;
                document.getElementById('endRollno2').value = rollNumbers.endRollno2;
            }
        };

        // Construct the URL with start and end roll numbers
        var url = 'fetch_roll_numbers.php?' +
            'startRollno1=' + startRollno1 +
            '&endRollno1=' + endRollno1 +
            '&startRollno2=' + startRollno2 +
            '&endRollno2=' + endRollno2;

        xhr.open('GET', url, true);
        xhr.send();
    }
</script>



            <div class="text-center">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
            </div>
        </form>
    </div>
</div>

<?php include '../footer/footer.php';?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>


<script>
// JavaScript code to update the available rooms textbox based on the selected capacity
document.getElementById('capacity').addEventListener('change', function() {
    var capacity = this.value;

    // Perform an AJAX request to fetch the available rooms based on the selected capacity
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            var availableRooms = response.availableRooms;
            var roomClasses = '';

            for (var i = 0; i < availableRooms.length; i++) {
                roomClasses += availableRooms[i].class + ', ';
            }
            // Remove the trailing comma and whitespace
            roomClasses = roomClasses.slice(0, -2);

            document.getElementById('rooms').value = roomClasses;
        }
    };

    xhr.open('GET', 'fetch_rooms.php?capacity=' + capacity, true);
    xhr.send();
});


</script>



</body>
</html>
