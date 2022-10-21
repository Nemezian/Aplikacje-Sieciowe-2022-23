<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calcCredit.php" method="post">
	<label for="id_x">Kwota kredytu: </label> <br />
	<input id="id_x" type="text" name="x" value="<?php if(isset($x)) print($x); ?>" /><br /><br />
	<label for="id_y">Na ile lat?: </label><br />
	<input id="id_y" type="text" name="y" value="<?php if(isset($y)) print($y); ?>" /><br /><br />
	<label for="id_interest">Oprocentowanie w skali roku: </label>
	<select name="interest">
		<option value="2procent">2%</option>
		<option value="25procent">2.5%</option>
		<option value="3procent">3%</option>
		<option value="35procent">3.5%</option>
	</select><br />

	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Rata miesięczna: '.$result; ?>
</div>
<?php } ?>

</body>
</html>