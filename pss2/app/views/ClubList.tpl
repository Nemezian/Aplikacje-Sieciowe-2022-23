{extends file="main.tpl"}

{block name=top}

<div id="main" class="wrapper style1">
	<div class="container">
		<section>
		<h2>Lista klubów</h2>	
			<div class="row gtr-uniform gtr-50">
				<form action="{$conf->action_url}clubList">
					<legend>Opcje wyszukiwania</legend>
					<div class="col-12">
						<input type="text" placeholder="Nazwa klubu" name="sf_clubname" /><br />
					</div>
					<div class="col-12">
						<input type="submit" value="Filtruj" class="primary" />
					</div>
				</form>
			</div>	
		</section>

{/block}

{block name=bottom}

		<section>
			{if \core\RoleUtils::inRole("User") && !(\core\RoleUtils::inRole("Player")) && !(\core\RoleUtils::inRole("Administrator")) && !(\core\RoleUtils::inRole("Captain"))}
				<div>
					<a href="{$conf->action_root}clubCreateShow" class="button primary">Utwórz klub</a>
				</div>	
			{/if}
		</section>

		<section>
			<div class="table-wrapper">
				<table class="alt" id="tab_people">
					<thead>
						<tr>
							<th>Nazwa klubu</th>
							<th>Wygrane</th>
							<th>Remisy</th>
							<th>Porażki</th>
							<th>Opcje</th>
						</tr>
					</thead>
					<tbody>
					{foreach $clubs as $c}
						{strip}
							<tr>
								<td>{$c["club_name"]}</td>
								<td>{$c["wins"]}</td>
								<td>{$c["draws"]}</td>
								<td>{$c["losses"]}</td>
								<td>
									<ul class="actions">
									{if \core\RoleUtils::inRole("User") && !(\core\RoleUtils::inRole("Player")) && !(\core\RoleUtils::inRole("Administrator")) &&!(\core\RoleUtils::inRole("Captain"))}
										<li><a href="{$conf->action_url}clubJoin/{$c['club_id']}" class="button primary small">Dołącz</a></li>
									{/if}
									{if (\core\RoleUtils::inRole("Captain") && \core\SessionUtils::load("clid", true) == $c['club_id'])}
										<li><a href="{$conf->action_url}clubEdit/{$c['club_id']}" class="button primary small">Edytuj</a></li>
									{/if}
									{if (\core\RoleUtils::inRole("Captain") && \core\SessionUtils::load("clid", true) == $c['club_id']) || \core\RoleUtils::inRole("Administrator")}
										<li><a href="{$conf->action_url}clubDelete/{$c['club_id']}" class="button small">Usuń</a></li>
									{/if}

									{if (\core\RoleUtils::inRole("Player") && \core\SessionUtils::load("clid", true) == $c['club_id'])}
										<li><a href="{$conf->action_url}clubLeave/{$c['club_id']}" class="button small">Opuść</a></li>
									{/if}
									</ul>
								</td> 
							</tr>
						{/strip}
					{/foreach}
					</tbody>
				</table>
				<div class="col-6 col-12-xsmall">
					{if $page > 1}
						<a href="{$conf->action_url}clubList?page={$page - 1}" class="button small primary"><b><</b></a>
					{/if}
					{if $page < $num_pages}
						<a href="{$conf->action_url}clubList?page={$page + 1}" class="button small primary"><b>></b></a>
					{/if}
				</div>
			</div>
		</section>

	</div>
</div>

{/block}
