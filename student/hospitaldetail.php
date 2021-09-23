<?php
 include('db/db.php');

 if (isset($_POST['btn-health'])){
     health();
     
     
 }
     function health(){

        global $conn;

        $uid = ($_POST['User_ID']);
        $inp = ($_POST['Inpatient_record']);
        $symp = ($_POST['Suffered_symptoms']);
        $details = ($_POST['Details']);
        $mhist = ($_POST['Medical_history']);
        $immun = ($_POST['Immunization']);
        $immunyr = ($_POST['Immunization_year']);
        $exam = ($_POST['Examination']);

        
        $sql = "INSERT INTO health_records (User_ID,Inpatient_record,Suffered_symptoms,Details,Medical_history,Immunization	Immunization_year,Examination) 
        VALUES ('$uid','$inp',' $symp','$details','$mhist','$immun','$immunyr','$exam')  ";

        if(mysqli_query($conn,$sql)){

            echo "Health record inserted successfully";
            header("location:../student/index.php");
        } else{
            echo"Error:". $sql. "". mysqli_error($conn);
            header("location:../student/hospital.php");
        }

        mysqli_close($conn);
     }
 


?>