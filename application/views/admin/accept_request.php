<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/css/admin/accept_requests.css')?>">
    <title>Accept Request Page</title>
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
        <div id="accept_request">
            <img src="<?=base_url('assets/img/sent.png')?>" alt="request-sent-image">    
            <p><?= $this->session->flashdata('accept')?></p>
            <a href="<?= base_url('admins/issue_request')?>">Okay</a>
        </div>
        <div class="data">
                <h2>Issue Requests</h2>
                <table>
                    <thead>
                        <tr>
                        <th>Student ID</th>
                        <th>Accesion</th>
                        <th>Book</th>
                        <th>Availability</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
                        foreach($records as $record) {
?>
                        <tr>
                            <td><?= $record['school_id'] ?></td>
                            <td><?= $record['accesion'] ?></td>
                            <td><?= $record['title'] ?></td>
                            <td><?= $record['availability'] ?></td>
                            <td>
<?php 
                                if($record['user_level'] == 'faculty'){
?>
                                    <a id="accept" href="<?= base_url('admins/process_accept_faculty')?>/<?= $record['id']?>/<?= $record['book_id']?>/<?= $record['school_id']?>">Accept</a>  
<?php                           }
                                else if ($record['user_level'] == 'student') {
?>
                                    <a id="accept" href="<?= base_url('admins/process_accept_student')?>/<?= $record['id']?>/<?= $record['book_id']?>/<?= $record['school_id']?>">Accept</a>  
<?php                           }   ?>
                                    <a id="decline" href="<?= base_url('admins/process_decline')?>/<?= $record['id'] ?>/<?= $record['school_id'] ?>">Decline</a>
                            </td>
                        </tr>
<?php               }       ?>

                    </tbody>
                </table>    
            </div>
    </div>
</body>
</html>