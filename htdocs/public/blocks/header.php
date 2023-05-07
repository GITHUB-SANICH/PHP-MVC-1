<header>
		<!-- Секция первая -->
		<div class="container top-menu">
			<!-- меню -->
			<div class="nav">
				<a href="/">Главная</a>
				<a href="/contact">Контакты</a>
				<a href="/contact/about">Про нас</a>
			</div>
			<!-- телефон -->
			<div class="tel">
				<i class="fa-solid fa-phone"></i> +7 (100) 500 - 00 - 07
			</div>
		</div>
		<!-- Секция вторая -->
		<div class="container middle">
			<!-- лого -->
			<div class="logo">
				<img src="/public/img/logo.svg" alt="logo">
				<span>Тут должен был быть ваш лозунг</span>
			</div>	
			<!-- кнопки авторизации -->
			<div class="auth-chekout">
				<a href="/basket">
					<!-- подключение модели и создание объекта с функционалом отображения числа элементов в корзине -->
					<?php	
					require_once "app/models/BasketModel.php"; 
					$countItemsToBasket = new BasketModel();?>
					<button class="btn basket">Корзина <b>(<?=$countItemsToBasket->countItems()?>)</b></button>
				</a>
				<!-- если куки не нулевое -->
				<?php if($_COOKIE['login'] == ''): ?>
				<a href="/user/auth">
					<button class="btn auth">Войти</button>
				</a>
				<a href="/user/reg">
					<button class="btn">Регистрация</button>
				</a>
				<!-- если пользователь авторизован -->
				<?php else: ?>
					<a href="/user/dashboard">
						<button class="btn dashboard">Кабинет пользователя</button>
					</a>
				<?php endif; ?>
			</div>
		</div>
		<!-- Секция третья -->
		<div class="container menu">
			<ul>
				<li><a href="categories">Все товары</a></li>
				<li><a href="categories/shoes">Обувь</a></li>
				<li><a href="categories/hats">Кепки</a></li>
				<li><a href="categories/shirts">Футболки</a></li>
				<li><a href="categories/watches">Часы</a></li>
			</ul>
		</div>
	</header>