<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/css/admin/issue_request.css')?>">
    <title>Currently Issued Books Page</title>
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
                    <li class="active"><a href="<?=base_url('admins/currently_issued_books')?>">Curently Issued Books</a></li>
                </ul>
            </div>
        </div>
        <div class="data">
            <div id="success">
<?php
        if($this->session->flashdata('success'))
        {
            foreach($this->session->flashdata('success') as $value)
            {  ?>
                <p><?= $value ?></p>
<?php       }
        } ?>
            </div>
            <h2>Currently Issued Books</h2>
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Accesion</th>
                        <th>Book Name</th>
                        <th>Issue Date</th>
                        <th>Due Date</th>
                        <th>Dues</th>
                    </tr>
                </thead>
                <tbody>
<?php
                foreach($currently_issued_books as $row){
?>
                    <tr>
                        <td><?= $row['school_id'] ?></td>
                        <td><?= $row['accesion'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['date_of_issue'] ?></td>
                        <td><?= $row['due_date'] ?></td>
                        <td>
<?php                       if( $row['dues'] > 0)
                                echo "<font color='red'>".$row['dues']."</font>";
                            else
                                echo "<font color='green'>0</font>";
?>           
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