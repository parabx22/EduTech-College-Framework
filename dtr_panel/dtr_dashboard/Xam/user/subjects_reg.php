<?php
require_once('../connection.php');
$query1 = "SELECT * FROM exam_reg where rno = '$user'";
$result = mysqli_query($con, $query1);
$rr = mysqli_num_rows($result);
if (!$rr) {
    echo "<h2 style='color:red;color:#ff0000;font-family:Acme;'>You have Registered For Exam Yet.!</h2>";
} else {}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Ticket</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <style>
        .container {
    overflow-x: auto;
}

table {
    white-space: nowrap;
}

        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        .container {
            margin: 5% auto;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Subjects Registered</h1>
    <div class="container">
        <table id="example" class="display">
            <thead>
                <tr>
                    <th>Sl No.</th>
                    <th>Subject Name</th>
                    <th>RC</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $row['selected_subjects'] . "</td>";
                    echo "<td>" . $row['rc'] . "</td>";
                    echo "</tr>";
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#example").DataTable();
        });
    </script>
</body>

</html>
