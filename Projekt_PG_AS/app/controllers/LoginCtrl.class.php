<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use core\SessionUtils;
use app\forms\LoginForm;
use app\transfers\User;

class LoginCtrl {

    private $form;
    private $userContainter;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        if (!isset($this->form->login))
            return false;

        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        if (App::getMessages()->isError())
            return false;

        try{
        $result = App::getDB()->select("users",[
            "user_id",
            "login",
            "password",
            "clubs_club_id"
            ],[
            "login" => $this->form->login
            ]);

        $count = App::getDB()->count("users",
            [
            "login" => $this->form->login
            ]);
        }catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        if($count > 0) {
            
            $userid = $result[0]["user_id"];
            $hashed_password = $result[0]["password"];
            SessionUtils::store('uid', $userid);
            SessionUtils::store('clid', $result[0]["clubs_club_id"]);

            if(password_verify($this->form->pass, $hashed_password)) {

                try{
                $rolesRecords = App::getDB()->select("user_roles",[
                    "roles_role_id"
                ],[
                    "users_user_id" => $userid
                ]);
                }catch (\PDOException $e) {
                    Utils::addErrorMessage('Wystąpił błąd podczas odczytu ról');
                    if (App::getConf()->debug)
                        Utils::addErrorMessage($e->getMessage());
                }

                
                foreach($rolesRecords as $r) {
                        try{
                            $role = App::getDB()->select("roles", [                         // nadanie wszystkich ról które posiada użytkownik
                                "name",
                                "is_active"
                            ],[
                                "role_id" => $r["roles_role_id"]
                            ]);

                            if($role[0]["is_active"] == 1){
                                RoleUtils::addRole($role[0]["name"]);
                            } 
                        }catch (\PDOException $e) {
                            Utils::addErrorMessage('Wystąpił błąd podczas przypisywania ról');
                            if (App::getConf()->debug)
                                Utils::addErrorMessage($e->getMessage());
                        }
                } 
            }
            else{
                Utils::addErrorMessage('Niepoprawny login lub hasło');
            }
        }else {
                Utils::addErrorMessage('Niepoprawny login lub hasło');
        } 

        return !App::getMessages()->isError();
    }

    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login() {
        if ($this->validate()) {
            Utils::addInfoMessage('Poprawnie zalogowano do systemu');
            App::getRouter()->redirectTo("homePage");
        } else {
            $this->generateView();
        }
    }

    public function action_logout() {
        session_destroy();
        App::getRouter()->redirectTo('homePage');
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('LoginView.tpl');
    }

}
