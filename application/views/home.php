<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=base_url('assets/css/home.css')?>">
	<link type="text/css" href="assets/icons/font-awesome.css" rel="stylesheet">
	<script src="https://kit.fontawesome.com/fb998ac4aa.js" crossorigin="anonymous"></script>
	<title>Home Page</title>
</head>
<body>
	<div class="container">
		<div id="home">
			<nav class="links">
				<ul>
					<li><a href="<?=base_url('users')?>">Home</a> | <a href="#about">About</a></li>
				</ul>
			</nav>
			<nav class="form">
				<ul>
					<li><a href="<?=base_url('login')?>">Login</a><a href="<?=base_url('create_account')?>">Create Account</a></li>
				</ul>
			</nav>
			<div class="logo">
				<img src="assets/img/logo.png" alt="saint-jude-logo">
				<h1>PHINMA SJCLS</h1>
				<h2>Making Lives Better Through Education</h2>
			</div>
			<div class="library-image">
				<img src="assets/img/books.png" alt="Library-image">
			</div>
			<div class="mini-analytics">
				<div class="books">
					<h3><?= $books_total['availability'] ?></h3>               
					<p><i class="fas fa-book-open"></i> Books</p>
				</div>
				<div class="borrowed">
					<h3><?= $borrowed['id'] ?></h3>
					<p><i class="fa-solid fa-arrow-up"></i> Borrowed</p>
				</div>
				<div class="returned">
					<h3><?= $returned['id'] ?></h3>
					<p><i class="fa-solid fa-arrow-down"></i> Returned</p>
				</div>
			</div>
		</div>
		<div id="about">
			<div class="title">
				<h1>ABOUT US</h1>
				<h2>Saint Jude College Delivers quality programs for the global Filipino toward
					optimized productivity through instruction, research and extension services founded
					on  Christian values and pride in one's race.
				</h2>
			</div>
			<div class="front">
				<img src="assets/img/Saint-Jude.png" alt="background-image">
			</div>
			<div class="back"></div>
		</div>
		<footer>
			<p>&#169; 2022 copyright all right reserved</p>
		</footer>
	</div>
</body>
</html>