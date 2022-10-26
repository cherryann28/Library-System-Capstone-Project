<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=base_url('assets/css/admin/index.css')?>">
    <link type="text/css" href="<?=base_url('assets/icons/css/font-awesome.css')?>" rel="stylesheet">
	<script src="https://kit.fontawesome.com/fb998ac4aa.js" crossorigin="anonymous"></script>
	<title>Home Page</title>
</head>
<body>
	<div class="container">
        <nav>
            <div class="logo">
                <img src="assets/img/logo.png" alt="saint-jude-logo">
                <h3>PHINMA SJCLS</h3>
            </div>
            <div class="logout">
                <a href="<?=base_url('users/logout')?>"><i id="signout" class="menu-icon icon-signout"></i> LOGOUT</a>
            </div>
        </nav>
        <h4>Hey there, welcome back <?= $this->session->userdata('name');?>!</h4>  
        <div class="icon">
            <div class="messages">
                <!-- <div class="total">
                    <p>5</p>
                </div> -->
                <a href="<?=base_url('admins/messenger')?>"><i class="menu-icon icon-inbox"></i></a>
                <h5>Messages</h5>
            </div>
            <div class="student_list">
                <!-- <div class="no-total">
                </div> -->
                <a href="<?=base_url('admins/student_list')?>"><i class="menu-icon icon-user"></i></a>
                <h5>Students list</h5>
            </div>
            <div class="book_lists">
                <!-- <div class="no-total">
                </div> -->
                <a href="<?=base_url('book_list')?>"><i class="menu-icon icon-book"></i></a>
               <h5>Book lists</h5>
            </div>
            <div class="add_books">
                <!-- <div class="no-total">
                </div> -->
                <a href="<?=base_url('admins/add_book')?>"><i class="menu-icon icon-edit"></i></a>
                <h5>Add Books</h5>
            </div>
            <div class="issue_request">
                <!-- <div class="total">
                    <p>5</p>
                </div> -->
                <a href="<?=base_url('admins/issue_request')?>"><i class="menu-icon icon-tasks"></i></a>
               <h5>Issue Requests</h5>
            </div>
            <div class="renew">
                <!-- <div class="total">
                    <p>5</p>
                </div> -->
                <a href="<?=base_url('admins/renew_request')?>"><i id="icon-renew" class="menu-icon icon-tasks"></i></a>
                <h5>Renew Requests</h5>
            </div>
            <div class="return">
                <!-- <div class="total">
                    <p>5</p>
                </div> -->
                <a href="<?=base_url('admins/return_request')?>"><i id="icon-request" class="menu-icon icon-tasks"></i></a>
                <h5>Return Requests</h5>
            </div>
            <div class="current">
                <!-- <div class="total">
                    <p>5</p>
                </div> -->
                <a href="<?=base_url('admins/currently_issued_books')?>"><i id="icon-list" class="menu-icon icon-list"></i></a>
                <h5>Currently Issued Books</h5>
            </div>
        </div>
        <footer>
            <p> &#169; 2022 copyright all right reserved</p>
        </footer>
	</div>
</body>
</html>