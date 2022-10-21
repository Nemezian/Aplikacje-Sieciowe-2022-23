<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$amount = $_REQUEST ['x'];
$yrs = $_REQUEST ['y'];
$interest = $_REQUEST ['interest'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

//sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($amount) && isset($yrs))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $amount == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}
if ( $yrs == "") {
	$messages [] = 'Nie podano ilości lat';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $amount ) || $amount <= 0) {
		$messages [] = 'Kwota kredytu nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $yrs ) || $yrs <= 0) {
		$messages [] = 'Lata nie są liczbą całkowitą';
	}	

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
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

include 'calcCredit_view.php';