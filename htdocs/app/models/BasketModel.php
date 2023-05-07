<?php
//объявление сессии
session_start();
class BasketModel{
	//имя сесии по-умолчанию
	private $session_name = 'cart';

	//метод проверки сесии на наличие
	public function isSetSession(){
		return isset($_SESSION[$this->session_name]);
	}

	//метод удаления сессии
	public function deleteSession(){
		unset($_SESSION[$this->session_name]);
	}

	//метод удаления товара из сессии
	public function deleteOneItemFromSession($itemID){
		//проверка сессии на значенние
		$items = explode(",", $_SESSION[$this->session_name]);
		//если значение найдено - то вычеркиваем его из сессии вместе с запятой, если оно не единственное
		if (in_array($itemID, $items)) {
			if ($this->countItems() > 1 && $itemID != $items[0]){
				$_SESSION[$this->session_name] = str_replace(",$itemID", '', $_SESSION[$this->session_name]);
			} elseif($this->countItems() > 1 && $items[0] == $itemID){
				$_SESSION[$this->session_name] = str_replace("$itemID,", '', $_SESSION[$this->session_name]);
			}elseif($this->countItems() == 1) {
				$this->deleteSession();
			}	
		}
	}

	//метод вывода значения сессии
	public function getSession(){ 
		return $_SESSION[$this->session_name];
	}

	//метод добавления товара с Id в сессию
	public function addToCard($itemID){ 
		//Если сессия пуста - устанавливаем в нее принимаемое значение
		if (!$this->isSetSession()) {
			$_SESSION[$this->session_name] = $itemID;
		//если сессия уже не пуста у имеющемуся значению - добавляем принимаемое
		}else{
			//если сессия не пуста, то делим сессию на значения через запятую
			$items = explode(",", $_SESSION[$this->session_name]);

			//вводим переменую, которая изначально равна false - она нужна, чтобы не записывать в сессию значения, которые уже в ней записаны 
			$itemExist = false;
			//перебираем имеющиеся значения в сесии и если принимаемое значение уже записано в сессию - приравниваем переменную $itemExist к 'true'
			foreach ($items as $el) {
				if ($el == $itemID) {
					$itemExist = true;
				}
			}

			//если $itemExist ровна false, т.е. в сессии нет значения принимаемого параметра, то добавляем этот параметр в сессию.
			if (!$itemExist) {
				$_SESSION[$this->session_name] = $_SESSION[$this->session_name].','.$itemID;
			}
		}
	}

	//метод подсчета числа элементов в сесии
	public function countItems(){
		//если сессия пуста, то выводим 0
		if (!$this->isSetSession()) {
			return 0;
		//если сессия не пуста - дробим сесиию на элементы массива и подсчитываем число элементов
		}else{
			$items = explode(',', $_SESSION[$this->session_name]);
			return count($items);
		}
	}
}