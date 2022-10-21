<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$amount, &$yrs, &$interest){

	$amount = isset($_REQUEST ['x']) ? $_REQUEST ['x']: null;
	$yrs = isset($_REQUEST ['y']) ? $_REQUEST ['y']: null;
	$interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;	
}

function validate(&$amount,&$yrs,&$interest,&$messages){

	if ( ! (isset($amount) && isset($yrs) && isset($interest))) {
		return false;
	}

	if ( $amount == "") {
		$messages [] = 'Nie podano kwoty kredytu';
	}
	if ( $yrs == "") {
		$messages [] = 'Nie podano ilości lat';
	}

	if (count ( $messages ) != 0) return false;

	if (! is_numeric( $amount ) || $amount <= 0) {
		$messages [] = 'Kwota kredytu nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $yrs ) || $yrs <= 0) {
		$messages [] = 'Lata nie są liczbą całkowitą';
	}	

	if (count ( $messages ) != 0) return false;
	else return true;

}

function process(&$amount,&$yrs,&$interest,&$messages,&$result){
	//globalna zmienna roli uzytkownika
	//global $role;
	
	//konwersja parametrów na int
	$amount = intval($amount);
	$yrs = intval($yrs);
	
	//wykonanie operacji
	function calculations(int $amount, int $yrs, float $a){
		$installment = $amount/($yrs*12);
		$result = round($installment*($a/100)+$installment,2);
		return $result;
	}

	switch ($interest) {
		case '25procent' :
			$a = 2.5;
			$result = calculations($amount, $yrs, $a);
			break;
		case '3procent' :
			$a = 3.0;
			$result = calculations($amount, $yrs, $a);
			break;
		case '35procent' :
			$a = 3.5;
			$result = calculations($amount, $yrs, $a);
			break;
		default:
			$a = 2.0;
			$result = calculations($amount, $yrs, $a);
			break;
	}
	
}

//definicja zmiennych kontrolera
$amount = null;
$yrs = null;
$interest = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($amount,$yrs,$interest);
if ( validate($amount,$yrs,$interest,$messages) ) { // gdy brak błędów
	process($amount,$yrs,$interest,$messages,$result);
}

include 'calcCredit_view.php';