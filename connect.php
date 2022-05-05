<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$nid = $_POST['nid'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$education = $_POST['education'];
	$skills = $_POST['skills'];
	$position = $_POST['position'];
	$gender = $_POST['gender'];
	$cv = $_POST['cv'];
	$address = $_POST['address'];
	$pcode = $_POST['pcode'];
	
	
	
	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, nid, email, number, education, skills, position, gender, cv, address, pcode) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssisissssssi", $firstName, $lastName, $nid, $email, $number, $education, $skills, $position, $gender, $cv, $address, $pcode);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>