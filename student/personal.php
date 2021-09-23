<?php
include('functions.php');
if (!isLoggedIn()) {
    $_SESSION["msg"] = "Please Login";
    header('location:login.php?sub-cat default');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include("includes/navbar.php"); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar Navbar -->
                <?php include("includes/topnav.php"); ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Application Form</h1>
                        
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- forms -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Application Form</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <form action="personalinformation.php" method="POST">
                                        <p>Personal Information</p>
                                        <div class="row g-1">
                                            <div class="mb-3">
                                                <label>Registation Number</label>
                                                <input name="User_ID" class="form-control" value="<?php echo $_SESSION['suser']['User_ID']; ?>" type="text" disabled>
                                            </div> <!-- form-group// -->
                                            <div class="col-sm-3">
                                                <label>Surname</label>
                                                <input name="Surname" class="form-control" type="text" value="<?php echo $_SESSION['suser']['Surname']; ?>" disabled>
                                            </div> <!-- form-group// -->
                                            <div class="col-sm-3">
                                                <label>First Name</label>
                                                <input name="Firstname" class="form-control" type="text" value="<?php echo $_SESSION['suser']['Firstname']; ?>"disabled>
                                            </div> <!-- form-group// -->
                                            <div class="col-sm-3">
                                                <label>Second Name</label>
                                                <input name="Lastname" class="form-control" type="text" value="<?php echo $_SESSION['suser']['Lastname']; ?>"disabled >
                                            </div> <!-- form-group// -->
                                        </div>
                                        <div class="row g-3">
                                            <div class="mb-3">
                                                <label>National ID</label>
                                                <input name="IdNo" class="form-control" type="text">
                                            </div> <!-- form-group// -->
                                
                                            <div class="col-sm-3">

                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Photo</label>
                                                    <input class="form-control" type="file" id="image" name="Photo">
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <label for="Marital-status">Gender</label>
                                                <div class="col">
                                                    <input type="radio" name="Gender" id="" value="Male">Male
                                                    <input type="radio" name="Gender" id="" value="Female">Female
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="mb-3">
                                                <label>Email </label>
                                                <input class="form-control" type="email" name="Email" id="email">
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Phone number</label>
                                                <input class="form-control" type="text" name="Telephone" id="">
                                            </div>
                                            <div class="col-sm-3">
                                                <label>Date Of Birth</label>
                                                <input class="form-control" type="date" name="DOB" id="" required>

                                            </div>

                                            <div class="col-sm-3">
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">Upload your Id</label>
                                                    <input class="form-control" name="ID_Attachment" type="file" id="formFile">
                                                </div>

                                            </div>

                                        </div>
                                        <hr class="form-divider">
                                        <p>Location</p>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="">Nationality</label>
                                                <select class="form-control" name="Nationality">
                                                    <option value="">-- select one --</option>
                                                    <option value="afghan">Afghan</option>
                                                    <option value="albanian">Albanian</option>
                                                    <option value="algerian">Algerian</option>
                                                    <option value="american">American</option>
                                                    <option value="andorran">Andorran</option>
                                                    <option value="angolan">Angolan</option>
                                                    <option value="antiguans">Antiguans</option>
                                                    <option value="argentinean">Argentinean</option>
                                                    <option value="armenian">Armenian</option>
                                                    <option value="australian">Australian</option>
                                                    <option value="austrian">Austrian</option>
                                                    <option value="azerbaijani">Azerbaijani</option>
                                                    <option value="bahamian">Bahamian</option>
                                                    <option value="bahraini">Bahraini</option>
                                                    <option value="bangladeshi">Bangladeshi</option>
                                                    <option value="barbadian">Barbadian</option>
                                                    <option value="barbudans">Barbudans</option>
                                                    <option value="batswana">Batswana</option>
                                                    <option value="belarusian">Belarusian</option>
                                                    <option value="belgian">Belgian</option>
                                                    <option value="belizean">Belizean</option>
                                                    <option value="beninese">Beninese</option>
                                                    <option value="bhutanese">Bhutanese</option>
                                                    <option value="bolivian">Bolivian</option>
                                                    <option value="bosnian">Bosnian</option>
                                                    <option value="brazilian">Brazilian</option>
                                                    <option value="british">British</option>
                                                    <option value="bruneian">Bruneian</option>
                                                    <option value="bulgarian">Bulgarian</option>
                                                    <option value="burkinabe">Burkinabe</option>
                                                    <option value="burmese">Burmese</option>
                                                    <option value="burundian">Burundian</option>
                                                    <option value="cambodian">Cambodian</option>
                                                    <option value="cameroonian">Cameroonian</option>
                                                    <option value="canadian">Canadian</option>
                                                    <option value="cape verdean">Cape Verdean</option>
                                                    <option value="central african">Central African</option>
                                                    <option value="chadian">Chadian</option>
                                                    <option value="chilean">Chilean</option>
                                                    <option value="chinese">Chinese</option>
                                                    <option value="colombian">Colombian</option>
                                                    <option value="comoran">Comoran</option>
                                                    <option value="congolese">Congolese</option>
                                                    <option value="costa rican">Costa Rican</option>
                                                    <option value="croatian">Croatian</option>
                                                    <option value="cuban">Cuban</option>
                                                    <option value="cypriot">Cypriot</option>
                                                    <option value="czech">Czech</option>
                                                    <option value="danish">Danish</option>
                                                    <option value="djibouti">Djibouti</option>
                                                    <option value="dominican">Dominican</option>
                                                    <option value="dutch">Dutch</option>
                                                    <option value="east timorese">East Timorese</option>
                                                    <option value="ecuadorean">Ecuadorean</option>
                                                    <option value="egyptian">Egyptian</option>
                                                    <option value="emirian">Emirian</option>
                                                    <option value="equatorial guinean">Equatorial Guinean</option>
                                                    <option value="eritrean">Eritrean</option>
                                                    <option value="estonian">Estonian</option>
                                                    <option value="ethiopian">Ethiopian</option>
                                                    <option value="fijian">Fijian</option>
                                                    <option value="filipino">Filipino</option>
                                                    <option value="finnish">Finnish</option>
                                                    <option value="french">French</option>
                                                    <option value="gabonese">Gabonese</option>
                                                    <option value="gambian">Gambian</option>
                                                    <option value="georgian">Georgian</option>
                                                    <option value="german">German</option>
                                                    <option value="ghanaian">Ghanaian</option>
                                                    <option value="greek">Greek</option>
                                                    <option value="grenadian">Grenadian</option>
                                                    <option value="guatemalan">Guatemalan</option>
                                                    <option value="guinea-bissauan">Guinea-Bissauan</option>
                                                    <option value="guinean">Guinean</option>
                                                    <option value="guyanese">Guyanese</option>
                                                    <option value="haitian">Haitian</option>
                                                    <option value="herzegovinian">Herzegovinian</option>
                                                    <option value="honduran">Honduran</option>
                                                    <option value="hungarian">Hungarian</option>
                                                    <option value="icelander">Icelander</option>
                                                    <option value="indian">Indian</option>
                                                    <option value="indonesian">Indonesian</option>
                                                    <option value="iranian">Iranian</option>
                                                    <option value="iraqi">Iraqi</option>
                                                    <option value="irish">Irish</option>
                                                    <option value="israeli">Israeli</option>
                                                    <option value="italian">Italian</option>
                                                    <option value="ivorian">Ivorian</option>
                                                    <option value="jamaican">Jamaican</option>
                                                    <option value="japanese">Japanese</option>
                                                    <option value="jordanian">Jordanian</option>
                                                    <option value="kazakhstani">Kazakhstani</option>
                                                    <option value="kenyan">Kenyan</option>
                                                    <option value="kittian and nevisian">Kittian and Nevisian</option>
                                                    <option value="kuwaiti">Kuwaiti</option>
                                                    <option value="kyrgyz">Kyrgyz</option>
                                                    <option value="laotian">Laotian</option>
                                                    <option value="latvian">Latvian</option>
                                                    <option value="lebanese">Lebanese</option>
                                                    <option value="liberian">Liberian</option>
                                                    <option value="libyan">Libyan</option>
                                                    <option value="liechtensteiner">Liechtensteiner</option>
                                                    <option value="lithuanian">Lithuanian</option>
                                                    <option value="luxembourger">Luxembourger</option>
                                                    <option value="macedonian">Macedonian</option>
                                                    <option value="malagasy">Malagasy</option>
                                                    <option value="malawian">Malawian</option>
                                                    <option value="malaysian">Malaysian</option>
                                                    <option value="maldivan">Maldivan</option>
                                                    <option value="malian">Malian</option>
                                                    <option value="maltese">Maltese</option>
                                                    <option value="marshallese">Marshallese</option>
                                                    <option value="mauritanian">Mauritanian</option>
                                                    <option value="mauritian">Mauritian</option>
                                                    <option value="mexican">Mexican</option>
                                                    <option value="micronesian">Micronesian</option>
                                                    <option value="moldovan">Moldovan</option>
                                                    <option value="monacan">Monacan</option>
                                                    <option value="mongolian">Mongolian</option>
                                                    <option value="moroccan">Moroccan</option>
                                                    <option value="mosotho">Mosotho</option>
                                                    <option value="motswana">Motswana</option>
                                                    <option value="mozambican">Mozambican</option>
                                                    <option value="namibian">Namibian</option>
                                                    <option value="nauruan">Nauruan</option>
                                                    <option value="nepalese">Nepalese</option>
                                                    <option value="new zealander">New Zealander</option>
                                                    <option value="ni-vanuatu">Ni-Vanuatu</option>
                                                    <option value="nicaraguan">Nicaraguan</option>
                                                    <option value="nigerien">Nigerien</option>
                                                    <option value="north korean">North Korean</option>
                                                    <option value="northern irish">Northern Irish</option>
                                                    <option value="norwegian">Norwegian</option>
                                                    <option value="omani">Omani</option>
                                                    <option value="pakistani">Pakistani</option>
                                                    <option value="palauan">Palauan</option>
                                                    <option value="panamanian">Panamanian</option>
                                                    <option value="papua new guinean">Papua New Guinean</option>
                                                    <option value="paraguayan">Paraguayan</option>
                                                    <option value="peruvian">Peruvian</option>
                                                    <option value="polish">Polish</option>
                                                    <option value="portuguese">Portuguese</option>
                                                    <option value="qatari">Qatari</option>
                                                    <option value="romanian">Romanian</option>
                                                    <option value="russian">Russian</option>
                                                    <option value="rwandan">Rwandan</option>
                                                    <option value="saint lucian">Saint Lucian</option>
                                                    <option value="salvadoran">Salvadoran</option>
                                                    <option value="samoan">Samoan</option>
                                                    <option value="san marinese">San Marinese</option>
                                                    <option value="sao tomean">Sao Tomean</option>
                                                    <option value="saudi">Saudi</option>
                                                    <option value="scottish">Scottish</option>
                                                    <option value="senegalese">Senegalese</option>
                                                    <option value="serbian">Serbian</option>
                                                    <option value="seychellois">Seychellois</option>
                                                    <option value="sierra leonean">Sierra Leonean</option>
                                                    <option value="singaporean">Singaporean</option>
                                                    <option value="slovakian">Slovakian</option>
                                                    <option value="slovenian">Slovenian</option>
                                                    <option value="solomon islander">Solomon Islander</option>
                                                    <option value="somali">Somali</option>
                                                    <option value="south african">South African</option>
                                                    <option value="south korean">South Korean</option>
                                                    <option value="spanish">Spanish</option>
                                                    <option value="sri lankan">Sri Lankan</option>
                                                    <option value="sudanese">Sudanese</option>
                                                    <option value="surinamer">Surinamer</option>
                                                    <option value="swazi">Swazi</option>
                                                    <option value="swedish">Swedish</option>
                                                    <option value="swiss">Swiss</option>
                                                    <option value="syrian">Syrian</option>
                                                    <option value="taiwanese">Taiwanese</option>
                                                    <option value="tajik">Tajik</option>
                                                    <option value="tanzanian">Tanzanian</option>
                                                    <option value="thai">Thai</option>
                                                    <option value="togolese">Togolese</option>
                                                    <option value="tongan">Tongan</option>
                                                    <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                                    <option value="tunisian">Tunisian</option>
                                                    <option value="turkish">Turkish</option>
                                                    <option value="tuvaluan">Tuvaluan</option>
                                                    <option value="ugandan">Ugandan</option>
                                                    <option value="ukrainian">Ukrainian</option>
                                                    <option value="uruguayan">Uruguayan</option>
                                                    <option value="uzbekistani">Uzbekistani</option>
                                                    <option value="venezuelan">Venezuelan</option>
                                                    <option value="vietnamese">Vietnamese</option>
                                                    <option value="welsh">Welsh</option>
                                                    <option value="yemenite">Yemenite</option>
                                                    <option value="zambian">Zambian</option>
                                                    <option value="zimbabwean">Zimbabwean</option>
                                                </select>
                                            </div> <!-- form-group// -->
                                            <div class="col-sm-3">
                                                <label for="County"> County</label>
                                                <select class="form-control" name="County">
                                                    <option value="">-- select one --</option>
                                                    <option value='Baringo'>Baringo</option>
                                                    <option value='Bomet'>Bomet</option>
                                                    <option value='Bungoma'>Bungoma</option>
                                                    <option value='Busia'>Busia</option>
                                                    <option value='Elgeyo-Marakwet'>Elgeyo-Marakwet</option>
                                                    <option value='Embu'>Embu</option>
                                                    <option value='Garissa'>Garissa</option>
                                                    <option value='Homa Bay'>Homa Bay</option>
                                                    <option value='Isiolo'>Isiolo</option>
                                                    <option value='Kajiado'>Kajiado</option>
                                                    <option value='Kakamega'>Kakamega</option>
                                                    <option value='Kericho'>Kericho</option>
                                                    <option value='Kiambu'>Kiambu</option>
                                                    <option value='Kilifi'>Kilifi</option>
                                                    <option value='Kirinyaga'>Kirinyaga</option>
                                                    <option value='Kisii'>Kisii</option>
                                                    <option value='Kisumu'>Kisumu</option>
                                                    <option value='Kitui'>Kitui</option>
                                                    <option value='Kwale'>Kwale</option>
                                                    <option value='Laikipia'>Laikipia</option>
                                                    <option value='Lamu'>Lamu</option>
                                                    <option value='Machakos'>Machakos</option>
                                                    <option value='Makueni'>Makueni</option>
                                                    <option value='Mandera'>Mandera</option>
                                                    <option value='Marsabit'>Marsabit</option>
                                                    <option value='Meru'>Meru</option>
                                                    <option value='Migori'>Migori</option>
                                                    <option value='Mombasa'>Mombasa</option>
                                                    <option value='Murang' a'>Murang'a</option>
                                                    <option value='Nairobi City'>Nairobi City</option>
                                                    <option value='Nakuru'>Nakuru</option>
                                                    <option value='Nandi'>Nandi</option>
                                                    <option value='Narok'>Narok</option>
                                                    <option value='Nyamira'>Nyamira</option>
                                                    <option value='Nyandarua'>Nyandarua</option>
                                                    <option value='Nyeri'>Nyeri</option>
                                                    <option value='Samburu'>Samburu</option>
                                                    <option value='Siaya'>Siaya</option>
                                                    <option value='Taita-Taveta'>Taita-Taveta</option>
                                                    <option value='Tana River'>Tana River</option>
                                                    <option value='Tharaka-Nithi'>Tharaka-Nithi</option>
                                                    <option value='Trans Nzoia'>Trans Nzoia</option>
                                                    <option value='Turkana'>Turkana</option>
                                                    <option value='Uasin Gishu'>Uasin Gishu</option>
                                                    <option value='Vihiga'>Vihiga</option>
                                                    <option value='West Pokot'>West Pokot</option>
                                                    <option value='wajir'>wajir</option>
                                                </select>
                                            </div> <!-- form-group// -->
                                            <div class="col-sm-3">
                                                <label for="">Religion </label>
                                                <input name="Religion" class="form-control" type="text">
                                            </div> <!-- form-group// -->
                                        </div>
                                        <hr class="form-divider">
                                        <div class=" col-sm-2">
                                            <button type="submit" name="Submit" class="btn btn-primary btn-block">Submit </button>
                                        </div> <!-- form-group// -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php include("includes/footer.php"); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>