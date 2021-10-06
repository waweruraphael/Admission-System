<?php
include('functions.php');
 include('db/db.php');
 
 
 if (isset($_POST['Submit'])){

    #declaring variables

 
    $gender = $_POST['Gender'];
    $dob = $_POST['DOB'];
    $county = $_POST['County'];
    $nationality = $_POST['Nationality'];
    $religion = $_POST['Religion'];
    $phone = $_POST['Telephone'];
    $email = $_POST['Email'];
    $image=$_FILES['Photo'];
    $id = $_POST['IdNo'];
    $ida  = $_POST['ID_Attachment'];

    /* Get image name */
	$image = $_FILES['Photo']['name'];
	/* image file directory */
	$target = "images/".basename($image);
   


   

   
    $sql = "UPDATE personal_details SET Gender = '".$gender."',
    DOB = '".$dob."' ,IdNo = '".$id."',ID_Attachment = '".$ida."',Photo = '".$image."',Telephone = '".$phone."',Email ='".$email."',
    County = '".$county."',Nationality = '".$nationality."',Religion = '".$religion."'  WHERE User_ID = '".$_SESSION ['suser']['User_ID']."'";
    if(mysqli_query($conn,$sql)){
      if (move_uploaded_file($_FILES['Photo']['tmp_name'], $target)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
       echo "record inserted successfully";
       header("location:index.php");

    } else{
       echo "Error:".$sql. "". mysqli_error($conn);
       
    }



    mysqli_close($conn);

    
}





?>