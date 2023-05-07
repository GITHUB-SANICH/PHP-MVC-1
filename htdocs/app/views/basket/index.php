<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Корзина товаров</title>
	<!-- Тег индексации страницы -->
	<meta name="description" content="Корзина товаров">
	<!-- Подулючение стилий -->
	<link rel="stylesheet" href="/public/css/main.css" charset="utf-8">
	<link rel="stylesheet" href="/public/css/products.css" charset="utf-8">
	<script src="https://kit.fontawesome.com/ce25d284a3.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head> 
<body>
	<!-- хедер -->
	<?php require 'public/blocks/header.php'?>	

	<!-- основная часть -->
	<div class="container main">
		<h1>Корзина товаров</h1>
		<!-- Будет выводиться либо Id товара либо оповещение о пустой корзине -->
		<!-- вывод сессии -->
		<?php if(count($data['products']) == 0): ?>
			<!-- выод сообщения о пустой корзине -->
			<p><?=$data['empty']?></p>
		<?php else: ?>
			<!-- вывод товаров, добавленных в корзину -->
			<div class="products">
				<!-- кнопка по ДЗ для удаления всех товаров из корзины  -->
				<form action="/basket" method="POST">
					<input type="hidden" name="deleteAllFromBasket" value="можно оставить значение пустым">
					<button type="submit" class="btn deleteAll">Очистить корзину товаров<i class="fa fa-trash" aria-hidden="true"></i></button>
					<div style="margin-top: 15px; margin-bottom: 15px;"><p>Вывод значений сессии: <b><?=$data['message']?></b></p></div>
				</form>

				<?php
				$sum = 0;
				for($i = 0; $i < count($data['products']); $i++): 
					$sum += $data['products'][$i]['price'];
				?>
					<div class="row">
						<img src="/public/img/<?=$data['products'][$i]['img']?>" alt="<?=$data['products'][$i]['title']?>">
						<h4><?=$data['products'][$i]['title']?></h4>
						<span><?=$data['products'][$i]['price']?> рублей</span>
						<!-- кнопка по ДЗ для удаления товара из корзины -->
						<form action="/basket" method="POST">
							<input type="hidden" name="deleteOneFromBasket" value="<?=$data['products'][$i]['id']?>">
							<button type="submit" class="btn">Удалить из корзины<i class="fa fa-trash" aria-hidden="true"></i></button>
						</form>
					</div>
				<?php endfor; ?>
				<!-- итого -->
				<button class="btn">Итого: (<?=$sum?>) рублей</button>
			</div>
		<?php endif; ?>
	</div>

	<!-- подвал -->
	<?php require 'public/blocks/footer.php'?>
</body>
</html>