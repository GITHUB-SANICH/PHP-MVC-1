<?php
class ContactForm{
	//поля, вмещаемые в себя значения формы
	private $name;
	private $email;
	private $age;
	private $message;

	//метод, прнимающий значения формы при вызове
	public function setData($name, $email, $age, $message){
		$this->name = $name;
		$this->email = $email;
		$this->age = $age;
		$this->message = $message;
	}
	
	//методы по проверки полей на корректность ввода
	public function validForm(){
		if(strlen($this->name) < 3){
			return "Слово должно иметь более трех букв";
		}else if (strlen($this->email) < 3) {
			return "Вводимый email слишком короткий";
			//is_numeric - функция проверки 
		}else if (!is_numeric($this->age) || $this->age <= 0 || $this->age > 120) {
			return "Введите возраст. Прмиер: '20'";
		}else if (strlen($this->message) < 10) {
			return "Сообщение слишком короткое";
		}else{
			return "Все данные введены корректно!";
		}
	}

	//функция отправки сообщения на почту
	public function mail(){
		//почта получателя
		$to = "sani4.mocrousov@yandex.ru";
		//сообщение отправителя
		$message = "Имя: " . $this->name . ".<br> Возраст: " . $this->age . ".<br> Сообщение: " . $this->message; 
		//тема сообщения
		$subject = "=?utf-8?B?".base64_encode("Сообщение с сайта")."?=";
		//заголовок
		$headers = "From: $this->email\r\nReply-to: $this->email\r\nContent-type: text/html; charset=utf-8\r\n";
		//результат выполнения встроенной функция mail
		$success = mail($to, $subject, $message, $headers);

		if (!$success) {
			return "Сообщение не было отправлено (возможно из-за локального сервера)";
		}else{
			return 'Сообщение отправлено ... но это не точно.';
		}
		//ВАЖНО!На локальном сервере возможность отправки сообщения не предусмотрена!
	}
}
