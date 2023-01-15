<?php
session_start();

if (!$_SESSION['id']) {
    header('location:signin.php');
}

?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Cheerful Loving Couple Bakers Drinking Coffee</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="This is meta description">

    <!-- plugins -->
    <link rel="preload" href="https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2" style="font-display: optional;">
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:600%7cOpen&#43;Sans&amp;display=swap" media="screen">

    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="plugins/slick/slick.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
</head>

<body>
    <!-- navigation -->
    <header class="sticky-top bg-white border-bottom border-default">
        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-white">
                <a class="navbar-brand" href="index.html">
                    <img class="img-fluid" width="150px" src="images/logo1.png" alt="LogBook">
                </a>
                <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
                    <i class="ti-menu"></i>
                </button>

                <div class="collapse navbar-collapse text-center" id="navigation">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <a class="nav-link" href="postlist.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Write_A_Post.php">Write</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if (!$_SESSION['id']) {
                                    echo 'Guest';
                                    echo '<i class="ti-angle-down ml-1"></i>
									</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="logout.php">Sign In</a>
									</div>';
                                } else {
                                    echo ucfirst($_SESSION['name']);
                                    echo '<i class="ti-angle-down ml-1"></i>
									</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="profile.php?profile=' . $_SESSION['email'] . '">Profile</a>
										<a class="dropdown-item" href="logout.php">Logout</a>
									</div>';
                                } ?>
                    </ul>

                    <!-- search -->
                    <!-- <div class="search px-4">
               <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
               <div class="search-wrapper">
                  <form action="javascript:void(0)" class="h-100">
                     <input class="search-box pl-4" id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                  </form>
                  <button id="searchClose" class="search-close"><i class="ti-close text-dark"></i></button>
               </div>
            </div> -->

                </div>
            </nav>
        </div>
    </header>
    <!-- /navigation -->

    <section class="section">
        <div class="container">
            <h1>Topics To Explore :</h1>
        </div>
        <div class="container text-center py-1">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mx-auto pt-5">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><h3>HTML</h3><br><br><a href="categorieslist.php?categories=HTML"><button type="button" class="btn btn-outline-primary">Get
                                        Started</button></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mx-auto pt-5">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><h3>CSS</h3><br><br><a href="categorieslist.php?categories=CSS"><button type="button" class="btn btn-outline-primary">Get
                                        Started</button></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mx-auto pt-5">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><h3>JAVA</h3><br><br><a href="categorieslist.php?categories=JAVA"><button type="button" class="btn btn-outline-primary">Get
                                        Started</button></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mx-auto pt-5">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><h3>JAVASCRIPT</h3><br><br><a href="categorieslist.php?categories=JAVASCRIPT"><button type="button" class="btn btn-outline-primary">Get
                                        Started</button></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mx-auto pt-5">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><h3>MYSQL</h3><br><br><a href="categorieslist.php?categories=MYSQL"><button type="button" class="btn btn-outline-primary">Get
                                        Started</button></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer class="section-sm pb-0 border-top border-default">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-3 mb-4">
                    <a class="mb-4 d-block" href="index.html">
                        <img class="img-fluid" width="150px" src="images/logo1.png" alt="LogBook">
                    </a>
                    <p>The endless pursuit of programming mastery is now available with programmer's hideout. Come to the programmer's hideout to learn, share your knowledge, and become a community of experts.</p>
                </div>

                <div class="col-lg-2 col-md-3 col-6 mb-4">
                    <h6 class="mb-4">Quick Links</h6>
                    <ul class="list-unstyled footer-list">
                    <li><a href="postlist.php">Home</a></li>
                  <li><a href="Write_A_Post.php">Write</a></li>
                  <li><a href="signin.php">Sign In</a></li>
                    </ul>
                </div>

                <!-- <div class="col-lg-2 col-md-3 col-6 mb-4">
               <h6 class="mb-4">Social Links</h6>
               <ul class="list-unstyled footer-list">
                  <li><a href="#">github</a></li>
               </ul>
            </div> -->

                <div class="col-md-6 mb-4">
                    <h6 class="mb-4">Invite to Friend</h6>
                    <form class="subscription" action="php/invite.php" method="post">
                        <div class="position-relative">
                            <i class="ti-email email-icon"></i>
                            <!-- INSERT INTO `invitefrnd`(`frndemail`) VALUES ('[value-2]'); -->
                            <input type="email" class="form-control" placeholder="Email Address" name="frndemail">
                        </div>
                        <button class="btn btn-primary btn-block rounded" type="submit" name="submit">Invite</button>
                    </form>
                </div>
            </div>
            <div class="scroll-top">
                <a href="javascript:void(0);" id="scrollTop">Up</a>
            </div>
            <div class="text-center">
                <p class="content">&copy; 2022-<?php echo date("Y"); ?></p>
            </div>
        </div>
    </footer>


    <!-- JS Plugins -->
    <script src="plugins/jQuery/jquery.min.js"></script>
    <script src="plugins/bootstrap/bootstrap.min.js" async></script>
    <script src="plugins/slick/slick.min.js"></script>

    <!-- Main Script -->
    <script src="js/script.js"></script>
</body>

</html>