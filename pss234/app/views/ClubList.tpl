{extends file="main.tpl"}

{block name=top}

<div id="main" class="wrapper style1">
	<div class="container">
		<section>
		<h2>Lista klubów</h2>	
			<div class="row gtr-uniform gtr-50">
				<form id="search-form" action="{$conf->action_url}clubList" onsubmit="ajaxPostForm('search-form','{$conf->action_root}clubListPart','table'); return false;">
					<legend>Opcje wyszukiwania</legend>
					<div class="col-12">
						<input type="text" placeholder="Nazwa klubu" name="sf_clubname" /><br />
					</div>
					<div class="col-12">
						<button type="submit" class="button primary">Filtruj</button>
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
			<div id="table" class="table-wrapper">
				{include file="ClubListTable.tpl"}
			</div>
		</section>

	</div>
</div>

{/block}