{extends file="main.tpl"}

{block name=top}
	<div>
<form action="{$conf->action_url}registration" method="post" class="well form-horizontal">
<fieldset>
	
<legend><center><h2><b>Rejestracja konta</b></h2></center></legend><br>

         <div class="mb-3">
			<label for="id_login" class="form-label">Login: </label></br>
			<input id="id_login" class="form-control" type="text" name="registration_login" />
		</div>
        <div class="mb-3">	
			<label for="id_reg_pass" class="form-label">Hasło: </label></br>
			<input id="id_reg_pass" class="form-control" type="password" name="registration_pass" />
		</div>
		<div class="mb-3">
			<label for="id_rep_pass" class="form-label">Powtórz hasło: </label></br>
			<input id="id_rep_pass" class="form-control" type="password" name="repeated_pass" /><br />
		</div>
			<button type="submit" class="btn btn-primary">Zarejestruj konto</button> 
	</fieldset>
</form>	
</div>
	</div>
{/block}
