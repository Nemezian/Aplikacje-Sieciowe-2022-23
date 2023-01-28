{extends file="main.tpl"}

{block name=content}
<form action="{$conf->action_url}login" method="post">
	<legend>Logowanie do systemu</legend>
	<fieldset>
        <div>
			<label for="id_login">login: </label>
			<input id="id_login" type="text" name="login"/>
		</div>
        <div>
			<label for="id_pass">pass: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
		<div>
			<input type="submit" value="zaloguj"/>
		</div>
	</fieldset>
</form>	

{include file='messages.tpl'}

{/block}
