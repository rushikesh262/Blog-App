<?php
session_start();

if (!$_SESSION['id']) {
   header('location:signin.php');
}

$blog = $_GET['blog'];
// echo $blog;
// echo 'hello';

// connect to the database to get the PDO instance
$pdo = require 'connection/connect.php';

$sql = 'SELECT `title`, `author`, `date`, `categories`, `post_content`, `post_content_card`, `postuid` FROM `blog_post` WHERE postuid = "'.$_GET['blog'].'";';
// SELECT `title`, `author`, `date`, `categories`, `post_content`, `post_content_card`, `postuid` FROM ( SELECT 'id' FROM blog_post ORDER BY id DESC LIMIT 10 )'id' ORDER BY id ASC;

// execute a query
$statement = $pdo->query($sql);

// fetch all rows
$postcontent = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en-us">

<head>
   <meta charset="utf-8">
   <title>Programmer's_Hideoute</title>

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
	<div class="container">
    <?php
    foreach( $postcontent as $post ) {
        echo '<article class="row mb-4">
        <div class="col-lg-10 mx-auto mb-4">
            <h1 class="h2 mb-3">'.$post['title'].'</h1>
            <ul class="list-inline post-meta mb-3">
                <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="profile.php?profile='.$post['author'].'">'.$post['author'].'</a>
                </li>
                <li class="list-inline-item">Date : '.$post['date'].'</li>
                <li class="list-inline-item">Category : <a href="categorieslist.php?categories='.$post['categories'].'" class="ml-1">'.$post['categories'].'</a>
                </li>
                <!-- <li class="list-inline-item">Tags : <a href="#!" class="ml-1">Photo </a> ,<a href="#!" class="ml-1">Image </a>
                </li> -->
            </ul>
        </div>
        <div class="col-12 mb-3">
            <div class="container">
                <!--<img src="images/post/post-1.jpg" class="img-fluid" alt="post-thumb">-->
                <img src="images/post/post-7.jpg" class="img-fluid" alt="post-thumb">
            </div>
        </div>
        <div class="col-lg-10 mx-auto">
            <div class="content">
                '.$post['post_content'].'
            </div>
        </div>
    </article>';
    }
    ?>
	</div>
</section>

<section>
   <div class="container">
   <div class="comments"></div>
   <style>
      .comments .comment_header {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #eee;
    padding: 15px 0;
    margin-bottom: 10px;
    align-items: center;
}
.comments .comment_header .total {
    color: #777777;
    font-size: 14px;
}
.comments .comment_header .write_comment_btn {
    margin: 0;
}
.comments .write_comment_btn, .comments .write_comment button {
    display: inline-block;
    background-color: #565656;
    color: #fff;
    text-decoration: none;
    margin: 10px 0 0 0;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: 600;
    border: 0;
}
.comments .write_comment_btn:hover, .comments .write_comment button:hover {
    background-color: #636363;
}
.comments .write_comment {
    display: none;
    padding: 20px 0 10px 0;
}
.comments .write_comment textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    height: 150px;
    margin-top: 10px;
}
.comments .write_comment input {
    display: block;
    width: 250px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-top: 10px;
}
.comments .write_comment button {
    cursor: pointer;
}
.comments .comment {
    padding-top: 10px;
}
.comments .comment .name {
    display: inline;
    padding: 0 5px 3px 0;
    margin: 0;
    font-size: 16px;
    color: #555555;
}
.comments .comment .date {
    color: #888888;
    font-size: 14px;
}
.comments .comment .content {
    padding: 5px 0 5px 0;
}
.comments .comment .reply_comment_btn {
    display: inline-block;
    text-decoration: none;
    margin-bottom: 10px;
    font-size: 14px;
    color: #888888;
}
.comments .comment .replies {
    padding-left: 30px;
}
.comment-widgets .comment-row:hover {
    background: rgba(0, 0, 0, 0.02);
    cursor: pointer;
}

.comment-widgets .comment-row {
    border-bottom: 1px solid rgba(120, 130, 140, 0.13);
    padding: 15px;
}
.comment-text:hover{
    visibility: hidden;
}
.comment-text:hover{
    visibility: visible;
}

.label {
    padding: 3px 10px;
    line-height: 13px;
    color: #ffffff;
    font-weight: 400;
    border-radius: 4px;
    font-size: 75%;
}

.round img {
    border-radius: 100%;
}

.label-info {
    background-color: #1976d2;
}

.label-success {
    background-color: green;
}

.label-danger {
    background-color: #ef5350;
}

   </style>

<script>
const comments_page_id = "<?php echo $_GET['blog'];?>"; // This number should be unique on every page
fetch("php/comments.php?page_id=" + comments_page_id).then(response => response.text()).then(data => {
	document.querySelector(".comments").innerHTML = data;
	document.querySelectorAll(".comments .write_comment_btn, .comments .reply_comment_btn").forEach(element => {
		element.onclick = event => {
			event.preventDefault();
			document.querySelectorAll(".comments .write_comment").forEach(element => element.style.display = 'none');
			document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "']").style.display = 'block';
			document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "'] input[name='name']").focus();
		};
	});
	document.querySelectorAll(".comments .write_comment form").forEach(element => {
		element.onsubmit = event => {
			event.preventDefault();
			fetch("php/comments.php?page_id=" + comments_page_id, {
				method: 'POST',
				body: new FormData(element)
			}).then(response => response.text()).then(data => {
				element.parentElement.innerHTML = data;
			});
		};
	});
});
</script>
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
            <?php
            $pdo = require_once 'connection/connect.php';

            if (isset($_POST['submit'])) {
               if (isset($_POST['frndemail']) && !empty($_POST['frndemail'])) {
                  $dbemail = trim($_POST['frndemail']);
                  $data = [
                     ':email'=> $dbemail,
                 ];
                  $sql = "INSERT INTO `invitefrnd`(`frndemail`) VALUES (:email);";
$pdo->prepare($sql)->execute($data);
            }}
            ?>
            <div class="col-md-6 mb-4">
               <h6 class="mb-4">Invite to Friend</h6>
               <form class="subscription" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
