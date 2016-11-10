<?php
    require_once('controller.php');

    if (!isLoggedIn()) logOut();
    
    if (!isset($_REQUEST['profile_id'])) header('Location: resume.php');

    $profile = getProfile($_REQUEST['profile_id']);
?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
         <meta name="author" content="Coderthemes">
 
         <!-- App Favicon -->
         <link rel="shortcut icon" href="template-assets/images/favicon.ico">
 
         <!-- App title -->
         <title>US Tech Backup Datebase</title>
 
         <!--Morris Chart CSS -->
         <!-- <link rel="stylesheet" href="template-assets/plugins/morris/morris.css"> -->
 
         <!-- Switchery css -->
         <link href="template-assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
 
         <!-- App CSS -->
         <link href="template-assets/css/style.css" rel="stylesheet" type="text/css" />

         <style>
             #resume_body_iframe {
                 width: 100%;
                 height: 500px;
                 border: 0px solid gray;
             }
             #iframe-content {
                display: none;
             }
         </style>
 
         <script type="text/javascript">
           var style = 'assets/css/style.css?'+Math.random();;
         </script>
 
         <script type="text/javascript">
           document.write('<link href="'+style+'" rel="stylesheet">');
 
         </script>
        
 
 
         <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
         <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
         <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
         <![endif]-->
         <!-- Modernizr js -->
         <script src="template-assets/js/modernizr.min.js"></script>
 
     </head>
 
 
     <body>
 
         <!-- Navigation Bar-->
         <header id="topnav">
             <div class="topbar-main">
                 <div class="container">
 
                     <!-- LOGO -->
                     <div class="topbar-left">
                         <a href="index.php" class="logo">
                             <i class="zmdi zmdi-group-work icon-c-logo"></i>
                             <span>US Tech Backup Datebase</span>
                         </a>
                     </div>
                     <!-- End Logo container-->
 
 
                     <div class="menu-extras">
 
                         <ul class="nav navbar-nav pull-right">
 
                             <li class="nav-item">
                                 <!-- Mobile menu toggle-->
                                 <a class="navbar-toggle">
                                     <div class="lines">
                                         <span></span>
                                         <span></span>
                                         <span></span>
                                     </div>
                                 </a>
                                 <!-- End mobile menu toggle-->
                             </li>
 
 
                             <li class="nav-item dropdown notification-list">
                             
                                 <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" href="javascript: logOut();" role="button" aria-haspopup="false" aria-expanded="false">
                                     <i class="zmdi  zmdi-power noti-icon"></i>
                                     
                                 </a>
                                 
                             </li>
 
                         </ul>
 
                     </div> <!-- end menu-extras -->
                     <div class="clearfix"></div>
 
                 </div> <!-- end container -->
             </div>
             <!-- end topbar-main -->
 
 
             <div class="navbar-custom">
                 <div class="container">
                     <div id="navigation">
                         <!-- Navigation Menu-->
                         <ul class="navigation-menu">
                             <li>
                                 <a href="resume.php"><i class="zmdi zmdi-view-dashboard"></i> <span> Resume </span> </a>
                             </li>
 
                              <li>
                                 <a href="users.php"><i class="zmdi zmdi-format-underlined"></i> <span> Users </span> </a>
                             </li>
 
                            
                             <li>
                                 <a href="notification.php"><i class="zmdi zmdi-view-dashboard"></i> <span> Notification </span> </a>
                             </li>
 
                             
                         </ul>
                         <!-- End navigation menu  -->
                     </div>
                 </div>
             </div>
         </header>
         <!-- End Navigation Bar-->
 

          

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="wrapper">
            <div class="container">

                <!-- Page-Title --> 
                <div class="row">
                    <div class="col-sm-12">
                        
                        <h4 class="page-title">Resume</h4> 
                    </div>
                </div>
  

               <div class="card-box table-responsive">
                                           

                    <div class="row">
                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <h4>Sr Web Developer</h4>
                        
                      </div> <!-- col --> 

                      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
                            <a href="javascript:downloadResume(<?php echo $profile['attachment_id']; ?>);" class="btn btn-primary<?php echo $profile['attachment_id'] * 1 == 0 ? ' disabled' : ''; ?>">Download Resume</a>
                            <a href="resume.php" type="button" class="btn btn-success">Back to Resume Listing</a>
                        
                      </div> <!-- col -->

                    </div> <!-- row -->

                   
                    <br>

 
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            
                            <table class="table table-striped view-resume">
                               
                                <tbody>
                                    
                                    <tr>
                                        <td>
                                           Download By :
                                        </td>
                                        
                                        <td>
                                           <?php echo $profile['full_name']; ?>
                                        </td>
                                        
                                    </tr>

                                     <tr>
                                        <td>
                                          Portal :   
                                        </td>
                                        
                                        <td>
                                           <?php echo $profile['phone']; ?>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                          Date:   
                                        </td>
                                        
                                        <td>
                                          <?php echo $profile['created_at']; ?>
                                        </td>
                                        
                                    </tr>

                                </tbody>

                            </table>
                            <!-- <p class="m-b-10 bold">Experience</p>
                            <table class="table table-striped view-resume">
                               
                                <tbody>
                                    
                                    <tr>
                                        <td>
                                           Total years experience:
                                        </td>
                                        
                                        <td>
                                           11 Years, 7 Months 
                                        </td>
                                        
                                    </tr>

                                     <tr>
                                        <td>
                                           Job Categories:
                                        </td>
                                        
                                        <td>
                                           Information Technology  (No experience)
                                             (No experience)
                                        </td>
                                        
                                    </tr>

                                </tbody>
                            </table>

                             <p class="m-b-10 bold">Work History</p>
                            <table class="table table-striped view-resume">
                               
                                <tbody>
                                    
                                    <tr>
                                        <td>
                                          Company Name:  <br>
                                          Job Title:    
                                        </td>
                                        
                                        <td>
                                           Systema Sarao-Scenics Studios <br>
                                           Freelancer Software Developer
                                        </td>
                                        <td>
                                            (2 Years) September 2014 - June 2016
                                        </td>
                                        
                                    </tr>

                                     <tr>
                                        <td>
                                          Company Name:  <br>
                                          Job Title:    
                                        </td>
                                        
                                        <td>
                                           Utopía Software S.A De C.V <br>
                                           Software Developer / Analyst
                                        </td>
                                        <td>
                                            (2 Years) February 2014 - February 2016
                                        </td>
                                        
                                    </tr>


                                     <tr>
                                        <td>
                                          Kenopulicidad / Cancun  <br>
                                          Job Title:    
                                        </td>
                                        
                                        <td>
                                           Systema Sarao-Scenics Studios <br>
                                           Software Developer
                                        </td>
                                        <td>
                                           (5 Years) July 2010 - July 2015
                                        </td>
                                        
                                    </tr>

                                    

                                </tbody>
                            </table>

                            <p class="m-b-10 bold">Education</p>
                            <table class="table table-striped view-resume">
                               
                                <tbody>
                                    
                                    <tr>
                                        <td>
                                           School:
                                        </td>
                                        
                                        <td>
                                           Polytechnic University Jose Antonio Echevarria (Cujae), Havana, Cuba
                                        </td>

                                        <td>
                                            May 2007
                                        </td>
                                        
                                    </tr>



                                     

                                </tbody>
                            </table> -->

                        </div> <!-- col -->
                    </div> <!-- row -->


                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="resume-view">
                                <iframe id="resume_body_iframe"></iframe>
                                <div id="iframe-content" class="hide"><?php echo $profile['resume_body']; ?></div>
                            </div>
                        </div> <!-- col -->
                    </div> <!-- row -->

                  
               </div>
                                  


               


                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                2016 © Uplon.
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->


            </div> <!-- container -->




            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <div class="nicescroll">
                    <ul class="nav nav-tabs text-xs-center">
                        <li class="nav-item">
                            <a href="#home-2"  class="nav-link active" data-toggle="tab" aria-expanded="false">
                                Activity
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages-2" class="nav-link" data-toggle="tab" aria-expanded="true">
                                Settings
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home-2">
                            <div class="timeline-2">
                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">5 minutes ago</small>
                                        <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">30 minutes ago</small>
                                        <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">59 minutes ago</small>
                                        <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">1 hour ago</small>
                                        <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">3 hours ago</small>
                                        <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">5 hours ago</small>
                                        <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="messages-2">

                            <div class="row m-t-20">
                                <div class="col-xs-8">
                                    <h5 class="m-0">Notifications</h5>
                                    <p class="text-muted m-b-0"><small>Do you need them?</small></p>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#64b0f2" data-size="small"/>
                                </div>
                            </div>

                            <div class="row m-t-20">
                                <div class="col-xs-8">
                                    <h5 class="m-0">API Access</h5>
                                    <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#64b0f2" data-size="small"/>
                                </div>
                            </div>

                            <div class="row m-t-20">
                                <div class="col-xs-8">
                                    <h5 class="m-0">Auto Updates</h5>
                                    <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#64b0f2" data-size="small"/>
                                </div>
                            </div>

                            <div class="row m-t-20">
                                <div class="col-xs-8">
                                    <h5 class="m-0">Online Status</h5>
                                    <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#64b0f2" data-size="small"/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- end nicescroll -->
            </div>
            <!-- /Right-bar -->



         </div> <!-- End wrapper -->
        
        
        
        
                <script>
                    var resizefunc = [];
                </script>
        
                <!-- jQuery  -->
                <script src="template-assets/js/jquery.min.js"></script>
                <script src="template-assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
                <script src="template-assets/js/bootstrap.min.js"></script>
                <script src="template-assets/js/waves.js"></script>
                <script src="template-assets/js/jquery.nicescroll.js"></script>
                <script src="template-assets/plugins/switchery/switchery.min.js"></script>
        
                <!--Morris Chart-->
        		<!-- <script src="template-assets/plugins/morris/morris.min.js"></script>
        		<script src="template-assets/plugins/raphael/raphael-min.js"></script> -->
        
                <!-- Counter Up  -->
                <script src="template-assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
                <script src="template-assets/plugins/counterup/jquery.counterup.min.js"></script>
        
        
        
                <!-- App js -->
                <script src="template-assets/js/jquery.core.js"></script>
                <script src="template-assets/js/jquery.app.js"></script>
        
                <!-- Page specific js -->
                <!-- <script src="template-assets/pages/jquery.dashboard.js"></script> -->
        
        
                <script type="text/javascript">
                        var iframe = document.getElementById('resume_body_iframe');
                        iframedoc = iframe.contentDocument || iframe.contentWindow.document;
                        iframedoc.body.innerHTML = $('#iframe-content').html();

                            $(document).ready(function() {
                            } );
        
                            function logOut() {
                                if (confirm ('Are you sure want to log out?')) {
                                    window.open('controller.php?flag=logout', '_self');
                                }
                            }
                            
                            function downloadResume (attachmentId) {
                                url = 'controller.php?flag=download_resume';
                                url += '&attachment_id=' + attachmentId;
                                window.location.assign(url); 
                            }
                        </script>
        
                        <style type="text/css">
                        .dataTables_filter, .dataTables_info { display: none; }
                        </style>
        
        
            </body>
        </html>