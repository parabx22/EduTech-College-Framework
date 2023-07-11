<?php
require_once('../connection.php');

// Retrieve the semester value from the AJAX request
$sem = $_GET['sem'];

// Query to fetch subjects for the selected semester from the database
$query = "SELECT * FROM subject WHERE sem = '$sem'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $subjectName = $row['sub_name'];
        $credits = $row['credits'];

        // Output the subject name as HTML checkbox inputs
        echo '<input type="checkbox" name="subject[]" value="' . $subjectName . '" onchange="calculateAmount()"> ';
        echo $subjectName . '<br>';

        // Store the credits as data attribute for each checkbox
        echo '<input type="hidden" id="' . $subjectName . '_credits" value="' . $credits . '">';
    }
} else {
    echo 'No subjects found.';
}

?>


