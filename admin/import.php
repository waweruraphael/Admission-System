<?php

require('db/db.php');

if (isset($_POST["Import"])) {
	import_csv();
}

function import_csv()
{
	global $conn;

	$course_code = $_POST['course'];
	$curret_year = date("Y");
	
	$sql = "SELECT MAX(User_ID) AS regNo from personal_details WHERE (User_ID LIKE '$course_code%'  AND  User_ID LIKE '%$curret_year')";
	$result = (mysqli_query($conn, $sql));

	$last_regNo = mysqli_fetch_assoc($result);

	$exploaded_last_regNo = explode("/", $last_regNo['regNo']);

	$num = $exploaded_last_regNo[1] + 1;
	var_export($num, true);
	$str_length = 5;

	$number = substr("0000{$num}", -$str_length);

	$formated_number = sprintf($number);

	$regNo = $course_code . "/" . $formated_number . "/" . $curret_year;
	$pwd = $course_code . "/" . $formated_number . "/" . $curret_year;
	$pwd = md5($pwd);


	echo $filename = $_FILES["file"]["tmp_name"];

	if ($_FILES["file"]["size"] > 0) {

		$file = fopen($filename, "r");
		while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
			//It will insert all ready registered students from our csv file` 


			$sql = "INSERT  into personal_details (User_ID,Surname,Firstname,Lastname,Gender,course_code,sPword,Admission_year)
			VALUES('$regNo','$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$course_code','$pwd','$curret_year') ON DUPLICATE KEY UPDATE $regNo = $regNo" ;

			if (mysqli_query($conn, $sql)) {
				$_SESSION['success'] = "Files uploaded successfully";
			} else {
				echo "Error:" . $sql . "" . mysqli_error($conn);
			}
			

		}
		
		fclose($file);
	}
}

// register students manually

if (isset($_POST['btn-register'])) {
	register_student();
}
function register_student()
{
	global $conn;

	$surname = $_POST['Surname'];
	$fname = $_POST['Firstname'];
	$lname = $_POST['Lastname'];
	$gender = $_POST['Gender'];
	$course_code = $_POST['course'];
	// picking current year
	$curret_year = date("Y");
	$sql = "SELECT MAX(User_ID) AS regNo from personal_details WHERE (User_ID LIKE '$course_code%'  AND  User_ID LIKE '%$curret_year')";
	$result = (mysqli_query($conn, $sql));

	$last_regNo = mysqli_fetch_assoc($result);

	$exploaded_last_regNo = explode("/", $last_regNo['regNo']);

	$num = $exploaded_last_regNo[1] + 1;
	var_export($num, true);
	$str_length = 5;

	$number = substr("0000{$num}", -$str_length);

	$formated_number = sprintf($number);

	$regNo = $course_code . "/" . $formated_number . "/" . $curret_year;
	$regNo2 = $course_code . "/" . $formated_number . "/" . $curret_year;
	$regNo2 = md5($regNo2);
	$query = "INSERT into personal_details (User_ID,Surname,Firstname,Lastname,Gender,course_code,sPword,Admission_year)
			VALUES('$regNo','$surname', '$fname', '$lname' ,'$gender','$course_code','$regNo2',NOW())";

	if (mysqli_query($conn, $query)) {
		$_SESSION['success'] = "record inserted successfully";
	} else {
		$_SESSION['error']  = "Record was not inserted successfully";
	}
}
?>