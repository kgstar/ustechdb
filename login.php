<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App title -->
        <title>Uplon - Responsive Admin Dashboard Template</title>

        <!-- App CSS -->
        <link href="template-assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="template-assets/js/modernizr.min.js"></script>

        <style type="text/css">
            .error-border {
                border: 1px solid red;
            }
        </style>

    </head>


    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">

        	<div class="account-bg">
                <div class="card-box m-b-0">
                    <div class="text-xs-center m-t-20">
                        <a href="login.php" class="logo">
                            <i class="zmdi zmdi-group-work icon-c-logo"></i>
                            <span>Uplon</span>
                        </a>
                    </div>
                    <div class="m-t-10 p-20">
                        <div class="row">
                            <div class="col-xs-12 text-xs-center">
                                <h6 class="text-muted text-uppercase m-b-0 m-t-0">Sign In</h6>
                            </div>
                        </div>
                        <form class="m-t-20" id="dataform" action="controller.php?flag=login" method="POST">

                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <input class="form-control" id="email" type="email" name="email" required="" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <input class="form-control" type="password" id="password" name="password" " required="" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <div class="checkbox checkbox-custom">
                                        <input id="checkbox-signup" type="checkbox">
                                        <label for="checkbox-signup">
                                            Remember me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-10">
                                <div class="col-xs-12">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            <div class="form-group row m-t-30 m-b-0">
                                <div class="col-sm-12">
                                    <a href="reset.php" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                </div>
                            </div>

                           <!--  <div class="form-group row m-t-30 m-b-0">
                                <div class="col-sm-12 text-xs-center">
                                    <h5 class="text-muted"><b>Sign in with</b></h5>
                                </div>
                            </div>

                            <div class="form-group row m-b-0 text-xs-center">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-facebook waves-effect waves-light m-t-20">
                                       <i class="fa fa-facebook m-r-5"></i> Facebook
                                    </button>

                                    <button type="button" class="btn btn-twitter waves-effect waves-light m-t-20">
                                       <i class="fa fa-twitter m-r-5"></i> Twitter
                                    </button>

                                    <button type="button" class="btn btn-googleplus waves-effect waves-light m-t-20">
                                       <i class="fa fa-google-plus m-r-5"></i> Google+
                                    </button>
                                </div>
                            </div> -->

                        </form>

                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end card-box-->
<!-- 
            <div class="m-t-20">
                <div class="text-xs-center">
                    <p class="text-white">Don't have an account? <a href="pages-register.html" class="text-white m-l-5"><b>Sign Up</b></a></p>
                </div>
            </div> -->

        </div>
        <!-- end wrapper page -->


        <script>
            var resizefunc = [];

            

        </script>

        <!-- jQuery  -->
        <!-- jQuery  -->
        <script src="template-assets/js/jquery.min.js"></script>
        <script src="template-assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="template-assets/js/bootstrap.min.js"></script>
        <script src="template-assets/js/waves.js"></script>
        <script src="template-assets/js/jquery.nicescroll.js"></script>
        <script src="template-assets/plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="template-assets/js/jquery.core.js"></script>
        <script src="template-assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            loginResult = '<?php echo isset($_REQUEST['result']) ? $_REQUEST['result'] : ''; ?>';
            
            if (loginResult == 'BAD_EMAIL' || loginResult == 'BAD_PWD') {
                $('#email').val("<?php echo isset($_REQUEST['email']) ? $_REQUEST['email'] : ''; ?>");
                $('#password').val("<?php echo isset($_REQUEST['password']) ? $_REQUEST['password'] : ''; ?>");
            }
            if (loginResult == 'BAD_EMAIL') {
                $('#email').addClass('error-border');//.focus().select();
            } else if (loginResult == 'BAD_PWD') {
                $('#password').addClass('error-border');//.focus().select();
            }
            $(document).ready(function () {
                // $('#email').focus().select();
                $('#email,#password').blur(function () {
                    if ($(this).val() != '') $(this).removeClass('error-border');
                    else $(this).addClass('error-border');
                });
            });
        </script>
    </body>
</html>