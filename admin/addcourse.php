<?php
   include 'db/db.php';

   if (isset($_POST['Submit'])){
     
    $code = mysqli_real_escape_string($conn,$_POST['course_code']);  
    $course = mysqli_real_escape_string($conn,$_POST['Description']);
    $faculty =mysqli_real_escape_string( $conn,$_POST['Faculty']);

    $sql = "INSERT INTO courses(course_code,Description,Faculty) VALUES('$code','$course','$faculty')";
     if (mysqli_query($conn,$sql)){
      $_SESSION['success'] = "Course added successully";
      
      
     } else{
      $_SESSION['error'] = "Error occured.Please try again";
         
          

     }



     


   }

   
   if(isset($_POST['Update'])){
    $code = mysqli_real_escape_string($conn,$_POST['course_code']);  
    $course = mysqli_real_escape_string($conn,$_POST['Description']);
    $faculty =mysqli_real_escape_string( $conn,$_POST['Faculty']);

    $sql = "UPDATE courses  SET  Description = '".$course."' ,Faculty= '".$faculty."'  WHERE course_code = '".$code."' ";
    if (mysqli_query($conn,$sql)){
      $_SESSION['success'] = "Course added successully";
      
      
     } else{
      $_SESSION['error'] = "Error occured.Please try again";
       

     }  
     mysqli_close($conn);
       
   }

  ?>

   
