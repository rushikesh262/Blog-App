<?php 
session_start();

    //include configuration file
    $pdo = require 'connection/connect.php';
    // echo $_GET['categories'];
    // $_SESSION['cate'] = $_GET['categories'];
    // echo $_SESSION['cate'];
    // if (!isset ($_GET['categories']) ) {  
    //     echo $page = 'test';  
    // } else {  
    //     echo $page = $_GET['categories'];  
    // }  


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
    $q = "SELECT * FROM `blog_post` where categories ='".$_GET['categories']."' LIMIT $start, $per_page";
    $query = $pdo->prepare($q);
    $query->execute();

    if($query->rowCount() > 0){
        $postcontent = $query->fetchAll(PDO::FETCH_ASSOC);
    }
    // count total number of rows in students table
    $count_query = "SELECT `id` FROM `blog_post` where categories = '".$_GET['categories']."'";
    $query = $pdo->prepare($count_query);
    $query->execute();
    $count = $query->rowCount();
    // echo $count;
    // calculate the pagination number by dividing total number of rows with per page.
    $paginations = ceil($count / $per_page);
?>