<?php

require_once('db/db.php');

if (isset($_POST['show-student'])) {

    $course = $_POST['course'];

    $sql = "SELECT User_ID,Surname,Firstname,Lastname,Gender,Admission_year,Photo FROM personal_details WHERE course_code = '$course' ";
    $result = $conn->query($sql);

    $arr_users = [];
    if ($result->num_rows > 0) {
        $arr_users = $result->fetch_all(MYSQLI_ASSOC);
    }
    unset($_SESSION['courses']);

    $_SESSION['courses'] = $arr_users;
    

} else {
    $sql = "SELECT User_ID,Surname,Firstname,Lastname,Gender,Admission_year,Photo FROM personal_details";
    $result = $conn->query($sql);
    $arr_users = [];
    if ($result->num_rows > 0) {
        $arr_users = $result->fetch_all(MYSQLI_ASSOC);
    }
}




?>