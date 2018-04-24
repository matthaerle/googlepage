<?php
$head_title = "Matt Haerle's Homepage";
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    //header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
if(isset($_COOKIE["user_info"])) {
    echo "<script>Alert(".$_COOKIE['user_info'] .")</script>";
}
?>
<!DOCTYPE html>
<html ng-app="myApp">
<head>
<?php include($_SERVER['DOCUMENT_ROOT'].'/layout/pieces/Head.php');?>



</head>
<body id="page-top" class="index" ng-controller="myCtrl">

<?php include_once($_SERVER['DOCUMENT_ROOT'].'/layout/pieces/Login_Nav.php') ?>






<!-- Header -->
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/profile1.png" style="width: 400px" alt="">
                    <div class="intro-text">
                        <h1 class="name" >Matt's Homepage</h1>
                        <hr class="star-primary">
                        <span class="skills">Computer Programmer<br />Android Developer - Dot Net - Java  - PHP - SQL/MySQL</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->

    <section id="portfolio">
	
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Stuff I've Made</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row"  >

                <div ng-repeat-start="port in portfolio" class='col-sm-4 portfolio-item'>
                    <a ng-href='#portfolioModal{{port.num}}' class='portfolio-link' data-toggle='modal' data-tooltip='tooltip' title='{{port.title}}'>
                        <div class='caption'>
                            <div class='caption-content'>
                                <i class='fa fa-search-plus fa-3x'></i>
                            </div>
                        </div>
                        <img  ng-src='../../img/portfolio/{{port.fileName}}' class='img-responsive' alt=''>
                        <p>{{port.title}}</p>
                    </a>
                </div >
                <div ng-repeat-end ></div>



            </div>
        </div>
		
    </section>
	

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div ng-repeat="x in about_me" class="col-lg-6">
                    <p>{{x.aboutMe}}</p>
                </div>
            </div>
        </div>
    </section>




    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
<div >
    <div ng-repeat="x in portfolio" class='portfolio-modal modal fade' ng id='portfolioModal{{x.num}}' tabindex='-1' role='dialog' aria-hidden='true'>
        <div class='modal-content'>
            <div class='close-modal' data-dismiss='modal'>
                <div class='lr'>
                    <div class='rl'>
                    </div>
                </div>
            </div>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-8 col-lg-offset-2'>
                        <div class='modal-body'>
                            <h2>{{x.title}}</h2>
                            <hr class='star-primary'>
                            <a href='{{x.link}}'>
                                <img ng-src='../../img/portfolio/{{x.fileName}}' class='img-responsive img-centered' alt=''>
                            </a>

                            <p><b>Description:</b><br />{{x.description}}</p>
                            <p><b>Technolgy used:</b><br />{{x.technologyUsed}}</p>
                            <a class="btn btn-default" ng-href="{{x.link}}">View GitHub</a>
                            <ul class='list-inline item-details'>
                                <li>Client:
                                    <strong><a href='{{x.clientLink}}'>{{x.client}}</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href='{{x.link}}'>{{x.date}}</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href='{{x.link}}'>{{x.service}}</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type='button' class='btn btn-default' data-dismiss='modal'><i class='fa fa-times'></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/layout/pieces/Contact_Form.php");
Display_Contact_Form();
?>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/layout/pieces/footer.html');?>
</body>

<?include_once($_SERVER['DOCUMENT_ROOT'].'/layout/pieces/Bottom_Scripts.html');?>


</html>

