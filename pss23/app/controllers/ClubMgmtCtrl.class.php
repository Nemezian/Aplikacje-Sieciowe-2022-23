<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use core\RoleUtils;
use app\forms\ClubMgmtForm;

class ClubMgmtCtrl {

    private $form;
    private $userid;   


    public function __construct() {
        $this->form = new ClubMgmtForm();
    }

    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_clubJoin(){


        $userid = SessionUtils::load('uid', true);

        if($this->validateEdit()){
            if(App::getDB()->get("users", "user_id", ["AND" =>["clubs_club_id" => NULL , "user_id" => $userid]])){

                try{

                    App::getDB()->update("users", [
                        "clubs_club_id" => $this->form->id
                    ],[
                        "user_id" => $userid
                    ]);

                    App::getDB()->insert("user_roles", [
                        "users_user_id" => $userid,
                        "roles_role_id" => "120"
                    ]);

                    RoleUtils::addRole('Player');
                    SessionUtils::store('clid', $this->form->id);

                } catch (\PDOException $e) {

                    Utils::addErrorMessage('Wystąpił błąd podczas dodawania nowego gracza');
                    if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());

                }

                Utils::addInfoMessage('Pomyślnie dołączyłeś do drużyny!');
                App::getRouter()->forwardTo('clubList');

            } else{
                Utils::addErrorMessage('Już jesteś w drużynie!');
                App::getRouter()->forwardTo('clubList');
            }
        } else {
            $this->generateView();
        }

    }

    public function action_clubLeave(){

        $userid = SessionUtils::load('uid', true);

        if($this->validateEdit()){
            try{

                App::getDB()->update("users", [
                    "clubs_club_id" => NULL
                ],[
                    "user_id" => $userid
                ]); 

                App::getDB()->delete("user_roles", [
                    "users_user_id" => $userid,
                    "roles_role_id" => "120"
                ]);
                RoleUtils::removeRole('Player');
                SessionUtils::remove('clid');

            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania gracza z drużyny');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            Utils::addInfoMessage('Pomyślnie opuściłeś drużynę!');
            App::getRouter()->forwardTo('clubList');
        } else{
            $this->generateView();
        } 
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('ClubList.tpl');
    }
}