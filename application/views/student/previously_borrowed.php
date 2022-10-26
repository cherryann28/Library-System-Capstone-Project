<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/css/student/previously_borrowed.css')?>">
    <title>Previously Borrowed Book Page</title>
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
                    <li><a href="<?=base_url('students//messages')?>">Messages</a></li>
                    <li><a href="<?=base_url('students/books')?>">Books</a></li>
                    <li><a href="<?=base_url('students/borrowed_books')?>">Borrowed Books</a></li>
                    <li class="active"><a href="<?=base_url('students/process_previously_borrowed_books')?>">Previously Borrowed Books</a></li>
                </ul>
            </div>
        </div>
        <div class="data">
            <h2>Previously Issued Books</h2>
            <table>
                <thead>
                    <tr>
                        <th>Accesion</th>
                        <th>Title</th>
                        <th>Issued Date</th>
                        <th>Return Date</th>
                    </tr>
                </thead>
                <tbody>
<?php                
                        foreach($previously_borrowed as $borrowed){
?>
                        <tr>
                            <td><?= $borrowed['accesion'] ?></td>
                            <td><?= $borrowed['title'] ?></td>
                            <td><?= $borrowed['date_of_issue'] ?></td>
                            <td><?= $borrowed['date_of_return'] ?></td>
                        </tr>
    <?php               }   ?>     
                 
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