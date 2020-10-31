<?php
	$firstName = $_POST['firstName'];
	$email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, email, password1, password2) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $firstName, $email, $password1, $password2);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
    }
    ?>