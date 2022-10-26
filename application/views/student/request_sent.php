<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('assets/css/student/request_sent.css')?>">
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
        <div id="sent">
            <img src="<?=base_url('assets/img/sent.png')?>" alt="request-sent-image">    
            <p><?= $this->session->flashdata('sent')?></p>
            <a href="<?= base_url('students/books')?>">Okay</a>
        </div>
        <div class="data">
            <div class="search">
                <form action="<?= base_url()?>students/search" method="post">
                    <input type="text" placeholder="Search Book's title" name="search">
                </form>
            </div>
            <h2>Books</h2>
            <table>
                <thead>
                    <tr>
                        <th>Accesion</th>
                        <th>Title</th>
                        <th>Publisher</th>
                        <th>Year</th>
                        <th>Availability</th>
                        <th>Action</th>
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
                        <td>
                        <?php                       
                                if($row['availability'] > 0)
                                    echo "<p class='green'>Available</p>";
                                else
                                    echo "<p class='red'>Borrowed</p>";
?>
                            </td>
                            <td>
<?php                       if($row['availability'] > 0) 
                                    echo "<a class=\"borrow\" href=\"process_borrow_book/".$row['id']."\">Issue</a>";
                                else
                                    echo "<p></p>";                                
?>                          </td>
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