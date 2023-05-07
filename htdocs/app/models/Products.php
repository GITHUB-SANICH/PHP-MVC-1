<?php
//подключение к БД через класс DB
require 'DB.php';

class Products{
	//переменная, хранящая подключеник к БД. Удобнее обращаться к БД через поле, а не через статический метод. 
	private $_db = null;
	//номер текущей страницы
	private $nummerPage;
	//число записей в одной странице
	private 	$productsForPage = 3;	
	

	//подключение к БД при создании объекта на основе класса Products через конструктор и приравнивание ее к полю класса
	public function __construct(){
		$this->_db = DB::getInstence();
	}

	//вывод всех записей из таблици 'products'
	public function getProducts(){
		$result = $this->_db->query("SELECT * FROM `products` ORDER BY `id` DESC");
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	//присваивание номера страницы с проверкой
	public function setNummerPage($nummerPage){
		//условие регулирующее номер страници, если он меньше 1 или больше максимального числа страниц 
		if($nummerPage < 1 || is_numeric($nummerPage) == false){
			$nummerPage = 1;
		}else if(is_numeric($nummerPage) == true && $nummerPage > $this->getCountPages()){
			$nummerPage = $this->getCountPages();
		}

		$this->nummerPage = $nummerPage;
	}

	//вывод номера страницы
	public function getNummerPage(){
		return $this->nummerPage;
	}
	
	//метод вывода числа страниц с товарами
	public function getCountPages(){
		//запрос на число записей
		$result = $this->_db->query("SELECT COUNT(`id`) AS 'total_count'FROM `products`");
		$resultCount = $result->fetch(PDO::FETCH_ASSOC);

		//получение всех страниц через деление общего числа товаров на число товаров, отображаемых на одной странице
		return ceil( $resultCount['total_count'] / $this->productsForPage);
	}

	//возврат числа товаров, выводимых на странице
	public function getProductsForPage(){
		return $this->productsForPage;
	}

	//вывод товаров в обратном порядке с пагинацией
	public function getProductsByPages(){
		//$result = $this->_db->query("SELECT * FROM `products` ORDER BY $order DESC LIMIT $limit");
		//начало отсчета выводимых товаров
		$offset = ($this->getNummerPage() * $this->getProductsForPage()) - $this->getProductsForPage(); 
		//число выводимых товаров
		$limit = $this->getProductsForPage();
		$result = $this->_db->query("SELECT * FROM `products` ORDER BY `id` DESC LIMIT $offset, $limit");
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	//вывод N записей из таблици 'products'. Первый параметр - элемент сортировки, второй - число выводимых записей.
	public function getProductsLimited($order, $limit){
		$result = $this->_db->query("SELECT * FROM `products` ORDER BY $order DESC LIMIT $limit");
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getProductsCategorie($category){
		$result = $this->_db->query("SELECT * FROM `products` WHERE `category` = '$category' ORDER BY `id` DESC");
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getOneProduct($id){
		$result = $this->_db->query("SELECT * FROM `products` WHERE `id` = '$id'");
		return $result->fetch(PDO::FETCH_ASSOC);
	}
	
	//вывод товаров, помещенных в корзину
	public function getProductsCart($items){
		$result = $this->_db->query("SELECT * FROM `products` WHERE `id` IN ($items)");
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
}