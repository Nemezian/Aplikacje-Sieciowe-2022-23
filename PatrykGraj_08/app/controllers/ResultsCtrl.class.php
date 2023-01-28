<?php

namespace app\controllers;

use PDOException;

class ResultsCtrl{

    private $records;

    public function action_results(){

        try{
			$this->records = getDB()->select("wynik", [
					"id",
					"kwota",
					"ile_lat",
					"procent",
                    "rata",
                    "data"
				]);
		} catch (PDOException $e){
			getMessages()->addError('Wystąpił błąd podczas pobierania rekordów');
			if (getConf()->debug) getMessages()->addError($e->getMessage());			
		}	
		
		getSmarty()->assign('wynik',$this->records);
		getSmarty()->display('ResultsList.tpl');
    }

    

}
