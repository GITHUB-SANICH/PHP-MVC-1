<?php
class Basket extends Controller{
	public function index(){
		//так как массив дата появляется только при наличии передаваемых данных, то воизбежании ошибки дадим знать, что массив есть независимо от передачи данных
		$data = [];
		$cart = $this->model('BasketModel');
		//проверка получения данных из формы (через нажатие кнопки). При нажати должен выводится Id товара. 
		if (isset($_POST['input_id'])) {
			//Передача Id товара в сессию
			$cart->addToCard($_POST['input_id']);
		} 

		//проверка сессии на пустоту
		if (!$cart->isSetSession()) {
			$data['empty'] = 'Корзина пуста';
		}else{
			//вывод товаров в корзину, где параметром является $cart->getSession() - Id товаров, помещенных в сессию
			$products = $this->model('Products');
			$data['products'] = $products->getProductsCart($cart->getSession());
		}

		//удаление товаров из корзины
		if (isset($_POST['deleteAllFromBasket'])) {
			$cart->deleteSession();
		}
		if (isset($_POST['deleteOneFromBasket'])) {
			$cart->deleteOneItemFromSession($_POST['deleteOneFromBasket']);
		}

		//вывод сессии на экран для проверки удаления товаров
		$data['message'] = $cart->getSession();
		//вывод шаблона с передачей в него данных вывода товаров с сортровкой.
		$this->view('basket/index', $data);
	}
}