<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('homePage');
App::getRouter()->setLoginRoute('accessDenied');

Utils::addRoute('homePage',         'HomePageCtrl');
Utils::addRoute('accessDenied',     'HomePageCtrl');

Utils::addRoute('loginShow',        'LoginCtrl');
Utils::addRoute('login',            'LoginCtrl');
Utils::addRoute('logout',           'LoginCtrl');

Utils::addRoute('registrationShow', 'RegistrationCtrl');
Utils::addRoute('registration',     'RegistrationCtrl');

Utils::addRoute('clubList',         'ClubListCtrl',     ['User', 'Player', 'Captain', 'Administrator']);
Utils::addRoute('clubDelete',       'ClubListCtrl',	    ['Captain', 'Administrator']);
Utils::addRoute('tab',              'ClubListCtrl',     ['User', 'Player', 'Captain', 'Administrator']);

Utils::addRoute('clubCreate',       'ClubEditCtrl',	    ['User']);
Utils::addRoute('clubCreateShow',   'ClubEditCtrl',	    ['User']);
Utils::addRoute('clubEdit',         'ClubEditCtrl',	    ['Captain']);

/* Utils::addRoute('listMatch',     'MatchEditCtrl',	['Captain']);
Utils::addRoute('addMatch',         'MatchEditCtrl',	['Captain']);
Utils::addRoute('deleteMatch',      'MatchEditCtrl',	['Administrator']);       //jeszcze nie zaimplementowane

Utils::addRoute('playerStatList',   'PlayerStatCtrl',	['Player','Captain']);
Utils::addRoute('playerStatEdit',   'PlayerStatCtrl',	['Player','Captain']);
 */

Utils::addRoute('clubJoin',         'ClubMgmtCtrl',	['User']);
Utils::addRoute('clubLeave',        'ClubMgmtCtrl',	['Player']);