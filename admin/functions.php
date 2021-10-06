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
/* GENERATING REPORTS
-------------------------------------------------- */

/** Booking Report */
if (isset($_POST['bookings_report'])) {
	global $db;

	$packageType    =  $_SESSION['bookings_packageType'];
	$status    =  $_SESSION['bookings_status'];

	if ($packageType == 'any' && $status != 'any' ) {
		$query = ("SELECT users.email, users.phone, packages.packageType, packages.amount, bookings.bookingId, bookings.status FROM users
			JOIN bookings ON bookings.userId = users.userId
			JOIN packages ON packages.packageId = bookings.packageId
			WHERE bookings.status='$status'");

		$results = mysqli_query($db, $query);
		
	} else if($packageType != 'any' && $status == 'any') {
		$query = ("SELECT users.email, users.phone, packages.packageType, packages.amount, bookings.bookingId, bookings.status FROM users
			JOIN bookings ON bookings.userId = users.userId
			JOIN packages ON packages.packageId = bookings.packageId
			WHERE packages.packageType='$packageType'");

		$results = mysqli_query($db, $query); 

	} else if($packageType != 'any' && $status != 'any') {
		$query = ("SELECT users.email, users.phone, packages.packageType, packages.amount, bookings.bookingId, bookings.status FROM users
			JOIN bookings ON bookings.userId = users.userId
			JOIN packages ON packages.packageId = bookings.packageId
			WHERE packages.packageType='$packageType'
			AND bookings.status='$status'");

		$results = mysqli_query($db, $query); 
	}else{
		$query = ("SELECT users.email, users.phone, packages.packageType, packages.amount, bookings.bookingId, bookings.status FROM users
			JOIN bookings ON bookings.userId = users.userId
			JOIN packages ON packages.packageId = bookings.packageId");

		$results = mysqli_query($db, $query);
	}

	$output = '';

	while($row = mysqli_fetch_array($results)){       
		$output .= '<tr>  
						<td>' .$row["email"].'</td>  
						<td>'.$row["phone"].'</td>  
						<td>'.$row["packageType"].'</td>  
						<td>'.$row["status"].'</td> 
					</tr>';  
	}


	require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Bookings Data for Super Travel Agency");  
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
      <h3 align="center">Bookings Data for Super Travel Agency</h3><br /><br />  
      <table cellspacing="0" cellpadding="3" border="1" style="border-color:gray;"> 
           <tr style="background-color:green;color:white;">  
                <th>Email</th>  
                <th>Phone</th>  
                <th>Package Type</th>  
                <th>Status</th>
           </tr>  
      ';  
      $content .= $output;  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('bookings.pdf', 'I');
}



/** User Report */
if (isset($_POST['users_report'])) {
	global $db;

	$role   =  $_SESSION['users_role'];

	
    if ($role == 'any') {
    	$query = "SELECT * FROM users";

            $results = mysqli_query($db, $query);
    	
    }else{
    	$query = ("SELECT * FROM users
    	WHERE role = '$role'");

    	$results = mysqli_query($db, $query);
    }

	$output = '';

	while($row = mysqli_fetch_array($results)){       
		$output .= '<tr>  
						<td>' .$row["firstName"].'</td>  
						<td>'.$row["surname"].'</td>  
						<td>'.$row["email"].'</td>  
						<td>'.$row["role"].'</td> 
					</tr>';  
	}


	require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Users Data for Super Travel Agency");  
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
      <h3 align="center">Users Data for Super Travel Agency</h3><br /><br />  
      <table cellspacing="0" cellpadding="3" border="1" style="border-color:gray;"> 
           <tr style="background-color:green;color:white;">  
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


/** Package Report */
if (isset($_POST['packages_report'])) {
	global $db;

	$packageType  =  $_SESSION['packages_type'];

	
    if ($packageType == 'any') {
    	$query = "SELECT * FROM packages";

            $results = mysqli_query($db, $query);
    	
    }else{
    	$query = ("SELECT * FROM packages
    	WHERE packageType = '$packageType'");

    	$results = mysqli_query($db, $query);
    }

	$output = '';

	while($row = mysqli_fetch_array($results)){       
		$output .= '<tr>  
						<td>' .$row["packageType"].'</td>  
						<td>'.$row["description"].'</td>  
						<td>'.$row["amount"].'</td>
					</tr>';  
	}


	require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Packages Data for Super Travel Agency");  
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
      <h3 align="center">Packages Data for Super Travel Agency</h3><br /><br />  
      <table cellspacing="0" cellpadding="3" border="1" style="border-color:gray;"> 
           <tr style="background-color:green;color:white;">  
                <th>Package Type</th>  
                <th>Description</th>  
                <th>Charges</th>
           </tr>  
      ';  
      $content .= $output;  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('packages.pdf', 'I');
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