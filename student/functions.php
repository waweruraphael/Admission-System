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