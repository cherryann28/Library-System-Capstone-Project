<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/css/admin/book_listss.css')?>">
    <title>Students List Page</title>
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
                    <li class="active"><a href="<?=base_url('admins/student_list')?>">Student List</a></li>
                    <li><a href="<?=base_url('book_list')?>">Book List</a></li>
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
                <form action="<?= base_url()?>admins/process_search_student" method="post">
                    <input type="text" placeholder="Search Student ID/Name" name="search">
                </form>
            </div>
            <h2>Students List</h2>
            <table>
                <thead>
                    <tr>
                       <th>Name</th>
                       <th>Student ID</th>
                       <th>Email Address</th>
                       <th>Category</th>
                       <th>Mobile No.</th>
                    </tr>
                </thead>
                <tbody>
<?php               
                    foreach($students as $student){
?>
                        <tr>
                            <td><?= ucfirst($student['name'])?></td>
                            <td><?= ucfirst($student['school_id'])?></td>
                            <td><?= $student['email']?></td>
                            <td><?= $student['user_level']?></td>
                            <td><?= $student['contact_number']?></td>
                        </tr>
<?php } ?>
                </tbody>
            </table>    
		</div>
        <footer></footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script type="text/javascript">
		$(document).on('click', 'ul li', function(){
			$(this).addClass('active').siblings().removeClass('active');
		});
	</script>
</body>
</html>