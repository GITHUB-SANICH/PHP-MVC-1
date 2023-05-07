<?php
class Product extends Controller{
	public function index($id){
		$products = $this->model('Products');  
		//вывод шаблона с передачей в него данных вывода товаров с сортровкой.
		$this->view('product/index', $products->getOneProduct($id));
	}
}