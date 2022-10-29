{extends file="../templates/main.tpl"}


{block name=content}


	<div class="row">
	<div class="col-md-12 col-lg-9  col-lg-offset-1 text-center">	

	<h1 class="title">Kalkulator kredytowy</h1>

	<form action="{$app_url}/app/calc.php" method="post">
		<fieldset>
			<label for="x" class="text-shadows">Kwota kredytu:</label>
			<input id="x" type="text" placeholder="wartość x" name="x" value="{$form['x']}">
			<label for="y" class="text-shadows">Na ile lat?:</label>
			<input id="y" type="text" placeholder="wartość y" name="y" value="{$form['y']}"></br>

			<label for="interest" class="text-shadows">Oprocentowanie w skali roku:</label>
					<select id="interest" name="interest" class="form-select">

{if isset($form['interest_name'])}
<option value="{$form['interest']}">ponownie: {$form['interest_name']}</option>
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
{if isset($messages)}
	{if count($messages) > 0} 
		<h4 class="text-shadows">Wystąpiły błędy: </h4>
		<ol class="text-shadows">
		{foreach  $messages as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if isset($infos)}
	{if count($infos) > 0} 
		<h4 class="text-shadows">Informacje: </h4>
		<ol class="text-shadows">
		{foreach  $infos as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{if isset($result)}
	<h4 class="text-shadows">Rata:</h4>
	<p class="text-shadows">
	{$result}
	</p>
{/if}

</div>
</div>

{/block}