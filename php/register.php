<?php 

$db_user = "root";
$db_pass = "";
$db_name = "users";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $client = new MongoDB\Client('mongodb://localhost:27017');
// $collection = (new MongoDB\Client)->users->profiles;






if(isset($_POST)){

	
	$email 			= $_POST['email'];

	
	$password 		= sha1($_POST['password']);


	$firstname 			= $_POST['firstname'];
	$lastname 			= $_POST['lastname'];
	$mothername 			= $_POST['mothername'];
	$fathername 			= $_POST['fathername'];
	$address 			= $_POST['address'];
	$pincode 			= $_POST['pincode'];
	$dob 			= $_POST['dob'];
	$age 			= $_POST['age'];
	$course 			= $_POST['course'];

		$sql = "INSERT INTO users (email, password ) VALUES(?,?)";
		$profile = "INSERT INTO profiles (email, firstname, lastname, mothername, fathername, address, pincode, dob, age, course ) VALUES(?,?,?,?,?,?,?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$profileinsert=$db->prepare($profile);
		$profileresult=$profileinsert->execute([$email,$firstname, $lastname, $mothername, $fathername, $address, $pincode, $dob, $age, $course]);
		$result = $stmtinsert->execute([$email, $password]);
		if($result){
			// $insertOneResult = $collection->insertOne([
			// 	'firstname' => $firstname,
			// 				'lastname' => $lastname,
			// 				'mothername' => $mothername,
			// 				'fathername' => $fathername,
			// 				'address' => $address ,
			// 				'pincode'=> $pincode,
			// 				'dob'=> $dob ,
			// 				'age' => $age,
			// 				'course' => $course ,
			// 				'email' => $email,
			// ]);
			
			echo 'Successfully saved.';

		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}