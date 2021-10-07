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




/** User Report */
if (isset($_POST['student_report'])) {
	global $conn;

	$role   =  $_SESSION['courses'];

	
    if ($role == 'any') {
    	$query = "SELECT * FROM users";

            $results = mysqli_query($conn, $query);
    	
    }else{
    	$query = ("SELECT * FROM users
    	WHERE role = '$role'");

    	$results = mysqli_query($conn, $query);
    }

	$output = '';

	while($row = mysqli_fetch_array($results)){       
		$output .= '<tr>  
						<td>' .$rows["User_ID"].'</td>  
						<td>'.$rows["Surname"].'</td>  
						<td>'.$rows["Firstname"].'</td>  
						<td>'.$rows["Lastname"].'</td> 
					</tr>';  
	}


	require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Student List");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h3 align="center">Students List </h3><br /><br />  
      <table cellspacing="0" cellpadding="3" border="1" style="border-color:gray;"> 
           <tr style="background-color:Blue;color:white;">  
                <th>First Name</th>  
                <th>Surname</th>  
                <th>Email</th>  
                <th>Role</th>
           </tr>  
      ';  
      $content .= $output;  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('users.pdf', 'I');
}


?>