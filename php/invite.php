<?php
            $pdo = require_once '../connection/connect.php';

            if (isset($_POST['submit'])) {
               if (isset($_POST['frndemail']) && !empty($_POST['frndemail'])) {
                  $dbemail = trim($_POST['frndemail']);
                  $data = [
                     ':email' => $dbemail,
                  ];
                  $sql = "INSERT INTO `invitefrnd`(`frndemail`) VALUES (:email);";
                  $pdo->prepare($sql)->execute($data);
                  header('location:../postlist.php');
               }
            }
            ?>