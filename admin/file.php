<?php
include_once 'db/db.php';

if (isset($_POST['Import'])){
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values',
     'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 
     'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){

        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            $csvFile  = fopen($_FILES['file']['tmp_name'],'r');
            fgetcsv($csvFile);

            while(($line = fgetcsv($csvFile)) !== FALSE){

                $User_ID = $line[0];
                $Surname = $line[1];
                $Firstname = $line[2];
                $Lastname = $line[3];
                $Gender = $line[4];
                $sPword = $line[5];
                $Campus = $line[6];
                $course_code = $line[7];

                $sql = "SELECT User_ID from personal_details where User_ID  = '".$line[0]."'";
                $result = mysqli_query($conn,$sql);

                if($result->num_rows > 0){
                    echo"Record already exist";
                     
                } else{
                    $sql = "INSERT into personal_details (User_ID,Surname,Firstname,Lastname,Gender,sPword,Campus,course_code,Admission_year)
                    VALUES ('".$User_ID."','".$Surname ."','".$Firstname."','".$Lastname."','".$Gender."','".$sPword."','".$Campus."','".$course_code."',NOW())";
                }
            }
            fclose($csvFile);
            $qstring = '?status=succ';

        } else{
            $qstring = '?status=err';
        }

    } else{
        $qstring = '?status=invalid_file';
    }

}
header("Location:../admin/tables.php".$qstring);


?>