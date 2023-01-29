<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use core\SessionUtils;
use core\RoleUtils;
use app\forms\ClubEditForm;

class ClubEditCtrl {
    private $form;

    public function __construct() {
        $this->form = new ClubEditForm();
    }

    public function validateSave() {

        $this->form->clubname = ParamUtils::getFromRequest('id_clubname');
        $userid = SessionUtils::load('uid', $keep = true);

        if (App::getMessages()->isError())
            return false;

        if (empty(trim($this->form->clubname))) {
            Utils::addErrorMessage('Wprowadź nazwę klubu');
        }
        if(App::getDB()->count("user_roles", ["roles_role_id" => "130", "users_user_id" => $userid]) > 0) { 
            Utils::addErrorMessage('Jesteś już kapitanem innej drużyny!');
        }
        if (App::getMessages()->isError())
            return false;

        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_clubCreateShow(){
        $this->generateView();
    }

    public function action_clubCreate() {
        
        if ($this->validateSave()) {
            try {
                    $count = App::getDB()->count("clubs");
                    if ($count <= 20) {
                        App::getDB()->insert("clubs", [
                            "club_name" => $this->form->clubname,
                            "wins" => 0,
                            "draws" => 0,
                            "losses" => 0,
                        ]);
                    } else {
                        Utils::addInfoMessage('Przykro nam, nie ma więcej miejsca na nowe kluby');
                        $this->generateView();
                        exit();
                    }

                    $captainRoleId = App::getDB()->get("roles", "role_id",[
                        "name" => 'Captain'
                    ]);
                    $userid = SessionUtils::load('uid', $keep = true);

                    App::getDB()->insert("user_roles", [
                        "users_user_id" => $userid,
                        "roles_role_id" => $captainRoleId
                    ]);
                    $newClubName = App::getDB()->get("clubs", "club_id", ["club_name" => $this->form->clubname]);

                    App::getDB()->update("users", [
                        "clubs_club_id" => $newClubName
                    ],[
                        "user_id" => $userid
                    ]);
                    RoleUtils::addRole('Captain');
                Utils::addInfoMessage('Pomyślnie utworzono drużynę!');

            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            App::getRouter()->forwardTo('clubList');
        } else {
            $this->generateView();
        }
    }

    public function action_clubEditShow() {

        $this->generateView();
    }
    public function action_clubEdit() {
        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("clubs", "*", [
                    "club_id" => $this->form->id
                ]);
                $this->form->name = $record['club_name'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        $this->generateView();
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('ClubEdit.tpl');
    }

}