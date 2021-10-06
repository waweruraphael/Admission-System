<?php
session_start();
include('db/db.php');

$error = array();

if (isset($_POST['login-btn'])){
    student_login();
}

#login function

function student_login(){
    global $conn,$error;

    /*define variables*/

    $uid = ($_POST['User_ID']);
    $password = ($_POST['sPword']);

    if (empty($uid)){
        array_push($error,"username Required");
    } 
    if(empty($password)){
        array_push($error,"please enter your password");
    }
    if(count($error) == 0){
        
        $sql = "SELECT * FROM personal_details WHERE User_ID = '$uid' AND sPword  = '$password' LIMIT 1 ";
        $results = mysqli_query($conn,$sql);

        if(mysqli_num_rows($results)){
            $user = mysqli_fetch_assoc($results);
             if($user["sRole"]=='student'){
                $_SESSION['suser'] =$user;
                $_SESSION['success'] = "You are now logged in";
                header('location: ../student/index.php');
             } else{
                 $_SESSION['suser'] =$user;
                 header('location: login.php');
             }
        } else{
            array_push($error,"Wrong Username/password");

            
        }

        
    }

}

//INSERTING INTO REFEREES TABLE

if (isset($_POST['btn-referee'])){
    referees();

}

function referees(){
    global $conn,$error;


    $regno = ($_POST['User_ID']);
    $fname = ($_POST['Firstname']);
    $lname = ($_POST['Lastname']);
    $relation = ($_POST['Relationship']);
    $phone = ($_POST['Telephone']);
    $add = ($_POST['Address']);
    $record = "select * from referees   WHERE User_ID = '".$_SESSION ['suser']['User_ID']."'";
    $check = mysqli_query($conn,$record);
    $rowdata = mysqli_num_rows($check);
    if ($rowdata == 0){
        //User_ID 	Firstname 	Lastname 	Relationship 	Telephone 	Address
        $recordinsert = "INSERT INTO referees (User_ID,Firstname,Lastname,Relationship,Telephone,Address) 
        values('".$_SESSION ['suser']['User_ID']."','$fname','$lname','$relation','$phone','$add')";
        if (mysqli_query($conn,$recordinsert)){
            echo "Record inserted";
            header("location:../student/index.php");
        } else{
            echo "Error:".$recordinsert. "". mysqli_error($conn);
        }
    } else{
        echo "Record already exist";
    }


}


function isLoggedIn(){
    if(isset($_SESSION['suser'])){
        return true;
    } else{
        return false;
    }
}

/*logout */
if (isset($_GET['logout'])){
   session_destroy();
   echo "<div class='success-msg'>";
		echo "You have successfully logout";
		echo "</div>";
   unset($_SESSION['suser']);
   header('location:login.php');
   
}


?>