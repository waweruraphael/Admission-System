<?php
include('db/db.php');
include('functions.php');

if (isset($_POST['btn-health'])) {
    health();
}
function health()
{

    global $conn;


    $inpatient = ($_POST['Inpatient_record']);
    $symptoms = ($_POST['Suffered_symptoms']);
    $details = ($_POST['Details']);
    $mhist = ($_POST['Medical_history']);
    $immunizations = ($_POST['Immunization']);
    $examination = ($_POST['Examination']);

    $check = "";
    foreach ($symptoms  as $symptom) {
        $check .= $symptom . ",";
    }


    $check1 = "";
    foreach ($immunizations  as $immunization) {
        $check1 .= $immunization . ",";
    }
    
        $sql = "INSERT INTO health_records (User_ID,Inpatient_record,Suffered_symptoms,Details,Medical_history,Immunization,Examination) 
        VALUES ('" . $_SESSION['suser']['User_ID'] . "','$inpatient','$check','$details','$mhist','$check1','$examination')  ";

        if (mysqli_query($conn, $sql)) {

            $_SESSION['Success'] = "Data inserted successfuly";
            header("location:hospital.php");
            
        } else {
            echo "Error:" . $sql . "" . mysqli_error($conn);
        }
    


    mysqli_close($conn);
}
