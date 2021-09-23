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
    $image  = $_POST['Photo'];
    $id = $_POST['IdNo'];
    $ida  = $_POST['ID_Attachment'];

   
    $sql = "UPDATE personal_details  SET Gender = $gender,
    DOB = $dob ,IdNo = $id,ID_Attachment = $ida,Photo = $image,Telephone = $phone,Email = $email,
    County = $county,Nationality = $nationality,Religion = $religion  WHERE User_ID = '".$_SESSION ['suser']['User_ID']."'";
    if(mysqli_query($conn,$sql)){
       echo "record inserted successfully";
       header("location:index.php");

    } else{
       echo "Error:".$sql. "". mysqli_error($conn);
       
    }



    mysqli_close($conn);

    
}




?>