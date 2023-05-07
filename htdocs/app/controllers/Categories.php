<?php
class Categories extends Controller{
	public function index($nummerPage = ''){
		$products = $this->model('Products'); 
		$products->setNummerPage($nummerPage);
		//передаем в шаблон 1) список всех товаров, 2) номер текущей страницы, 3) максимальное число страниц, 4) заголовок страницы
		$data = ['products' => $products->getProductsByPages(), 
					'nummerPage' => $products->getNummerPage(), 
					'totalCountPage' => $products->getCountPages(), 
					'productsForPage' => $products->getProductsForPage(),
					'title' => 'Все товары на сайте'
					];
		//вывод шаблона с передачей в него данных вывода товаров с сортровкой.
		$this->view('categories/index', $data);
	}

	//название контроллера должно быть ровно названию страницы
	public function hats(){
		$products = $this->model('Products'); 
		$data = ['products' => $products->getProductsCategorie('hats'), 'title' => 'Категория кепки'];
		$this->view('categories/index', $data);
	}

	public function watches(){
		$products = $this->model('Products');  
		$data = ['products' => $products->getProductsCategorie('watches'), 'title' => 'Категория часы']; 
		$this->view('categories/index', $data);
	}

	public function shoes(){
		$products = $this->model('Products');  
		$data = ['products' => $products->getProductsCategorie('shoes'), 'title' => 'Категория обувь'];
		$this->view('categories/index', $data);
	}

	public function shirts(){
		$products = $this->model('Products');  
		$data = ['products' => $products->getProductsCategorie('shirts'), 'title' => 'Категория майки'];
		$this->view('categories/index', $data);
	}

}