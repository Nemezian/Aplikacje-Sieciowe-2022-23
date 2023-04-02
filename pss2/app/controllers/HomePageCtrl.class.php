<?php

namespace app\controllers;

use core\App;

class HomePageCtrl {

    public function action_homePage() {
        $this->generateView();
    }

    public function action_accessDenied() {
        App::getSmarty()->display('AccessDeniedView.tpl');
    }

    public function generateView() {
        App::getMessages();
        App::getSmarty()->display('HomePage.tpl');
    }
}