<?php
session_start();

if (!$_SESSION['id']) {
    header('location:signin.php');
}
$pdo = require 'connection/connect.php';

if (isset($_POST['submit'])) {
    if (isset($_POST['password'],$_POST['new_password']) && !empty($_POST['password']) && !empty($_POST['new_password'])) {
        $dbemail = $_SESSION['email'];
        $dbpassword = trim($_POST['password']);
        $dbnew_password = trim($_POST['new_password']);
        $dbdate = date('Y-m-d H:i:s');

        if (filter_var($dbemail, FILTER_VALIDATE_EMAIL)) {
            $sql = "select * from User where email = :email ";
            $handle = $pdo->prepare($sql);
            $params = ['email' => $dbemail];
            $handle->execute($params);
            if ($handle->rowCount() > 0) {
                $getRow = $handle->fetch(PDO::FETCH_ASSOC);
                // print_r($getRow);
                if (password_verify($dbpassword, $getRow['password'])) {
                    // unset($getRow['password']);
                    $_SESSION = $getRow;
                    // header('location:postlist.php');
                    // echo $dbemail;
                    $options = array("cost" => 4);
                    $dbhashnewPassword = password_hash($dbnew_password, PASSWORD_BCRYPT, $options);
                    $sqlupdate = "UPDATE `User` SET `password`=:newpass,`updated`= :udate WHERE email = :email;";
                    $handle2 = $pdo->prepare($sqlupdate);
                    $updateparams = [
                        'newpass' => $dbhashnewPassword,
                        'udate' => $dbdate,
                        'email' => $dbemail
                    ];
                    $handle2->execute($updateparams);
                    unset($getRow['password']);
                    header('location:logout.php');
                    header('location:postlist.php');
                    exit();
                } else {
                    $placeholderpassword = "Passwrd Not Matched!";
                    $placeholdernpassword = "Passwrd Not Matched!";
                }
            } else {
                $placeholderpassword = "Wrong Credientials";
                $placeholdernpassword = "Wrong Credientials";
            }
        } else {
            $placeholdernpassword = "Login To Your Account";
            // $placeholderpassword = "Email address is not valid";	
        }
    } else {
        $placeholdernpassword = "Password is required";
        $placeholderpassword = "Password is required";
    }
} else {
    $placeholdernpassword = "New Password";
    $placeholderpassword = "Old Password";
}
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
                                        <a class="dropdown-item" href="update.php">Update Password</a>
										<a class="dropdown-item" href="logout.php">Logout</a>
									</div>';
                                } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- /navigation -->
    <section class="mt-3 container form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="imgcontainer">
                <img src="images/defence.svg" alt="Avatar" class="avatar">
            </div>
            <div class="container">
                <h4 class="text-center"><b>Update Password</b></h4>

                <label for="password"><b>Old Password</b></label>
                <input type="password" placeholder="<?php echo ($placeholderpassword ?? 'Old Password') ?>" name="password">

                <label for="new_password"><b>New Strong Password</b></label>
                <input type="password" placeholder="<?php echo ($placeholdernpassword ?? 'New Password') ?>" name="new_password">

                <button class="button1" name="submit" type="submit">Login</button>
                <span class="psw">Home : <a href="postlist.php">Home</a></span>
            </div>
        </form>
        </div>
    </section>

    <footer class="section-sm pb-0 border-top border-default">
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