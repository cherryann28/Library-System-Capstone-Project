<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/css/admin/book_listss.css')?>">
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
                    <li><a href="<?=base_url('home')?>">Home</a></li>
                    <li><a href="<?=base_url('admins/messenger')?>">Send a message</a></li>
                    <li><a href="<?=base_url('admins/student_list')?>">Student List</a></li>
                    <li class="active"><a href="<?=base_url('book_list')?>">Book List</a></li>
                    <li><a href="<?=base_url('admins/add_book')?>">Add Books</a></li>
                    <li><a href="<?=base_url('admins/issue_request')?>">Issue Requests</a></li>
                    <li><a href="<?=base_url('admins/renew_request')?>">Renew Requests</a></li>
                    <li><a href="<?=base_url('admins/return_request')?>">Return Requests</a></li>
                    <li><a href="<?=base_url('admins/currently_issued_books')?>">Curently Issued Books</a></li>
                </ul>
            </div>
        </div>
        <div class="data">
            <div class="search">
                <form action="<?= base_url()?>admins/process_search_book" method="post">
                    <input type="text" placeholder="Search Book's title" name="search">
                </form>
            </div>
            <div id="success">
<?php
        if($this->session->flashdata('success'))
        {
            foreach($this->session->flashdata('success') as $value)
            {  ?>
                <h3><?= $value ?></h3>
<?php       }
        } ?>
            </div>
            <h2>Book Lists</h2>
            <table>
                <thead>
                    <tr>
                        <th>Accesion</th>
                        <th>Title</th>
                        <th>Publisher</th>
                        <th>Year</th>
                        <th>Availability</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
<?php
                foreach($books as $row){
?>
                    <tr>
                        <td><?= $row['accesion'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['publisher'] ?></td>
                        <td><?= $row['year'] ?></td>
                        <td><center><?= $row['availability'] ?></center></td>
                        <td><a id="edit" href="<?= base_url('admins/edit');?>/<?= $row['id']?>">Edit</a></td>
                    </tr>
<?php           }   ?>
                </tbody>
            </table>    
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