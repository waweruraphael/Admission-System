<?php
   include 'db/db.php';

   if (isset($_POST['Submit'])){

    $code = mysqli_real_escape_string($conn,$_POST['course_code']);  
    $course = mysqli_real_escape_string($conn,$_POST['Description']);
    $faculty =mysqli_real_escape_string( $conn,$_POST['Faculty']);

    $sql = "INSERT INTO courses(course_code,Description,Faculty) VALUES('$code','$course','$faculty')";
     if (mysqli_query($conn,$sql)){
      echo "Course added successully";
      header("location: ../admin/course.php");
      

     } else{
         echo"Error:". $sql. "". mysqli_error($conn);
         header("location: ../admin/course.php");
          

     }
  

     mysqli_close($conn);


   }

?>