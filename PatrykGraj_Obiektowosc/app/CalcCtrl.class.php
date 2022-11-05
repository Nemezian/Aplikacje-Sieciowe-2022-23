<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/lib/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';
require_once $conf->root_path.'/lib/Smarty.class.php';



class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	private $hide_intro; //zmienna informująca o tym czy schować intro

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
		$this->hide_intro = false;
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->x = isset($_REQUEST ['x']) ? $_REQUEST ['x'] : null;
		$this->form->y = isset($_REQUEST ['y']) ? $_REQUEST ['y'] : null;
		$this->form->interest = isset($_REQUEST ['interest']) ? $_REQUEST ['interest'] : null;
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
			$this->msgs->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->y == "") {
			$this->msgs->addError('Nie podano czasu spłaty kredytu(lata)');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! $this->msgs->isError()) {
			
			// sprawdzenie, czy $x i $y są liczbami całkowitymi
			if (! is_numeric ( $this->form->x )) {
				$this->msgs->addError('Kwota kredytu nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->y )) {
				$this->msgs->addError('Lata nie są liczbą całkowitą');
			}
		}
		
		return ! $this->msgs->isError();
	}


	public function process(){

		$this->getparams();
		
		if ($this->validate()) {

			//konwersja parametrów na int
			$this->form->x = intval($this->form->x);
			$this->form->y = intval($this->form->y);
			$this->msgs->addInfo('Parametry poprawne.');
			
			//wykonanie operacji
			function calculations($x, $y, $a){
				$installment = $x/($y*12);
				$result = round($installment*($a/100)+$installment,2);
				return $result;
			}

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
			$this->msgs->addInfo('Wykonano obliczenia.');
		}
		$this->generateView();
	}


		/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Kalkulator kredytowy');
		//$smarty->assign('page_description','Kalkulator kredytowy z szablonowaniem smarty');
		$smarty->assign('page_header','Kalkulator kredytowy');
				
		$smarty->assign('hide_intro',$this->hide_intro);
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/CalcView.html');
	}
}