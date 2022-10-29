<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

require_once _ROOT_PATH.'/lib/Smarty.class.php';

function getParams(&$form){

	$amount = isset($_REQUEST ['x']) ? $_REQUEST ['x']: null;
	$yrs = isset($_REQUEST ['y']) ? $_REQUEST ['y']: null;
	$interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;	

	$form['x'] = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$form['y'] = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
	$form['interest'] = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;	
}

function validate(&$form,&$infos,&$msgs,&$hide_intro){

	$hide_intro = false;

	$infos [] = 'Przekazano parametry.';

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['x'] == "") $msgs [] = 'Nie podano kwoty kredytu';
	if ( $form['y'] == "") $msgs [] = 'Nie podano czasu spłaty kredytu(lata)';
	
	//nie ma sensu walidować dalej gdy brak parametrów
	if ( count($msgs)==0 ) {
		// sprawdzenie, czy $x i $y są liczbami całkowitymi
		if (! is_numeric( $form['x'] )) $msgs [] = 'Kwota kredytu nie jest liczbą całkowitą';
		if (! is_numeric( $form['y'] )) $msgs [] = 'Lata nie są liczbą całkowitą';
	}
	
	if (count($msgs)>0) return false;
	else return true;
}


function process(&$form,&$infos,&$msgs,&$result){

	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
	//konwersja parametrów na int
	$form['x'] = intval($form['x']);
	$form['y'] = intval($form['y']);
	
	//wykonanie operacji
	function calculations(int $amount, int $yrs, float $a){
		$installment = $amount/($yrs*12);
		$result = round($installment*($a/100)+$installment,2);
		return $result;
	}

	switch ($form['interest']) {
		case '25procent' :
			$a = 2.5;
			$result = calculations($form['x'], $form['y'], $a);
			break;
		case '3procent' :
			$a = 3.0;
			$result = calculations($form['x'], $form['y'], $a);
			break;
		case '35procent' :
			$a = 3.5;
			$result = calculations($form['x'], $form['y'], $a);
			break;
		default:
			$a = 2.0;
			$result = calculations($form['x'], $form['y'], $a);
			break;
	}
	
}

$form = null;
$infos = array();
$messages = array();
$result = null;
$hide_intro = false;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator kredytowy');
//$smarty->assign('page_description','Kalkulator kredytowy z szablonowaniem smarty');
$smarty->assign('page_header','Kalkulator kredytowy');

$smarty->assign('hide_intro',$hide_intro);

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.tpl');