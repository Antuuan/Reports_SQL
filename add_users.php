<?php
include_once("connection.php");
header("Location:users.php");
array_map("htmlspecialchars",$_POST);
print_r($_POST);
echo($_POST["firstname"]);

// looks at role and does if statements
switch($_POST["role"]){
	case "pupil":
		$role=0;
		break;
	case "teacher":
		$role=1;
		break;
	case "admin":
		$role=2;
		break;
};

$stmt = $conn->prepare("INSERT INTO tbl_users (user_id,gender,surname,firstname,password,house,year,role)
VALUES (null,:gender,:surname,:firstname,:password,:house,:year,:role)");//each value corresponds to each value above, user_id is auto assigned so no value needed

// data sanitation
$stmt->bindParam(':firstname', $_POST["firstname"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':house', $_POST["house"]);
$stmt->bindParam(':year', $_POST["year"]);
$stmt->bindParam(':password', $_POST["password"]);
$stmt->bindParam(':gender', $_POST["gender"]);
$stmt->bindParam(':role', $role);
$stmt->execute();
$conn=null;

?>