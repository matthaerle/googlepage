<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#page-top">Matt's Homepage</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="dropdown" id="support_links">


                </li>
                <?php ($_SESSION['username'] == 'matt') ? include 'admin.html' : ''?>
                <li class="page-scroll">
                    <a href="#portfolio">Stuff I've Made</a>
                </li>
                <li class="page-scroll">
                    <a href="#about">About</a>
                </li>
                <li class="page-scroll">
                    <a href="#contact">Contact</a>
                </li>
                <li <?php echo ( isset($_SESSION['username']) ? 'data-toggle="modal" data-target="#account-modal"' : 'id="login"') ?>>
                    <a><?php echo ( isset($_SESSION['username']) ? ucfirst($_SESSION['username']) : 'Login') ?>
                        <span class="glyphicon glyphicon-user"></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="modal fade" id="account-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-lock"></span> Account</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <p><?php echo ( isset($_SESSION['username']) ? ucfirst($_SESSION['username']) : 'Login') ?></p>
                <a href="../registration/logout" class="btn btn-default">Logout</a>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="register-modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form method="post" action="/registration/register">
                    <div class="form-group">
                        <label for="new-usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                        <input class="form-control" name="username" placeholder="Enter UserName">
                    </div>
                    <div class="form-group">
                        <label for="new-usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
                        <input class="form-control" data-validation="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="new-psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                        <input type="password" class="form-control" name="password_1" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="new-confirm-psw"><span class="glyphicon glyphicon-eye-open"></span>Confirm Password</label>
                        <input type="password" class="form-control" name="password_2" placeholder="Enter password">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" checked>Remember me</label>
                    </div>
                    <div class="form-group">
                        <button name="reg_user" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Register</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>

    </div>
</div>
<!--</editor-fold>-->

<!--<editor-fold desc="login-modal">-->
<div class="modal fade" id="login-modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form method="post" action="/registration/login">
                    <div class="form-group">
                        <label for="new-usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                        <input class="form-control" name="username" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="new-psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" checked>Remember me</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login_user" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <p>Not a member? <a href="#" id="login-new">Sign Up</a></p>
                <p>Forgot <a href="#">Password?</a></p>
            </div>
        </div>

    </div>
</div>