<?php
 include('db/db.php');
 include('functions.php');

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
        $exam = ($_POST['Examination']);

        $check = "";   
        foreach( $symp  as $items){
            $check .= $items.","; 
            echo $check;
        }
        $check1 = "";
        foreach( $immun  as $item){
            $check1 .= $item.","; 
            echo $check1;

        }

        $sql = "INSERT INTO health_records (User_ID,Inpatient_record,Suffered_symptoms,Details,Medical_history,Immunization,Examination) 
        VALUES ('".$_SESSION ['suser']['User_ID']."','$inp','$check','$details','$mhist','$check1','$exam')  ";

        if(mysqli_query($conn,$sql)){

            echo "Health record inserted successfully";
            header("location:../student/index.php");
        } else{
            echo"Error:". $sql. "". mysqli_error($conn);
            
        }

        mysqli_close($conn);
     }
