{extends file="main.tpl"}

{block name=top}

<div class="mb-3">
<form action="{$conf->action_url}clubList">
<legend><center><h2><b>Lista klubów</b></h2></center></legend><br>
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="Nazwa klubu" name="sf_clubname" /><br />
		<button type="submit">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}

{if \core\RoleUtils::inRole("User") && !(\core\RoleUtils::inRole("Player")) && !(\core\RoleUtils::inRole("Administrator")) && !(\core\RoleUtils::inRole("Captain"))}
	<div>
	<a href="{$conf->action_root}clubCreateShow">Utwórz klub</a>
	</div>	
{/if}

<table class="table" id="tab_people">
<thead>
	<tr>
		<th scope="col">Nazwa klubu</th>
		<th scope="col">Wygrane</th>
		<th scope="col">Remisy</th>
		<th scope="col">Porażki</th>
		<th scope="col">Opcje</th>
	</tr>
</thead>
<tbody>
{foreach $clubs as $c}
{strip}
	<tr>
		<th scope="row">{$c["club_name"]}</td>
		<td>{$c["wins"]}</td>
		<td>{$c["draws"]}</td>
		<td>{$c["losses"]}</td>
		<td>

			{if \core\RoleUtils::inRole("User") && !(\core\RoleUtils::inRole("Player")) && !(\core\RoleUtils::inRole("Administrator")) &&!(\core\RoleUtils::inRole("Captain"))}
				<a class="button-small pure-button button-success" href="{$conf->action_url}clubJoin/{$c['club_id']}">Dołącz</a>
				&nbsp;
			{/if}
			{if (\core\RoleUtils::inRole("Captain") && \core\SessionUtils::load("clid", true) == $c['club_id'])}
				<a class="button-small pure-button button-secondary" href="{$conf->action_url}clubEdit/{$c['club_id']}">Edytuj</a>
				&nbsp;
			{/if}
			{if (\core\RoleUtils::inRole("Captain") && \core\SessionUtils::load("clid", true) == $c['club_id']) || \core\RoleUtils::inRole("Administrator")}
				<a class="button-small pure-button button-warning" href="{$conf->action_url}clubDelete/{$c['club_id']}">Usuń</a>
			{/if}

			{if (\core\RoleUtils::inRole("Player") && \core\SessionUtils::load("clid", true) == $c['club_id'])}
				<a class="button-small pure-button button-warning" href="{$conf->action_url}clubLeave/{$c['club_id']}">Opuść</a>
			{/if}
			
		</td> 
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
