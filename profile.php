<?php
session_start();

if (!$_SESSION['id']) {
    header('location:signin.php');
}

// echo $_GET['profile'];
// echo 'hello';

// connect to the database to get the PDO instance
$pdo = require 'connection/connect.php';

$sql = "SELECT `name`, `email`, `profile`, `joined` FROM `User` WHERE email = '".$_GET['profile']."';";
// SELECT `title`, `author`, `date`, `categories`, `post_content`, `post_content_card`, `postuid` FROM ( SELECT 'id' FROM blog_post ORDER BY id DESC LIMIT 10 )'id' ORDER BY id ASC;

// execute a query
$statement = $pdo->query($sql);

// fetch all rows
$profile = $statement->fetchAll(PDO::FETCH_ASSOC);
$start = 0;  
    $per_page = 4;
    $page_counter = 0;
    $next = $page_counter + 1;
    $previous = $page_counter - 1;
    
    if(isset($_GET['start'])){
     $start = $_GET['start'];
     $page_counter =  $_GET['start'];
     $start = $start *  $per_page;
     $next = $page_counter + 1;
     $previous = $page_counter - 1;
    }
    

    // query to get messages from messages table
    $q = "SELECT * FROM `blog_post` where author = '".$_GET['profile']."' LIMIT $start, $per_page";
    $query = $pdo->prepare($q);
    $query->execute();

    if($query->rowCount() > 0){
        $postcontent = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // count total number of rows in students table
    $count_query = "SELECT `id` FROM `blog_post` where author = '".$_GET['profile']."'";
    $query = $pdo->prepare($count_query);
    $query->execute();
    $count = $query->rowCount();
    // echo $count;
    // calculate the pagination number by dividing total number of rows with per page.
    $paginations = ceil($count / $per_page);
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>Programmer's_Hideout</title>

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
										<a class="dropdown-item" href="profile.php?profile='.$_SESSION['email'].'">Profile</a>
                                        <a class="dropdown-item" href="update.php">Update Password</a>
										<a class="dropdown-item" href="logout.php">Logout</a>
									</div>';
                                } ?>
                            </a>
                        </li>
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
        <!-- Profile widget -->
        <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        // include_once 'php/profi.php';
        ?>
        <?php
        foreach ($profile as $profileinfo) {
            echo '<div class="container bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 bg-dark">
                <div class="media align-items-end profile-header">
                    <div class="profile mr-3"><img src="images/'.$profileinfo['profile'].'" alt="..." width="130" class="rounded mb-2 img-thumbnail"><a href="#" class="btn btn-dark btn-sm btn-block disabled">Follow</a></div>
                    <div class="media-body mb-5 text-white">
                        <h4 class="mt-0 mb-0 text-white">' . $profileinfo['name'] . '
                        </h4>
                        <p class="small mb-4 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                            </svg> Date Joined : '. $profileinfo['joined'].'</br>Email : ' . $profileinfo['email']. '</p>
                            </div>
                            </div>
                            </div></div>';
        }
        ?>

        <div class="container bg-light p-4 d-flex justify-content-end text-center">
            <ul class="list-inline mb-0">
                <!-- <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block">241</h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Photos</small>
                    </li>
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block">84K</h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Followers</small>
                    </li> -->
                <li>
                    <h5 class="font-weight-bold mb-0 d-block">Profile</h5>
                </li>
            </ul>
        </div>
        <style>
            .profile-header {
                transform: translateY(5rem);
            }
        </style>
        <div class="container py-4 px-4">
            <!-- <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Recent photos</h5><a href="#" class="btn btn-link text-muted">Show all</a>
                </div>
                <div class="row">
                    <div class="col-lg-6 mb-2 pr-lg-1"><img src="https://bootstrapious.com/i/snippets/sn-profile/img-3.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 mb-2 pl-lg-1"><img src="https://bootstrapious.com/i/snippets/sn-profile/img-4.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 pr-lg-1 mb-2"><img src="https://bootstrapious.com/i/snippets/sn-profile/img-5.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 pl-lg-1"><img src="https://bootstrapious.com/i/snippets/sn-profile/img-6.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
                </div> -->
            <div class="py-4">
                <h5 class="mb-3">Recent posts from <?php echo $_GET['profile'];?></h5>
                <!-- hello -->
                <?php

        if(!empty($postcontent)){
            // echo 'true';
            foreach ($postcontent as $post) {
                echo '<div class="container">
                <div class="row">
                <div class="col-12  mb-5 mb-lg-0">
                <article class="row mb-5">
                <div class="col-md-4 mb-4 mb-md-0">
                <div class="post-slider slider-sm">
                <img loading="lazy" src="images/post/post-6.jpg" class="img-fluid" alt="post-thumb"
                    style="height:200px; object-fit: cover;">
                <img loading="lazy" src="images/post/post-1.jpg" class="img-fluid" alt="post-thumb"
                    style="height:200px; object-fit: cover;">
                <img loading="lazy" src="images/post/post-3.jpg" class="img-fluid" alt="post-thumb"
                    style="height:200px; object-fit: cover;">
                </div>
                </div>
                <div class="col-md-8">
                <h3 class="h5">
                <a class="post-title" href="post-elements.html">
                ' . $post['title'] . '</a></h3>
                <ul class="list-inline post-meta mb-2">
                <li class="list-inline-item">
                <i class="ti-user mr-2"></i>
                <a href="profile.php?profile=' . $post['author'] . '">' . $post['author'] . '</a>
                </li>
                <li class="list-inline-item">' . $post['date'] . '</li>
                <li class="list-inline-item">Categories : <a ';
                $hrefcat = $post['categories'];
                echo "href='categorieslist.php?categories=" . $hrefcat . "'";
                echo 'class="ml-1">' . $post['categories'] . ' </a>
                </li></ul><p>' . strip_tags($post['post_content_card']) . ' …</p>';
                // echo	$postuid = $post['postuid'];
                $href = $post['postuid'];
                echo '<a ';
                echo "href='post.php?blog=" . $href . "'";
                echo 'class="btn btn-outline-primary">
                Continue Reading</a></div>
                </article>';
            }
        }else{
            // echo 'false';
            echo '<div class="col-12">
            <div class="post-slider">
                <img loading="lazy" src="images/pngwing.com.png" class="img-fluid" alt="post-thumb">
            </div>
        </div>';
        }
                // include_once 'php/profileinfo.php';
                    
                    ?>
                    <!-- <article class="row mb-5">
					<div class="col-12">
						<div class="post-slider">
							<img loading="lazy" src="images/post/post-1.jpg" class="img-fluid" alt="post-thumb">
						</div>
					</div>
					<div class="col-lg-10 mx-auto">
						<h3><a class="post-title" href="post-details-1.html">'. $post['title'] .'</a></h3>
						<ul class="list-inline post-meta mb-4">
							<li class="list-inline-item"><i class="ti-user mr-2"></i><a href="profile.php?profile=' . $post['author'] . '">' . $post['author'] . '</a>
							</li>
							<li class="list-inline-item">Date : ' . $post['date'] . '</li>
                            $hrefcat = $post['categories'];
							<li class="list-inline-item">Categories : <a href="categorieslist.php?categories='.$hrefcat .'class="ml-1">' . $post['categories'] . ' </a>
							</li>
						</ul>
						<p>' . $post['post_content_card'] . ' …</p> 
                        <a href='post.php?blog=" . $href . ' class="btn btn-outline-primary">Continue Reading</a>
					</div>
				</article> -->

                </div>
        </div>
            </div>
            <div class="container">
                <ul class="pagination">
                    <?php
                    if ($page_counter == 0) {
                        echo "<li class='page-item'><a class='page-link disabled' href='#'>0</a></li>";
                        for ($j = 1; $j < $paginations; $j++) {
                            echo "<li class='page-item'><a class='page-link' href=?start=$j&profile=" . $_GET['profile'] . ">" . $j . "</a></li>";
                        }
                    } else { //<li class='page-item'><a class='page-link' href=?start=$next>Next<a></li>
                        //<li class='page-item'><a class='page-link' href=?start=$previous>Previous</a></li>
                        echo "<li class='page-item'><a class='page-link' href=?start=$previous&profile=" . $_GET['profile'] . ">-1</a></li>";
                        for ($j = 0; $j < $paginations; $j++) {
                            if ($j == $page_counter) {
                                echo "<li class='page-item'><a class='page-link active bg-primary' href=?start=$j&profile=" . $_GET['profile'] . ">" . $j . "</a></li>";
                            } else {
                                echo "<li class='page-item'><a class='page-link' href=?start=$j&profile=" . $_GET['profile'] . ">" . $j . "</a></li>";
                            }
                        }
                        if ($j != $page_counter + 1)
                            echo "<li class='page-item'><a class='page-link' href=?start=$next&profile=" . $_GET['profile'] . ">Next</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        </div><!-- End profile widget -->
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