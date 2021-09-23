<?php
session_start();
#db connection
include('db/db.php');

#variable declaration
$User_ID=$Role=$password ='';
$error = array();

if (isset($_POST['login-btn'])){
    login();
}

function login(){
    global $conn, $error;

    /*define variables*/

    $uid = ($_POST['User_ID']);
    $password = ($_POST['password']);

    if (empty($uid)){
        array_push($error,"username Required");
    } 
    if(empty($password)){
        array_push($error,"please enter your password");
    }
    if(count($error) == 0){
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE User_ID = '$uid' AND password = '$password' LIMIT 1 ";
        $results = mysqli_query($conn,$sql);

        if(mysqli_num_rows($results)){
            $user = mysqli_fetch_assoc($results);
             if($user["Role"]=='admin'){

                $_SESSION['user'] =$user;
                $_SESSION['success'] = "You are now logged in";
                header('location: ../admin/dashboard.php');
             } else{
                 $_SESSION['user'] =$user;
                 header('location: index.php');
             }
        } else{
            array_push($error,"Wrong Username/password");

            
        }

        
    }

}

function isLoggedIn(){
     if(isset($_SESSION['user'])){
         return true;
     } else{
         return false;
     }
}

/*logout */
if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['user']);
    header('location:index.php');
}

?>