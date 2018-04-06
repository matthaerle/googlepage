<?php
$head_title = "Matt Haerle's Homepage";
require 'layout/template_head.php';
?>




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
            <div class="row">
                <?php
                include $_SERVER['DOCUMENT_ROOT'].'/layout/pieces/portfolio_piece.php';
                $string = file_get_contents($_SERVER['DOCUMENT_ROOT']."/db/data/portfolio.json");
                $json = json_decode($string,true);

                foreach ($json as $portfolio => $portfolioItem) {
                    Load_Portfolio_Piece($portfolioItem['fileName'],$portfolioItem['num'],$portfolioItem['title']);
                }
                ?>

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
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Welcome to my home page, if you have found this webpage, congratulations</p>
                </div>
                <div class="col-lg-4">
                    <p>This page was coded with PHP and uses MySQL</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
<?php

Display_Contact_Form();
?>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-5">
                        <h3>Location</h3>
                        <p>Sartell, MN 56377</p>
                    </div>
                    <div class="footer-col col-md-5">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://twitter.com/Typical_Id10t?lang=en" class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/in/matt-haerle-7ba211b3/" class="btn-social btn-outline"><span class="sr-only">Linked In</span><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="https://github.com/matthaerle" class="btn-social btn-outline"><span class="sr-only">GitHub</span><i class="fa fa-fw fa-github"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Matt Haerle 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
<?php
foreach ($json as $portfolio => $portfolioItem) {
    Load_Portfolio_Piece_Modal($portfolioItem['fileName'],$portfolioItem['num'],$portfolioItem['title'],$portfolioItem['description'],$portfolioItem['link'],$portfolioItem['client'],$portfolioItem['clientLink'],$portfolioItem['date'],$portfolioItem['service']);
}


?>
</body>


    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>


    
    <script type="text/javascript">

            function postStuff() {
                // Create our XMLHttpRequest object
                var hr = new XMLHttpRequest();
                // Create some variables we need to send to our PHP file
                var url = "/mail";
                var name = document.getElementById("name").value;
                var email = document.getElementById("email_contact").value;
                var phone = document.getElementById("phone").value;
                var message = document.getElementById("message").value;
                var vars = "name=" + name + "&email=" + email + "&phone=" + phone + "&message=" + message;
                if (name != "" && email != "" && phone != "" && message != "") {
                    hr.open("POST", url, true);
                    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    // Access the onreadystatechange event for the XMLHttpRequest object
                    hr.onreadystatechange = function () {
                        if (hr.readyState == 4 && hr.status == 200) {
                            var return_data = hr.responseText;
                            document.getElementById("result").innerHTML = return_data;
                        }
                    }
                    // Send the data to PHP now... and wait for response to update the status div
                    hr.send(vars); // Actually execute the request
                    document.getElementById("result").innerHTML = "processing...";
                }
                else {
                    alert("Please make sure to fill in all boxes");
                }
            }


        
    </script>

<script src="js/load_dropdown.js" ></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
    $.validate();
</script>
<script>
    $(document).ready(function () {
        $("#login").click(function () {
            $('#login-modal').modal();
        });
        $("#login-new").click(function () {
            $('#login-modal').modal('hide');
            $('#register-modal').modal();
        });
        $('[data-tooltip="tooltip"]').tooltip();
        $('.close-modal').click(function () {
            $('[data-tooltip="tooltip"]').tooltip("hide");
        });
    });
</script>
<div id="status"></div>


</html>

<?php
function Display_Contact_Form() {
    echo "<section id=\"contact\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-12 text-center\">
                    <h2>Contact Me</h2>
                    <hr class=\"star-primary\">
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-lg-8 col-lg-offset-2\">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name=\"sentMessage\" id=\"contactForm\"  novalidate>
                        <div class=\"row control-group\">
                            <div class=\"form-group col-xs-12 floating-label-form-group controls\">
                                <label for=\"name\">Name</label>
                                <input type=\"text\" class=\"form-control\" data-validation=\"required\" placeholder=\"Name\" id=\"name\" required data-validation-required-message=\"Please enter your name.\">
                                <p class=\"help-block text-danger\"></p>
                            </div>
                        </div>
                        <div class=\"row control-group\">
                            <div class=\"form-group col-xs-12 floating-label-form-group controls\">
                                <label for=\"email\">Email Address</label>
                                <input data-validation=\"email\"  class=\"form-control\" placeholder=\"Email Address\" id=\"email_contact\" required data-validation-required-message=\"Please enter your email address.\">
                                <p class=\"help-block text-danger\"></p>
                            </div>
                        </div>
                        <div class=\"row control-group\">
                            <div class=\"form-group col-xs-12 floating-label-form-group controls\">
                                <label for=\"phone\">Phone Number</label>
                                <input type=\"tel\" data-validation=\"required\" class=\"form-control\" placeholder=\"Phone Number\" id=\"phone\" required data-validation-required-message=\"Please enter your phone number.\">
                                <p class=\"help-block text-danger\"></p>
                            </div>
                        </div>
                        <div class=\"row control-group\">
                            <div class=\"form-group col-xs-12 floating-label-form-group controls\">
                                <label for=\"message\">Message</label>
                                <textarea rows=\"5\" class=\"form-control\" data-validation=\"required\" placeholder=\"Message\" id=\"message\" required data-validation-required-message=\"Please enter a message.\"></textarea>
                                <p class=\"help-block text-danger\"></p>
                            </div>
                        </div>
                        <br>
                        <div id=\"success\"></div>
                        <div class=\"row\">
                            <div class=\"form-group col-xs-12\">
                                <button onclick=\"postStuff();\" class=\"btn btn-success btn-lg\" type=\"button\">Send</button>
                            </div>
                        </div>
                    </form>
                    <div id=\"result\"></div>
                </div>
            </div>
        </div>
    </section>";
}

?>