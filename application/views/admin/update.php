<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/css/admin/update.css')?>">
    <title>Book List Page</title>
</head>
<body>
    <div class="container">
        <div class="nav-bar">
            <h1>LIBRARY MANAGEMENT SYSTEM</h1>
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
                    <li><a href="<?=base_url('home')?>">Home</a></li>
                    <li><a href="<?=base_url('admins/messenger')?>">Send a message</a></li>
                    <li><a href="<?=base_url('admins/student_list')?>">Student List</a></li>
                    <li><a href="<?=base_url('book_list')?>">Book List</a></li>
                    <li><a href="<?=base_url('admins/add_book')?>">Add Books</a></li>
                    <li><a href="<?=base_url('admins/issue_request')?>">Issue Requests</a></li>
                    <li><a href="<?=base_url('admins/renew_request')?>">Renew Requests</a></li>
                    <li><a href="<?=base_url('admins/return_request')?>">Return Requests</a></li>
                    <li><a href="<?=base_url('admins/currently_issued_books')?>">Curently Issued Books</a></li>
                </ul>
            </div>
        </div>
        <div class="update_book">
            <h3>Update Details</h3>
            <div id="errors">
<?php
        if($this->session->flashdata('errors'))
        {
            foreach($this->session->flashdata('errors') as $value)
            { ?>
                <p><?= $value ?></p>
<?php       }
        } ?>
            </div>
            <form action="<?= base_url('admins/process_update');?>/<?= $book['id'] ?>" method="post">
            <input type="hidden" name="id" value="<?= $book['id'] ?>">
            <div class="update">
                    <p>Accesion</p>
                    <input type="text" name="accesion" value="<?= $book['accesion'] ?>">
                </div>
                <div class="update">
                    <p>Title</p>
                    <input type="text" name="title" value="<?= $book['title'] ?>">
                </div>
                <div class="update">
                    <p>Publisher</p>
                    <input type="text" name="publisher" value="<?= $book['publisher'] ?>">
                </div>
                <div class="update">
                    <p>Year</p>
                    <input type="text" name="year" value="<?= $book['year'] ?>">
                </div>
                <div class="update">
                    <p>Availability</p>
                    <input type="text" name="availability" value="<?= $book['availability'] ?>">
                </div>
                <input type="submit" value="Update">
            </form>
        </div>      
    </div>
</body>
</html>