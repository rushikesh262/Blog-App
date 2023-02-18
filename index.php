<?php
session_start();

// if (!$_SESSION['id']) {
//    header('location:signin.php');
// }

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

   <link rel="stylesheet" href="css/styleindex.css">

   <!--Favicon-->
   <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
   <link rel="icon" href="images/favicon.png" type="image/x-icon">
</head>

<body>
   <!-- navigation -->
   <header class="sticky-top bg-white border-bottom border-default">
      <div class="container">

         <nav class="navbar navbar-expand-lg navbar-white">
            <a class="navbar-brand" href="index.php">
               <img class="img-fluid" width="150px" src="images/logo1.png" alt="LogBook">
            </a>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
               <i class="ti-menu"></i>
            </button>

            <div class="collapse navbar-collapse text-center" id="navigation">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="categories.php">Explore</a>
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

       <!-- hero section -->
       <section class="section">
        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4"
                src="images/programmers-hideout-high-resolution-logo-color-on-transparent-background.png"
                alt="" width="30%" height="auto">
            <h1 class="display-5 fw-bold">The learning hideout</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Trying to make the world a better place one post at a time.</br>Interested in
                    programming?<a href="#"> Read more here. </a></p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <div class="wrapper">
                        <a href="postlist.php"><span>Get Started!</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="col-md-6 container">
            <blockquote class="blockstyle" id="quote">
            </blockquote>
        </div>
        <script>
            var down = document.getElementById('quote');

            var arr = [
                'Dont\'t worry if it doesn\'t work right. If everything did, you\'d be out of a job',
                'Don\'t comment bad code - rewrite it.',
                'programming language is for thinking about programs, not for expressing programs you\'ve already thought of. It should be a pencil, not a pen.',
                'Sometimes it pays to stay in bed on Monday, rather than spending the rest of the week debugging Monday\'s code.',
                'It´s better to wait for a productive programmer to become available than it is to wait for the first available programmer to become productive.',
                'Without requirements or design, programming is the art of adding bugs to an empty text file.',
                'One main\'scrappy software is another man\'s full time job.',
                'Walking on water and developing software from a specification are easy if both are frozen.',
                'Debugging is twice as hard as writing the code in the first place.Therfore, if you write the code as cleverly as possible, you are, by definition, not smart enough to debug it.',
                'System programmers are the high priests of a low cult.',
                'Software undergoes beta testing shortly before iy\' released.Beta is latin for "still doesn\'t work"',
                'Measuring programming progree by lines of code is like measuring aircraft building progree by weight.',
                'The computer was born to solve problems that did not exist before.',
                'Real programmers don\'t comment their code. If it was hard to write, it should be hard to understand.'
            ];
            function random(mn, mx) {
                return Math.random() * (mx - mn) + mn;
            }

            function q_Fun() {
                down.innerHTML = arr[Math.floor(random(1, 15)) - 1];
            } q_Fun()
        </script>
    </section>

    <section>
        <div class="container text-center py-5">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mx-auto pt-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><img src="images/computing.svg" alt=""
                                    style="width: 70px;"></h5>
                            <p class="card-text">Participate in discussions and help others on the forum.<br><br><a
                                    href="postlist.php"><button type="button" class="btn btn-outline-primary">Get
                                        Started</button></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mx-auto pt-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><img src="images/communicate.svg" alt=""
                                    style="width: 70px;"></h5>
                            <p class="card-text">Connect with like-minded people get the support you need.<br><br><a
                                    href="postlist.php"><button type="button" class="btn btn-outline-primary">Get
                                        Started</button></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mx-auto pt-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><img src="images/lesson.svg" alt=""
                                    style="width: 70px;"></h5>
                            <p class="card-text">Share your knowledge and learn from others by connecting.<br><br><a
                                    href="categories.php"><button type="button" class="btn btn-outline-primary">Categories</button></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mb-5">
            <ul class="nav nav-pills justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Sign In</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                        type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Sign Up</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active text-center" id="home-tab-pane" role="tabpanel"
                    aria-labelledby="home-tab" tabindex="0">
                    <div class="container text-center py-1">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mx-auto pt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><img src="images/sign_in.svg"
                                                alt="" style="width: 70px;"></h5>
                                        <p class="card-text">Start Reading/Writing<br><br><a href="signin.php"><button
                                                    type="button" class="btn btn-outline-primary">Sign In</button></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade text-center" id="profile-tab-pane" role="tabpanel"
                    aria-labelledby="profile-tab" tabindex="0">
                    <div class="container text-center py-1">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mx-auto pt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><img src="images/sign_up.svg"
                                                alt="" style="width: 70px;"></h5>
                                        <p class="card-text">Get Connected with likely-minded people<br><br><a
                                                href="signin.php"><button type="button"
                                                    class="btn btn-outline-primary">Sign Up</button></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

   <footer class="section-sm pb-0 border-top border-default bg-light">
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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>
