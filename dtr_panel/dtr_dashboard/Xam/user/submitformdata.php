<?php
require_once('../connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $reg_type = $_POST['reg_type'];
    $sem = $_POST['sem'];
    $rc = $_POST['rc'];
    $categry = $_POST['categry'];
    $selected_subjects = isset($_POST['sub_name']) ? $_POST['sub_name'] : array();
    $rno = $_POST['rno'];
    $dept = $_POST['dept'];
    $reg_date = date('Y-m-d'); // Assuming the registration date is the current date
    $amount = $_POST['amt'];

    // Convert the selected subjects array to a JSON string
    $subject_list = json_encode($selected_subjects);

    // Insert the form data into the database
    // Modify this section based on your database connection and table structure

    // Prepare the SQL statement to insert form data
    $stmt = $con->prepare("INSERT INTO exam_reg (reg_type, sem, rc, categry, selected_subjects, rno, dept, reg_date, amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssd", $reg_type, $sem, $rc, $categry, $subject_list, $rno, $dept, $reg_date, $amount);

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Form data saved successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
}
?>
