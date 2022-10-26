<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/css/student/sent_renew_books.css')?>">
    <title>Borrowed Books Page</title>
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
                    <li><a href="<?=base_url('students/books')?>">Books</a></li>
                    <li class="active"><a href="<?=base_url('students/borrowed_books')?>">Borrowed Books</a></li>
                    <li><a href="<?=base_url('students/process_previously_borrowed_books')?>">Previously Borrowed Books</a></li>
                </ul>
            </div>
        </div>
        <div class="data">
            <!-- <div class="search">
                <form action="<?= base_url()?>students/search" method="post">
                    <input type="text" placeholder="Search Book's title" name="search">
                </form>
            </div> -->
            <h2>Borrowed Books</h2>
            <p><?= $this->session->flashdata('sent')?></p>
        <div class="borrowed_books">
            <table>
                <thead>
                    <tr>
                        <th>Accesion</th>
                        <th>Title</th>
                        <th>Issued Date</th>
                        <th>Due Date</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
<?php                
                        foreach($borrows as $borrow){
?>
                        <tr>
                            <td><?= $borrow['accesion'] ?></td>
                            <td><?= $borrow['title'] ?></td>
                            <td><?= $borrow['date_of_issue'] ?></td>
                            <td><?= $borrow['due_date'] ?></td>
                            <td>
<?php

                            if($borrow['renewals_left'] > 0 ) {
 ?>
                                <!-- echo "<a id=\"accept\" href=\"students/process_renew_book/".$borrow['book_id']."\">Renew</a>"
                                 -->
                                 <a id="renew" href="<?= base_url('students/process_renew_book')?>/<?= $borrow['book_id'] ?>">Renew</a> 
<?php                       
                            }   ?>
                            </td>
                            <td>
                                <a id="return" href="<?= base_url('students/process_return_book')?>/<?= $borrow['book_id'] ?>">Return</a>
                            </td>
                        </tr>
<?php               }   ?>     
                 
                </tbody>
            </table>    
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