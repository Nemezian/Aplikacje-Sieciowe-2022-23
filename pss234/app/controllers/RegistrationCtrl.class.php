<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use core\Validator;
use app\forms\RegistrationForm;

class RegistrationCtrl{

    private $form;

    public function __construct() {
        $this->form = new RegistrationForm();

    }

    public function validate(){

        $this->form->login = ParamUtils::getFromRequest('registration_login');
        $this->form->pass = ParamUtils::getFromRequest('registration_pass');
        $this->form->repeatedPass = ParamUtils::getFromRequest('repeated_pass');
        $v = new Validator();

        if (!isset($this->form->login))
            return false;

        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }
        if ($this->form->pass != $this->form->repeatedPass) {
            Utils::addErrorMessage('Hasła się różnią');
        }

        $count = App::getDB()->count("users", ["login" => $this->form->login]);
        if ($count > 0) {
            Utils::addErrorMessage('Taki użytkownik już istnieje');
        }

        $validatePassword = $v->validate($this->form->pass, [
            'min_length' => 4,
            'max_length' => 30,
            'validator_message' => 'Hasło musi mieć długość od 4 do 30 znaków'
        ]);

        $validateLogin = $v->validate($this->form->login, [
            'min_length' => 4,
            'max_length' => 30,
            'regexp' => '/^[0-9a-zA-Z ]/',
            'validator_message' => 'Login musi mieć długość od 4 do 30 znaków i nie może zawierać znaków specjalnych'
        ]);

        return !App::getMessages()->isError();
    }

    public function action_registrationShow() {
        $this->generateView();
    }

    public function action_registration() {
        if ($this->validate()) {

            $hashed_password = password_hash($this->form->pass, PASSWORD_DEFAULT);
            $id = App::getDB()->max("users", "user_id");

            $id++;
            try{
                App::getDB()->insert("users", [
                    "user_id" => $id,
                    "login" => $this->form->login,
                    "password" => $hashed_password,
                    "who_added" => $id,
                    "clubs_club_id" => null,
                    "playerstats_stat_id" => null,
                ]);
                Utils::addInfoMessage('Twoje konto zostało zarejestrowane');
            }catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            try{
                App::getDB()->insert("user_roles", [
                    "users_user_id" => $id,
                    "roles_role_id" => '110',           //dodanie użytkownikowi roli "User"
                ]);
            }catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas rejestracji. Skontaktuj się z administratorem.');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            $this->generateView();
        } else {
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('RegistrationView.tpl');
    }
}