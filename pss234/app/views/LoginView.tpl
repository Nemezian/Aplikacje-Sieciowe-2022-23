{extends file="main.tpl"}

{block name=top}
<div id="main" class="wrapper style1">
	<div class="container">
		<header class="major">
			<h2>Logowanie</h2>
		</header>
		<section>
			<form action="{$conf->action_root}login" method="post">
				<div class="row gtr-uniform gtr-50">
					<div class="col-12">
						<input type="text" name="login" id="id_login" value="" placeholder="Login" />
					</div>
					<div class="col-12">
						<input type="password" name="pass" id="id_pass" value="" placeholder="Hasło" maxlength="30" />
					</div>
					<div class="col-12">
						<ul class="actions">
							<li><input type="submit" value="Zaloguj" class="primary" /></li>
							<li><input type="reset" value="Reset" /></li>
						</ul>
					</div>
				</div>
			</form>	
		</section>
	</div>
</div>
{/block}
