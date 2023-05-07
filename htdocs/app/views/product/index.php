<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$data['title']?></title>
	<!-- Тег индексации страницы -->
	<meta name="description" content="<?=$data['title']?>">
	<!-- Подулючение стилий -->
	<link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
	<link rel="stylesheet" href="/public/css/product.css" charset="utf-8">
	<script src="https://kit.fontawesome.com/ce25d284a3.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head> 
<body>
	<!-- хедер -->
	<?php require 'public/blocks/header.php'?>	

	<!-- основная часть -->
	<div class="container main">
		<a href="/categories/<?=$data['category']?>">Назад</a>
		<!-- список популярных товаров -->
		<h1><?=$data['title']?></h1>
			<div class="info">
				<div>
					<img src="/public/img/<?=$data['img']?>" alt="<?=$data['title']?>">
				</div>
				<div>
					<p><?=$data['anons']?></p><br>
					<p><?=$data['text']?></p>
				</div>
				<div>
					<form action="/basket" method="POST">
						<input type="hidden" name="input_id" value="<?=$data['id']?>">
						<button class="btn">Купить за <?=$data['price']?> рублей</button>
					</form>
				</div>
			</div>
	</div>

	<!-- подвал -->
	<?php require 'public/blocks/footer.php'?>
</body>
</html>