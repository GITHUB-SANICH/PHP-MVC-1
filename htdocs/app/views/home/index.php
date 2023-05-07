<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Главная страница</title>
	<!-- Тег индексации страницы -->
	<meta name="description" content="Главная страница интернета магазина">
	<!-- Подулючение стилий -->
	<link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
	<script src="https://kit.fontawesome.com/ce25d284a3.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head> 
<body>
	<!-- хедер -->
	<?php require 'public/blocks/header.php'?>	

	<!-- основная часть -->
	<div class="container main">
		<!-- список популярных товаров -->
		<h1>Популярные товары</h1>
			<div class="products">
				<?php for ($i=0; $i < count($data); $i++): ?>  
					<div class="product">
						<div class="image">
							<img src="/public/img/<?=$data[$i]['img']?>" alt="<?=$data[$i]['title']?>">
						</div>
						<h3><?=$data[$i]['title']?></h3>
						<p><?=$data[$i]['anons']?></p>
						<a href="/product/<?=$data[$i]['id']?>"><button type="submit" class="btn">Детальнее</button></a>
						</div>
				<?php endfor; ?>
			</div>
	</div>

	<!-- подвал -->
	<?php require 'public/blocks/footer.php'?>
</body>
</html>