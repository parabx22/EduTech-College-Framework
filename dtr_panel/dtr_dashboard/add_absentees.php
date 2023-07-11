<?php
// Include the necessary files
include 'header/main_header.php';
include 'sidebar/main_sidebar.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted data
    $qrCode = $_POST['qr_code'];
    $employeeId = $_POST['employee_id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    // Perform the logic to add/update the attendance in the database
    $conn = new class_model();

    // Check if the record already exists for the given date
    $existingRecord = $conn->fetchAttendanceByDate($employeeId, $date);

    if ($existingRecord) {
        // Update the existing record
        $result = $conn->updateAttendance($employeeId, $date, $status);
        $message = ($result) ? "Attendance updated successfully!" : "Failed to update attendance. Please try again.";
    } else {
        // Add a new attendance record
        $result = $conn->addAttendance($qrCode, $employeeId, $firstName, $lastName, $date, $status);
        $message = ($result) ? "Attendance added successfully!" : "Failed to add attendance. Please try again.";
    }

    // Display the success/failure message
    echo "<div class='alert " . ($result ? "alert-success" : "alert-danger") . "'>$message</div>";
}

?>

<!-- Rest of your existing code -->

<!-- Rest of your existing code -->

<?php foreach ($emp as $row)  ?>
    <tr>
        <td><?= $row['qr_code']; ?></td>
        <td><?= $row['employee_idno']; ?></td>
        <td><?= $row['first_name']; ?></td>
        <td><?= $row['last_name']; ?></td>
        <td><?= $row['time_in']; ?></td>
        <td><?= htmlentities(date("M d, Y", strtotime($row['logdate']))); ?></td>
        <td>
            <?php if ($row['status'] === 'present') { ?>
                <button class='btn btn-success btn-xs'><i class='fa fa-user-clock'></i> Present</button>
            <?php } elseif ($row['status'] === 'absent') { ?>
                <button class='btn btn-danger btn-xs'><i class='fa fa-user-clock'></i> Absent</button>
            <?php } else  ?>
                <!-- Add the buttons for manual setting of presences and absences -->
                <form method="post" action="add_absentees.php" style="display: inline;">
                    <input type="hidden" name="qr_code" value="<?= $row['qr_code']; ?>">
                    <input type="hidden" name="employee_id" value="<?= $row['employee_idno']; ?>">
                    <input type="hidden" name="first_name" value="<?= $row['first_name']; ?>">
                    <input type="hidden" name="last_name" value="<?= $row['last_name']; ?>">
                    <input type="hidden" name="date" value="<?= $row['logdate']; ?>">
                    <
