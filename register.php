<?php
session_start();
$pdo = require 'connection/connect.php';

if (isset($_POST['submit'])) {
   if (isset($_POST['name'], $_POST['email'], $_POST['password']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
      $dbname = trim($_POST['name']);
      $dbemail = trim($_POST['email']);
      $dbpassword = trim($_POST['password']);
      $dbdate = date('Y-m-d');
      // echo "inside bloc";
      $options = array("cost" => 4);
      $dbhashPassword = password_hash($dbpassword, PASSWORD_BCRYPT, $options);
      if (filter_var($dbemail, FILTER_VALIDATE_EMAIL)) {
         $sql = 'select * from User where email = :email';
         $stmt = $pdo->prepare($sql);
         $p = ['email' => $dbemail];
         $stmt->execute($p);

         if ($stmt->rowCount() == 0) {
            $sql = "INSERT INTO `User`(`name`, `email`, `password`,`joined`) VALUES (:name,:email,:password,:date);";
            //  try {
            // echo "inside bloccccccccc";
            $handle = $pdo->prepare($sql);
            $params = [
               ':name' => $dbname,
               ':email' => $dbemail,
               ':password' => $dbhashPassword,
               ':date' => $dbdate,
            ];

            $handle->execute($params);
            header('location:signin.php');

            //   if($handle) {

            //       $forwho ="Admin";
            //       $date = date('Y-m-d H:i:s');
            //       $notification ="User created.$dbname.at.$date. .";
            //       $sqlnotify = "INSERT INTO `notifications`(`forwho`, `fromwhome`, `time`, `notifiaction`) VALUES (?,?,?,?)";
            //       $stmt = $pdo->prepare($sqlnotify);
            //       $stmt->execute([$forwho, $dbname, $date,$notification]);
            //   }
            //  } catch (PDOException $e) {
            //      $errors[] = $e->getMessage();
            //  }
         } else {
            $valuename = $name;
            $valueemail = '';
            $valuepassword = $dbpassword;

            $placeholderemail = 'Email address already registered';
         }
      }
   } else {
      if (!isset($_POST['name']) || empty($_POST['name'])) {
         $placeholdername = 'First name is required';
         // $valuename = '';
      } else {
         // $placeholdername = $_POST['name'];
         $valuename = $_POST['name'];
      }
      if (!isset($_POST['email']) || empty($_POST['email'])) {
         $placeholderemail = 'Email is required';
      } else {
         $valueemail = $_POST['email'];
      }

      if (!isset($_POST['password']) || empty($_POST['password'])) {
         $placeholderpassword = 'Password is required';
      } else {
         $valuepassword = $_POST['password'];
      }
   }
} else {
   $placeholdername = "Enter Name";
   $placeholderemail = "Enter Email";
   $placeholderpassword = "Enter password";
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

   <!-- Main Stylesheet -->
   <link rel="stylesheet" href="css/style.css">

   <link rel="stylesheet" href="css/style2.css">

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

   <style>
      
   </style>
   <section class="mt-3 container form">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <div class="imgcontainer">
            <img src="images/unknown.svg" alt="Avatar" class="avatar">
         </div>
         <div class="container">
            <h4 class="text-center"><b>Registration of User</b></h4>
            <label for="uname"><b>Name</b></label>
            <input type="text" placeholder="<?php echo $placeholdername ?? 'Enter name' ?>" name="name" value="<?php echo $valuename ?>">

            <label for="Email"><b>Email</b></label>
            <input type="text" placeholder="<?php echo $placeholderemail ?? 'Enter email' ?>" name="email" value="<?php echo $valueemail ?>">

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="<?php echo $placeholderpassword ?? 'Enter password' ?>" name="password">

            <button class="button1" type="submit" name="submit">Sign Up</button>
            <span class="psw">already registered : <a href="signin.php">Sign In?</a></span>
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

</html>
