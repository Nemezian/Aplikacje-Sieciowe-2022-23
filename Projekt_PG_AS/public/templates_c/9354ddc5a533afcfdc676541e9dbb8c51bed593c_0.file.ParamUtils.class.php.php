<?php
/* Smarty version 4.1.0, created on 2023-01-27 22:53:41
  from 'C:\xampp\htdocs\Projekt_PG_AS\core\ParamUtils.class.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_63d447e5d0e1c8_15490596',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9354ddc5a533afcfdc676541e9dbb8c51bed593c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Projekt_PG_AS\\core\\ParamUtils.class.php',
      1 => 1575727702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63d447e5d0e1c8_15490596 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php'; ?>


namespace core;

use core\Message;

/**
 * Wrapper for basic parameter utils
 *
 * @author Przemysław Kudłacik
 */
class ParamUtils {

    private static function getFrom(&$source, &$idx, &$required, &$required_message, &$index) {
        if ($required && !isset($source[$idx]))
            App::getMessages()->addMessage(new Message($required_message, Message::ERROR), $index);
        if (isset($source[$idx]))
            return $source[$idx];
        return null;
    }

    public static function getFromCleanURL($param_idx, $required = false, $required_message = null, $index = null) {
        global $_PARAMS;
        return self::getFrom($_PARAMS, $param_idx, $required, $required_message, $index);
    }

    public static function getFromRequest($param_name, $required = false, $required_message = null, $index = null) {
        return self::getFrom($_REQUEST, $param_name, $required, $required_message, $index);
    }

    public static function getFromGet($param_name, $required = false, $required_message = null, $index = null) {
        return self::getFrom($_GET, $param_name, $required, $required_message, $index);
    }

    public static function getFromPost($param_name, $required = false, $required_message = null, $index = null) {
        return self::getFrom($_POST, $param_name, $required, $required_message, $index);
    }

    public static function getFromCookies($param_name, $required = false, $required_message = null, $index = null) {
        return self::getFrom($_COOKIE, $param_name, $required, $required_message, $index);
    }

    public static function getFromSession($param_name, $required = false, $required_message = null, $index = null) {
        return self::getFrom($_SESSION, $param_name, $required, $required_message, $index);
    }

}
<?php }
}
