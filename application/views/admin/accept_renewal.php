<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/css/admin/accept_renewals.css')?>">
    <title>Renew Request Page</title>
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
        <div id="renew_request">
                <img src="<?=base_url('assets/img/sent.png')?>" alt="request-sent-image">    
                <p><?= $this->session->flashdata('renew')?></p>
                <a href="<?= base_url('admins/renew_request')?>">Okay</a>
        </div>
        <div class="data">
            <h2>Renew Requests</h2>
            <table>
                <thead>
                    <tr>
                       <th>Student ID</th>
                       <th>Accesion</th>
                       <th>Book Name</th>
                       <th>Renewals Left</th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
                    foreach($renews as $renew) {
?>
                    <tr>
                        <td><?= $renew['school_id'] ?></td>
                        <td><?= $renew['accesion'] ?></td>
                        <td><?= $renew['title'] ?></td>
                        <td><?= $renew['renewals_left'] ?></td>
                        <td>
<?php 
                            if($renew['user_level'] == 'faculty' && $renew['renewals_left'] > 0){
?>
                                <a id="accept" href="<?= base_url('admins/process_faculty_renewal')?>/<?= $renew['record_id'] ?>/<?= $renew['renew_id'] ?>/<?= $renew['school_id']?>">Accept</a>
<?php                       }
                            else if($renew['user_level'] == 'student' && $renew['renewals_left'] > 0) {
?>
                                <a id="accept" href="<?= base_url('admins/process_student_renewal')?>/<?= $renew['record_id'] ?>/<?= $renew['renew_id'] ?>/<?= $renew['school_id']?>">Accept</a>
<?php                       } ?>                           
                        </td>
                    </tr>
<?php               }   ?>
                </tbody>
            </table>    
		</div>
    </div>
</body>
</html>