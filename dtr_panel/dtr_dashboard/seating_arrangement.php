<?php
include 'header/main_header.php';?>

<?php
include 'sidebar/main_sidebar.php'; ?>

<head>
    <title> Seating Arrangment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1000px;
        }

        .table-container {
            /* margin-top: 50px; */
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .room-info {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #dee2e6;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .table td.empty {
            visibility: hidden;
        }

        .entrance-line {
            border-top: 2px solid #000;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .entrance-label {
            text-align: right;
            font-size: 14px;
            white-space: nowrap;
            overflow: hidden;
        }

        .print-btn {
            text-align: center;
            margin-top: 20px;
            display: block;
        }

        @media print {
            .print-btn {
                display: none;
            }
        }

        .content-centered {
            /* display: flex; */
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
                    <h1>Seating Arrangment Generation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="SeatHomepage.php">Seating Arrangment Homepage</a></li>
                        <li class="breadcrumb-item active">Seating Arrangment</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content content-centered">
    <div class="table-container">
            <h2 class="table-title">Seating Arrangement</h2>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get the form input values
                $classA = $_POST['Class_A'];
                $classB = $_POST['Class_B'];
                $capacity = $_POST['capacity'];
                $startRollno1 = $_POST['startRollno1'];
                $endRollno1 = $startRollno1 + floor($capacity/2) - 1;
                // $endRollno1 = $startRollno1 + ($capacity/2) - 1;
                $startRollno2 = $_POST['startRollno2'];
                $endRollno2 = $startRollno2 + floor($capacity/2) - 1;

                // Retrieve the available rooms from the form input
                $availableRooms = $_POST['rooms'];

                // Generate the seating arrangement table based on the provided details
                $tableHtml = '<div class="room-info">';
                $tableHtml .= 'Class: ' . $availableRooms . '<br>';
                $tableHtml .= 'Roll Numbers: ' . $startRollno1 . ' to ' . $endRollno1 . ' (Class ' . $classA . ') and ' . $startRollno2 . ' to ' . $endRollno2 . ' (Class ' . $classB . ')';
                $tableHtml .= '</div>';

                $tableHtml .= '<div class="entrance-line"></div>';
                $tableHtml .= '<div class="entrance-label">ENTRANCE</div>';
                $tableHtml .= '<div class="entrance-line"></div>';
                $tableHtml .= '<table class="table">';
                $tableHtml .= '<thead>';
                $tableHtml .= '<tr>';
                $tableHtml .= '<th>Row 1</th>';
                $tableHtml .= '<th>Row 2</th>';
                $tableHtml .= '<th>Row 3</th>';
                $tableHtml .= '<th>Row 4</th>';
                $tableHtml .= '</tr>';
                $tableHtml .= '</thead>';
                $tableHtml .= '<tbody>';

                $rollnoCount1 = $startRollno1; // Starting roll number for Class A
                $rollnoCount2 = $startRollno2; // Starting roll number for Class B

                // Calculate the number of rows needed
                $rowCount = ceil($capacity / 4);

                // Generate the rows and seats
                for ($row = 1; $row <= $rowCount; $row++) {
                    $tableHtml .= '<tr>';

                    for ($col = 1; $col <= 4; $col++) {
                        $seatNumber = ($col - 1) * $rowCount + $row;

                        if ($seatNumber <= $capacity) {
                            $tableHtml .= '<td draggable="true" ondragstart="handleDragStart(event)" ondragover="handleDragOver(event)" ondrop="handleDrop(event)" ondragend="handleDragEnd(event)" contenteditable="true">';
                            $tableHtml .= '<div class="seat-info">';
                            $tableHtml .= 'Seat No: ' . $seatNumber . '<br>';

                            if ($col % 2 == 0) {
                                if ($row % 2 != 0) {
                                    $tableHtml .= 'Class ' . $classA . '<br>';
                                    $tableHtml .= 'Roll No: <span class="rollno">' . $rollnoCount1 . '</span>';
                                    $rollnoCount1++;
                                } else {
                                    $tableHtml .= 'Class ' . $classB . '<br>';
                                    $tableHtml .= 'Roll No: <span class="rollno">' . $rollnoCount2 . '</span>';
                                    $rollnoCount2++;
                                }
                            } else {
                                if ($row % 2 != 0) {
                                    $tableHtml .= 'Class ' . $classB . '<br>';
                                    $tableHtml .= 'Roll No: <span class="rollno">' . $rollnoCount1 . '</span>';
                                    $rollnoCount1++;
                                } else {
                                    $tableHtml .= 'Class ' . $classA . '<br>';
                                    $tableHtml .= 'Roll No: <span class="rollno">' . $rollnoCount2 . '</span>';
                                    $rollnoCount2++;
                                }
                            }

                            $tableHtml .= '</div>';
                            $tableHtml .= '</td>';
                        } else {
                            $tableHtml .= '<td class="empty"></td>';
                        }
                    }

                    $tableHtml .= '</tr>';
                }

                $tableHtml .= '</tbody>';
                $tableHtml .= '</table>';

                echo $tableHtml;
            }
            ?>


            <div class="print-btn">
                <button class="btn btn-primary" onclick="window.print()">Print</button>
            </div>
        </div>
    </section>

</div>

<?php include 'footer/footer.php'; ?>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<script>
        const handleDragStart = (e) => {
            e.target.style.opacity = '0.4';
            e.dataTransfer.setData('text/plain', e.target.innerHTML);
            e.dataTransfer.setData('text/plain', e.target.dataset.cellIndex);
            e.dataTransfer.setData('text/plain', e.target.parentNode.dataset.rowIndex);
            e.dataTransfer.setData('text/plain', e.target.querySelector('.rollno').innerHTML);
        };

        const handleDragOver = (e) => {
            e.preventDefault();
        };

        const handleDrop = (e) => {
            e.preventDefault();
            const sourceContent = e.dataTransfer.getData('text/plain');
            const targetContent = e.target.innerHTML;
            const sourceCellIndex = e.dataTransfer.getData('text/plain');
            const targetCellIndex = e.target.dataset.cellIndex;
            const sourceRowIndex = e.dataTransfer.getData('text/plain');
            const targetRowIndex = e.target.parentNode.dataset.rowIndex;
            const sourceCell = document.querySelector(
                `td[data-row-index='${sourceRowIndex}'][data-cell-index='${sourceCellIndex}']`
            );
            const targetCell = document.querySelector(
                `td[data-row-index='${targetRowIndex}'][data-cell-index='${targetCellIndex}']`
            );

            e.target.innerHTML = sourceContent;
            e.target.querySelector('.rollno').innerHTML = e.dataTransfer.getData('text/plain');
            sourceCell.innerHTML = targetContent;
            sourceCell.querySelector('.rollno').innerHTML = e.dataTransfer.getData('text/plain');
            e.target.style.opacity = '1';
        };

        const handleDragEnd = (e) => {
            e.target.style.opacity = '1';
        };
    </script>

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

</body>

</html>
