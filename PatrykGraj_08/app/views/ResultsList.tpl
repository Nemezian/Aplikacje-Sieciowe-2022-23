{extends file="main.tpl"}

{block name=content}

	<h1 class="title">Lista wyników:</h1>
<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>Kwota</th>
		<th>Lata</th>
		<th>Procent</th>
		<th>Rata</th>
		<th>Data</th>
	</tr>
</thead>
<tbody>
{foreach $wynik as $p}
{strip}
	<tr>
		<td>{$p["kwota"]}</td>
		<td>{$p["ile_lat"]}</td>
		<td>{$p["procent"]}</td>
		<td>{$p["rata"]}</td>
		<td>{$p["data"]}</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}
