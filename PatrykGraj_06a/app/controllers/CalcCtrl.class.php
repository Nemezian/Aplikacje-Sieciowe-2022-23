<?php

require_once 'CalcForm.class.php';
require_once 'CalcResult.class.php';

class CalcCtrl {

	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->x = getFromRequest('x');
		$this->form->y = getFromRequest('y');
		$this->form->interest = getFromRequest('interest');
	}

	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */

	public function validate(){

		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->x ) && isset ( $this->form->y ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		} else { 
			$this->hide_intro = true; //przyszły pola formularza, więc - schowaj wstęp
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->x == "") {
			getMessages()->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->y == "") {
			getMessages()->addError('Nie podano czasu spłaty kredytu(lata)');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! getMessages()->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->x )) {
				getMessages()->addError('Kwota kredytu nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->y )) {
				getMessages()->addError('Lata nie są liczbą całkowitą');
			}

			if ( $this->form->x <= 0 ) {
				getMessages()->addError('Kwota kredytu jest liczbą ujemną lub wynosi 0');
			}
			
			if ( $this->form->y <= 0 ) {
				getMessages()->addError('Długość spłacania kredytu jest liczbą ujemną lub wynosi 0');
			}
		}
		
		return ! getMessages()->isError();
	}


	public function process(){

		$this->getparams();
		
		if ($this->validate()) {

			//konwersja parametrów na int
			$this->form->x = intval($this->form->x);
			$this->form->y = intval($this->form->y);
			getMessages()->addInfo('Parametry poprawne.');

			switch ($this->form->interest) {
				case '25procent' :
					$a = 2.5;
					$this->result->result = calculations($this->form->x, $this->form->y, $a);
					break;
				case '3procent' :
					$a = 3.0;
					$this->result->result = calculations($this->form->x, $this->form->y, $a);
					break;
				case '35procent' :
					$a = 3.5;
					$this->result->result = calculations($this->form->x, $this->form->y, $a);
					break;
				default:
					$a = 2.0;
					$this->result->result = calculations($this->form->x, $this->form->y, $a);
					break;
			}
			getMessages()->addInfo('Wykonano obliczenia.');
		}

		$this->generateView();
	}


		/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		
		getSmarty()->assign('page_title','Kalkulator kredytowy');
		getSmarty()->assign('page_description','Kalkulator kredytowy z szablonowaniem smarty');
		getSmarty()->assign('page_header','Kontroler główny');
				
		
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.tpl');
	}
}