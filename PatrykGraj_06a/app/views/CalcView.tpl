{extends file="main.tpl"}

{block name=content}

	<div class="row">
	<div class="col-md-12 col-lg-9  col-lg-offset-1 text-center">	

	<h1 class="title">Kalkulator kredytowy</h1>

	<form action="{$conf->action_root}calcCompute" method="post">
		<fieldset>
			<label for="x" class="text-shadows">Kwota kredytu:</label>
			<input id="x" type="text" placeholder="wartość x" name="x" value="{$form->x}">
			
			<label for="y" class="text-shadows">Na ile lat?:</label>
			<input id="y" type="text" placeholder="wartość y" name="y" value="{$form->y}"></br>

			<label for="interest" class="text-shadows">Oprocentowanie w skali roku:</label>
					<select id="interest" name="interest" class="form-select">

{if isset($res->interest_name)}
<option value="{$form->interest}">ponownie: {$res->interest_name}</option>
<option value="" disabled="true">---</option>
{/if}
						<option value="2procent">2%</option>
						<option value="25procent">2.5%</option>
						<option value="3procent">3%</option>
						<option value="35procent">3.5%</option>
					</select></br>

			<button type="submit" class="btn btn-default">Oblicz</button>
		</fieldset>
	</form>
</div>


<div class="col-md-2 col-lg-10">

{* wyświeltenie listy błędów, jeśli istnieją *}
{if $msgs->isError()}
		<h4 class="text-shadows">Wystąpiły błędy: </h4>
		<ol class="text-shadows">
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if $msgs->isInfo()}
		<h4 class="text-shadows">Informacje: </h4>
		<ol class="text-shadows">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{if isset($res->result)}
	<h4 class="text-shadows">Rata:</h4>
	<p class="text-shadows">
	{$res->result}
	</p>
{/if}

</div>
</div>

{/block}