<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get the selected capacity from the AJAX request
    $selectedCapacity = $_GET['capacity'];

    // Establish a database connection
    $conn = mysqli_connect('localhost', 'root', '', 'college') or die("Connection failed: " . mysqli_connect_error());

    // Prepare and execute the query to fetch the available rooms for the selected capacity
    $query = "SELECT class FROM seat WHERE capacity = '$selectedCapacity'";
    $result = mysqli_query($conn, $query);

    // Check if the query executed successfully
    if ($result) {
        // Fetch the available rooms and store them in an array
        $availableRooms = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $availableRooms[] = $row;
        }

        // Prepare and execute the query to fetch the class names for the selected capacity
        $query = "SELECT DISTINCT class FROM seat WHERE capacity = '$selectedCapacity'";
        $result = mysqli_query($conn, $query);

        // Fetch the class names and store them in an array
        $classNames = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $classNames[] = $row['class'];
        }

        // Create the response array
        $response = array(
            'availableRooms' => $availableRooms,
            'classNames' => $classNames
        );

        // Return the response as JSON
        echo json_encode($response);
    } else {
        // Return an empty response if the query failed
        echo json_encode([]);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
