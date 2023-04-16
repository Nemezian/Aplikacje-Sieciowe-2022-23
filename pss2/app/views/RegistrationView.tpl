{extends file="main.tpl"}

{block name=top}
<div id="main" class="wrapper style1">
	<div class="container">
		<header class="major">
			<h2>Rejestracja konta</h2>
		</header>
		<section>
			<form action="{$conf->action_root}registration" method="post">
				<div class="row gtr-uniform gtr-50">
					<div class="col-12">
						<input type="text" name="registration_login" id="id_login" value="" placeholder="Login" />
					</div>
					<div class="col-12">	
						<input type="password" name="registration_pass" id="id_reg_pass" value="" placeholder="Hasło" />
					</div>
					<div class="col-12">
						<input type="password" name="repeated_pass" id="id_rep_pass" value="" placeholder="Powtórz hasło" />
					</div>
					<div class="col-12">
						<input type="submit" value="Zarejestruj konto" class="primary" />
					</div>
			</form>
		</section>	
	</div>
</div>
{/block}
