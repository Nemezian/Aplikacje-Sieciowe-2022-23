<?php
function getFromRequest($param_name){
	return isset($_REQUEST [$param_name]) ? $_REQUEST [$param_name] : null;
}
function calculations($x, $y, $a){
    $installment = $x/($y*12);
    $result = round($installment*($a/100)+$installment,2);
    return $result;
}