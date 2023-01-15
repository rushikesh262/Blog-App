<?php
session_start();

if (!$_SESSION['id']) {
    header('location:signin.php');
}
// ini_set('display_errors', 1);
//        ini_set('display_startup_errors', 1);
//        error_reporting(E_ALL);

$pdo = require 'connection/connect.php';
// echo 'helo';
if (isset($_POST['submit'])) {
    // echo 'helo';
    if (isset($_POST['title'], $_POST['categories'], $_POST['post']) && !empty($_POST['title']) && !empty($_POST['categories']) && !empty($_POST['post'])) {
        $dbtitle = trim($_POST['title']);
        $dbcategories = trim($_POST['categories']);
        $dbpost = trim($_POST['post']);
        $dbauthor = $_SESSION['email'];
        $dbdate = date('Y-m-d H:i:s');
        $dbpostcard = substr($dbpost, 0, 193);
        $dbpostuid = uniqid('post-');
        //   echo 'helo';
        // echo "inside bloc";
        // $sql = "INSERT INTO `admin`(`title`, `email`, `password`) VALUES (:title,:email,:password);";
        $sql = "INSERT INTO `blog_post`(`title`, `author`, `date`, `categories`, `post_content`, `post_content_card`, `postuid`) VALUES (:title,:author,:date,:categories,:post,:postcard,:puid);";
        try {
            // echo "inside bloccccccccc";echo 'helo';
            $handle = $pdo->prepare($sql);
            $params = [
                ':title' => $dbtitle,
                ':author' => $dbauthor,
                ':date' => $dbdate,
                ':categories' => $dbcategories,
                ':post' => $dbpost,
                ':postcard' => $dbpostcard,
                ':puid' => $dbpostuid
            ];

            $handle->execute($params);
            header('location:postlist.php');
            //   echo 'helo';

            //   if ($handle) {
            //    echo 'helo';
            //    // header('location:signin.php');
            //       $forwho ="All";
            //       $notitype = "New Post";
            //       $date = date('Y-m-d H:i:s');
            //       $notification ="User created.$dbtitle.at.$date. .";
            //       $sqlnotify = "INSERT INTO `notifications`(`forwho`, `fromwhome`, `time`, `notifiaction`, `notitype`) VALUES (?,?,?,?,?)";
            //       $stmt = $pdo->prepare($sqlnotify);
            //       $stmt->execute([$forwho, $dbauthor, $date,$notification,$notitype]);
            //   }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        if (!isset($_POST['title']) || empty($_POST['title'])) {
            $placeholdertitle = 'Title is required';
            // $title = '';
        } else {
            // $placeholdertitle = $_POST['title'];
            $title = $_POST['title'];
        }
        if (!isset($_POST['categories']) || empty($_POST['categories'])) {
            $placeholdercategories = 'category required';
        } else {
            $categories = $_POST['categories'];
        }

        if (!isset($_POST['post']) || empty($_POST['post'])) {
            $placrholderpost = 'post is required';
        } else {
            $valuepassword = $_POST['post'];
        }
    }
} else {
    $placeholdertitle = "Title";
    $placeholdercategories = "Category";
    $placrholderpost = "Pst";
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
    <meta name="author" content="Themefisher">

    <!-- plugins -->
    <link rel="preload" href="https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2" style="font-display: optional;">
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:600%7cOpen&#43;Sans&amp;display=swap" media="screen">

    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="plugins/slick/slick.css">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

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
                <a class="navbar-brand" href="index.php">
                    <img class="img-fluid" width="150px" src="images/logo1.png" alt="LogBook">
                </a>
                <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
                    <i class="ti-menu"></i>
                </button>

                <div class="collapse navbar-collapse text-center" id="navigation">
                    <ul class="navbar-nav ml-auto">
                        <!-- <li class="nav-item">
                     <a class="nav-link" href="about.html">Home</a>
                  </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="postlist.php">Home</a>
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
    <section class="mt-3 container form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="imgcontainer">
                <img src="images/motivation.svg" alt="Avatar" class="avatar">
            </div>
            <div class="container">
                <h4 class="text-center"><b>Write_A_Post <?php echo $_SESSION['name']; ?></b></h4>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <label for="title"><b>Title</b></label>
                            <input type="text" placeholder="<?php echo $placeholdertitle ?? 'Enter name' ?>" name="title">
                            <!--  value="<?php
                                            // echo $valuename
                                            ?>" -->

                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <!-- <label for="categories" class="form-label left">Categories</label>
                <input type="text" class="form-control" name="categories" placeholder="<?php echo ($placeholdecategories ?? '') ?>">
            </div> -->
                                <label for="categories">Categories</label>
                                <select name="categories">
                                    <option value="JAVA">JAVA</option>
                                    <option value="HTML">HTML</option>
                                    <option value="CSS">CSS</option>
                                    <option value="PHP">PHP</option>
                                    <option value="MYSQL">MYSQL</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-md-12 col-sm-12">
                  <label for="post"><b>Write post</b></label>
                  <textarea class="form-control" name="post" rows="10" placeholder="<?php echo $placrholderpost ?? 'Enter password' ?>"></textarea>
               </div> -->
                        <script>
                            tinymce.init({
                                selector: '#mytextarea'
                            });
                        </script>
                        <div class="col-md-12 col-sm-12">
                            <label for="post"><b>Write post</b></label>
                            <textarea id="mytextarea" class="form-control" name="post">This is <?php echo $_SESSION['name'];?>,</textarea>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-sm-4">
                            <button class="button1" type="submit" name="submit">Submit</button>
                        </div>
                    </div>
                </div>
        </form>
        </div>
    </section>

    <footer class="section-sm pb-0">
        <div class="container">
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

<style>
    body {
        background-color: whitesmoke;
    }

    .form {
        max-width: 80%;
        border: 2px outset white;
    }

    input[type=text],
    input[type=password],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .button1 {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    .button1:hover {
        opacity: 0.8;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 10%;
        border-radius: 50%;
    }

    /*       
.container {
  padding: 16px;
} */

    span.psw {
        float: right;
        padding-top: 16px;
        font-size: large;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
    }
</style>

</html>