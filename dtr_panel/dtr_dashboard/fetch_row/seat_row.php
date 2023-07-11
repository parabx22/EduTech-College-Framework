<?php 

	include '../../../init/model/config/connection2.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];

	    $sql = "SELECT * FROM `seat` WHERE id = ?";
	    $stmt = $conn->prepare($sql); 
	    $stmt->bind_param("i", $id);
	    $stmt->execute();
	    $result = $stmt->get_result();
        $row = $result->fetch_assoc();

	    echo json_encode($row);

	 }
?>