<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Play Arena</title>
	<link rel="stylesheet" href="{$conf->app_url}/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body style="margin: 20px;">

<ul class="nav justify-content-center">
<li class="nav-item">
    <a class="nav-link active" href="{$conf->action_root}homePage">Strona główna</a>
  </li>
{if count($conf->roles)>0}
  <li class="nav-item">
    <a class="nav-link active" href="{$conf->action_root}clubList">Lista klubów</a>
  </li>
{/if}
{if \core\RoleUtils::inRole("Player")}
  <li class="nav-item">
    <a class="nav-link active" href="{$conf->action_root}playerStatList">Statystyki zawodników</a>
  </li>
  <li class="nav-item">
  <a class="nav-link active" href="{$conf->action_root}listMatch">Mecze</a>
  </li>
{/if}
{if count($conf->roles)==0}
  <li class="nav-item">
    <a class="nav-link" href="{$conf->action_root}registrationShow">Rejestracja</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{$conf->action_root}loginShow">Logowanie</a>
  </li>
{else}
  <li class="nav-item">
    <a class="nav-link" href="{$conf->action_root}logout">Wyloguj</a>
  </li>
{/if}
</ul>

{block name=top} {/block}

{block name=messages}

{if $msgs->isMessage()}
<div class="messages bottom-margin">
	<ul>
	{foreach $msgs->getMessages() as $msg}
	{strip}
		<li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
	{/strip}
	{/foreach}
	</ul>
</div>
{/if}

{/block}

{block name=bottom} {/block}

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>