{extends file="main.tpl"}

{block name=top}
<form action="{$conf->action_root}login" method="post">
<legend><center><h2><b>Logowanie do systemu</b></h2></center></legend><br>
	<fieldset>
        <div class="mb-3">
			<label for="id_login">Login: </label></br>
			<input id="id_login" type="text" name="login" maxlength="30" size="30"/>
		</div>
        <div class="mb-3">
			<label for="id_pass">Hasło: </label></br>
			<input id="id_pass" type="password" name="pass" maxlength="30" size="30"/><br />
		</div>
		<button type="submit" class="btn btn-primary">Zaloguj</button>
	</fieldset>
</form>	
{/block}
