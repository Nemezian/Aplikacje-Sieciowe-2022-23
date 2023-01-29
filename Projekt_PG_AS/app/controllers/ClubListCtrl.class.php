<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use app\forms\ClubSearchForm;

class ClubListCtrl {

    private $form;
    private $records;

    public function __construct() {
        $this->form = new ClubSearchForm();
    }

    public function validate() {

        $this->form->clubname = ParamUtils::getFromRequest('sf_clubname');

        return !App::getMessages()->isError();
    }

    public function validateEdit() {

        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_clubList() {

        $this->validate();

        $search_params = [];
        if (isset($this->form->clubname) && strlen($this->form->clubname) > 0) {
            $search_params['club_name[~]'] = $this->form->clubname . '%';
        }

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        $where ["ORDER"] = "club_name";
  

        try {
            $this->records = App::getDB()->select("clubs", [
                "club_name",
                "wins",
                "draws",
                "losses",
                "club_id",
                    ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        App::getSmarty()->assign('searchForm', $this->form);
        $this->generateView();
    }

    public function action_clubDelete() {
        if ($this->validateEdit()) {

            $userid = SessionUtils::load('uid', $keep = true);

            try{
                $count = App::getDB()->count("users", ['AND' => [
                    "user_id" => $userid,
                    "clubs_club_id" => $this->form->id
                    ]]);

                $isAdmin = App::getDB()->count("user_roles", ['AND' => [
                            "roles_role_id" => "100",
                            "users_user_id" => $userid
                            ]]);

            }catch (\PDOException $e) {
                    Utils::addErrorMessage('Wystąpił błąd podczas odczytywania rekordu');
                    if (App::getConf()->debug)
                        Utils::addErrorMessage($e->getMessage());
                }
                
            if($count > 0 && $isAdmin != 0){

                try {

                    $clubPlayers = App::getDB()->select("users", [
                        "user_id"
                    ],[
                        "clubs_club_id" => $this->form->id
                    ]);

                    foreach($clubPlayers as $i){
                        App::getDB()->delete("user_roles", [
                            "OR" => [
                                "AND" =>[
                                    "roles_role_id" => "120",
                                    "users_user_id" => $clubPlayers[$i]["user_id"]
                                ],
                                "AND" =>[
                                    "roles_role_id" => "130",
                                    "users_user_id" => $clubPlayers[$i]["user_id"]
                                ]
                    ]]);
                }
                if($isAdmin == 0){
                    RoleUtils::removeRole('Captain');
                }

                    App::getDB()->update("users", [
                        "clubs_club_id" => NULL
                    ],[
                        "clubs_club_id" => $this->form->id
                    ]);
    
                    App::getDB()->delete("clubs", [
                        "club_id" => $this->form->id
                    ]);

                    Utils::addInfoMessage('Pomyślnie usunięto rekord');

                } catch (\PDOException $e) {
                    Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                    if (App::getConf()->debug)
                        Utils::addErrorMessage($e->getMessage());
                }
            } else {
                Utils::addErrorMessage('Nie możesz usunąć czyjejś drużyny!');
                App::getRouter()->forwardTo('clubList');
            }
            
        }else{
            Utils::addErrorMessage('Niepowodzenie przy próbie usunięcia drużyny');
            App::getRouter()->forwardTo('clubList');
        }
    }

    public function generateView() {

        App::getSmarty()->assign('clubs', $this->records);
        App::getSmarty()->display('ClubList.tpl');

    }

}