<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Deep Learning India</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Newtron.in</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="./account.php">Sign In Or Sign Up</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="./index.php#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="./index.php#services">COURSES</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="./index.php#portfolio">Research</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="./index.php#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    

    

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">ACCOUNT OPTIONS</h2>
                    <h5 class="section-heading">Sign in and be a part of our discussions</h5>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div id="account_wrapper">
                <div class="col-lg-4 col-md-6 text-center" >
                    <div class="service-box">
                    	
	                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
	                        <h3>Sign In</h3>
	                        <p class="text-muted">For users who already have an account in Newtron.in</p>
                            <br>
                            <form action="signin.php" method="post">
                            <input type="text" name="uname" class="form-control" placeholder="Your Username.."/>
                            <input type="password" name="pword" class="form-control" placeholder="Your Password.."/>
                            <br>
                            <a id="signinbtn" class="btn btn-default btn-xl wow tada" style="background-color:#000; color:#FFF">Sign in</a>
                            </form>
	                    
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
	                    <a href="#">
	                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
	                        <h3>Sign In via Facebook</h3>
	                        <p class="text-muted">No account creation required, just a Facebook account</p>
                            <br>
                            <a id="fbsigninbtn" class="btn btn-default btn-xl wow tada" style="background-color:#000; color:#FFF">Facebook Sign In</a>
	                    </a>    
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                    	<a href="#">
	                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
	                        <h3>Create An Account</h3>
	                        <p class="text-muted">Join the league of AI enthusiasts</p>
                            <br>
                            <a href="#signupsection" class="btn btn-default btn-xl wow tada" style="background-color:#000; color:#FFF">Sign Up</a>
	                    </a>    
	                </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">LETS GET IN TOUCH!</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>+91-97900-40600</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">deeplearningindia@gmail.com</a></p>
                </div>
            </div>
        </div>
        <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="https://twitter.com/DeepSrivignessh">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/pages/Deep-Learning-Artificial-Intelligence/472081616289751">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/DeepLearningIndia">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted" align="center">Copyright &copy; Newtron.in 2015</p>

                </div>


            </div>
        </div>
    </footer>
    </section>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>
