{extends file="main.tpl"}

{block name=top}

<div>
{if \core\ParamUtils::getFromCleanURL(0, true, 'Błędne wywołanie aplikacji') == "clubCreateShow"}
<form action="{$conf->action_root}clubCreate" method="post">
	<fieldset>
		<legend>Tworzenie nowego klubu</legend>
{/if}
{if \core\ParamUtils::getFromCleanURL(0, true, 'Błędne wywołanie aplikacji') == "clubEdit"}
	<legend>Edycja nazwy klubu</legend>
{/if}
		<div>
            <label for="id_clubname">Nazwa klubu</label>
            <input id="id_clubname" type="text" placeholder="nazwa nowego klubu" name="id_clubname">
        </div>
		<div>
			<input type="submit" value="Zapisz"/>
			<a href="{$conf->action_root}clubList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="{$form->id}">
</form>	
</div>

{/block}