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
    $id = $_POST['IdNo'];
    

    $passport= $_FILES["image"]["name"];    
    $passport_location = "./all_images/".$passport;  
    $passport_db = "all_images/".$passport; 

    $id_attachment = $_FILES["image"]["name"];    
    $id_attachment_location = "./all_images/".$id_attachment;  
    $upload = "all_images/".$id_attachment; 

    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);
	

   
    $sql = "UPDATE personal_details SET Gender = '".$gender."',
    DOB = '".$dob."' ,IdNo = '".$id."',ID_Attachment = '".$upload."',Photo = '".$passport_db."',Telephone = '".$phone."',Email ='".$email."',
    County = '".$county."',Nationality = '".$nationality."',Religion = '".$religion."'  WHERE User_ID = '".$_SESSION ['suser']['User_ID']."'";
    if(mysqli_query($conn,$sql)){
      
       $_SESSION['success'] = 'Record Inserted successfully';
       

    } else{
       echo "Error:".$sql. "". mysqli_error($conn);
       
    }



    mysqli_close($conn);

    
}





?>