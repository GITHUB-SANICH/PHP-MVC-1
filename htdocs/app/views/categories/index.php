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
	<script src="https://kit.fontawesome.com/ce25d284a3.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head> 
<body>
	<!-- хедер -->
	<?php require 'public/blocks/header.php'?>	

	<!-- основная часть -->
	<div class="container main">
		<!-- список популярных товаров -->
		<h1><?=$data['title']?></h1>
			<div class="products">
				<!-- $i = "номер текущей страницы" * "число товаров помещаемых на страницу" -->
				<?php for ($i=0; $i < count($data['products']); $i++): ?> 
					<div class="product">
						<div class="image">
							<img src="/public/img/<?=$data['products'][$i]['img']?>" alt="<?=$data['products'][$i]['title']?>">
						</div>
						<h3><?=$data['products'][$i]['title']?></h3>
						<p><?=$data['products'][$i]['anons']?></p>
						<a href="/product/<?=$data['products'][$i]['id']?>"><button type="submit" class="btn">Детальнее</button></a>
						</div>
				<?php endfor; ?>
				<!-- пагинатор -->
				<div style="margin-top: 15px;">
					<p>Номер страницы: <b><?=$data['nummerPage']?></b></p>
					<p>Число товаров на странице: <b><?=$data['productsForPage']?></b></p>
					<p>Число всех страниц: <b><?=$data['totalCountPage']?></b></p>

				</div>
				<div class="pagination">
					<!-- вывод всех страниц с товарами-->
					<?php for($p=0; $p < $data['totalCountPage']; $p++): ?>
						<!-- передача ссылки страницы в контроллер-->
						<a href="categories/<?=$p+1?>" class="page_btn"><?=$p+1?></a>
					<?php endfor; ?>
				</div>
			</div>
	</div>

	<!-- подвал -->
	<?php require 'public/blocks/footer.php'?>
</body>
</html>