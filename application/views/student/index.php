<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=base_url('assets/css/student/indexx.css')?>">
    <link type="text/css" href="<?=base_url('assets/icons/css/font-awesome.css')?>" rel="stylesheet">
	<script src="https://kit.fontawesome.com/fb998ac4aa.js" crossorigin="anonymous"></script>
	<title>Home Page</title>
</head>
<body>
	<div class="container">
        <nav>
            <div class="logo">
                <img src="<?=base_url('assets/img/logo.png')?>" alt="saint-jude-logo">
                <h3>PHINMA SJCLS</h3>
            </div>
            <div class="logout">
                <a href="<?=base_url('users/logout')?>"><i id="signout" class="menu-icon icon-signout"></i> LOGOUT</a>
            </div>
        </nav>
        <h4>Hey there, welcome back  <?= $this->session->userdata('name');?>!</h4>  
        <div class="icon">
            <div class="messages">
                <!-- <div class="total">
                    <p><?= $total_messages['number'] ?></p>
                </div> -->
                <a href="<?=base_url('students/messages')?>"><i class="menu-icon icon-inbox"></i></a>
                <h5>Messages</h5>
            </div>
            <div class="books">
                <!-- <div class="no-total">
                    <p></p>
                </div> -->
                <a href="<?=base_url('students/books')?>"><i class="menu-icon icon-book"></i></a>
               <h5>Books</h5>
            </div>
            <div class="borrowed">
                <!-- <div class="no-total">     
                </div> -->
                <a href="<?=base_url('students/borrowed_books')?>"><i class="menu-icon icon-tasks"></i></a>
               <h5>Borrowed Books</h5>
            </div>
            <div class="previously">
                <!-- <div class="no-total">
                  
                </div> -->
                <a href="<?=base_url('students/process_previously_borrowed_books')?>"><i id="icon-list" class="menu-icon icon-list"></i></a>
                <h5>Previously Borrowed Books</h5>
            </div>
        </div>
        <footer>
            <p> &#169; 2022 copyright all right reserved</p>
        </footer>
	</div>
</body>
</html>