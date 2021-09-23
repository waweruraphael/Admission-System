<?php

require('db/db.php');

if (isset($_POST["Import"])){
	import_csv();

}

function import_csv(){
	global $conn;



	echo $filename = $_FILES["file"]["tmp_name"];

	if ($_FILES["file"]["size"] > 0){

		$file = fopen($filename, "r");
		while (($emapData = fgetcsv($file,10000,",")) !==FALSE){
			//It will insert all ready registered students from our csv file` 
			/*User_ID,Surname,Firstname,Lastname,Gender,sPword,Campus,course_code,Admission_year*/				

			$sql = "INSERT into personal_details (User_ID,Surname,Firstname,Lastname,Gender,sPword,Campus,course_code,Admission_year)
			VALUES('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]',NOW())";
			
	 //we are using mysql_query function. it returns a resource on true else False on error

	    if(mysqli_query($conn,$sql)){
			echo "File imported successfully";
			header("location: ../admin/tables.php");

		} else{
			echo"Error:". $sql. "". mysqli_error($conn);
		}

		}
		fclose($file);
		
	}



}


if (isset($_POST['btn-register'])){
	register_student();

	
}
	function register_student(){
		global $conn;
	

		$regno = $_POST['User_ID'];
        $surname = $_POST['Surname'];
        $fname = $_POST['Firstname'];
		$lname = $_POST['Lastname'];
	    $gender = $_POST['Gender'];


		$query = "INSERT into personal_details (User_ID,Surname,Firstname,Lastname,Gender)
			VALUES('$regno','$surname', '$fname', '$lname' ,'$gender')";
			
			if(mysqli_query($conn,$query)){
				echo "record inserted successfully";
				header("location:../admin/tables.php");
		 
			 } else{
				echo "Error:".$query. "". mysqli_error($conn);
				
			 }
		 
		

	}


		
			 
?>		 