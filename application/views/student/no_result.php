<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/css/student/bookss.css')?>">
    <title>Book List Page</title>
</head>
<body>
    <div class="container">
        <div class="nav-bar">
            <h1>PHINMA - SJCLS</h1>
            <div class="name">
                <h2> <?= $this->session->userdata('name');?></h2>
            </div>
        </div>
        <div class="side-bar">
            <div class="logo">
                <img src="<?=base_url('assets/img/logo.png')?>" alt="saint-jude-logo">
            </div>
            <div class="dashboard">
                <ul>
                    <li><a href="<?=base_url('students')?>">Home</a></li>
                    <li><a href="<?=base_url('students/messages')?>">Messages</a></li>
                    <li class="active"><a href="<?=base_url('students/books')?>">Books</a></li>
                    <li><a href="<?=base_url('students/borrowed_books')?>">Borrowed Books</a></li>
                    <li><a href="<?=base_url('students/process_previously_borrowed_books')?>">Previously Borrowed Books</a></li>
                </ul>
            </div>
        </div>
        <div class="data">
            <div class="search">
                <form action="<?= base_url()?>admins/process_search_book" method="post">
                    <input type="text" placeholder="Search Book's title" name="search">
                </form>
            </div>
            <div class="view_all">
                <a href="<?= base_url('students/books') ?>">View all books</a>
            </div>
            <div class="errors">
<?php
        if($this->session->flashdata('errors'))
        {
            foreach($this->session->flashdata('errors') as $value)
            { ?>
                <h1><?= $value ?></h1>
<?php       }
        } ?>
            </div>  
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script type="text/javascript">
		$(document).on('click', 'ul li', function(){
			$(this).addClass('active').siblings().removeClass('active');
		});
	</script>
</body>
</html>