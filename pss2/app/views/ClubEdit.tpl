{extends file="main.tpl"}

{block name=top}

<div id="main" class="wrapper style1">
	<div class="container">
		<section>
			{if \core\ParamUtils::getFromCleanURL(0, true, 'Błędne wywołanie aplikacji') == "clubCreateShow"}
				<form action="{$conf->action_root}clubCreate" method="post">
					<h3>Tworzenie nowego klubu</h3>
			{/if}
			{if \core\ParamUtils::getFromCleanURL(0, true, 'Błędne wywołanie aplikacji') == "clubEdit"}
					<h3>Edycja nazwy klubu</h3>
			{/if}
						<div class="col-12">
							<input id="id_clubname" type="text" placeholder="Nazwa klubu" name="id_clubname">
						</div>
						<div class="col-6 col-12-xsmall">
								<input type="submit" value="Zapisz" class="button small primary" />
								<a href="{$conf->action_root}clubList" class="button small">Powrót</a>
						</div>
						<div class="col-12">
							<input type="hidden" name="id" value="{$form->id}">
						</div>
				</form>
		</section>	
	</div>
</div>

{/block}