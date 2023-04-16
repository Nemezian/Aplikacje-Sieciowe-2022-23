<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<title>Play Arena</title>
	<link rel="stylesheet" href="{$conf->app_url}/css/style.css" />
	<link rel="stylesheet" href="{$conf->app_url}/css/main.css" />
	<noscript><link rel="stylesheet" href="{$conf->app_url}/css/noscript.css" /></noscript>
	</head>

	<body class="is-preload landing">
		<div id="page-wrapper">

			<!-- Header -->
			<header id="header">
				<h1 id="logo"><a href="{$conf->action_root}homePage">Play arena</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="{$conf->action_root}homePage">Strona główna</a></li>
						{if count($conf->roles)>0}
						<li><a href="{$conf->action_root}clubList">Lista klubów</a></li>
						{/if}
						{if \core\RoleUtils::inRole("Player") || \core\RoleUtils::inRole("Captain") || \core\RoleUtils::inRole("Administrator")}
						<li><a href="{$conf->action_root}playerStatList">Statystyki zawodników</a></li>
						<li><a href="{$conf->action_root}listMatch">Mecze</a></li>
						{/if}
						{if count($conf->roles)==0}
						<li><a href="{$conf->action_root}registrationShow">Rejestracja</a></li>
						<li><a href="{$conf->action_root}loginShow" class="button primary">Logowanie</a></li>
						{else}
						<li><a href="{$conf->action_root}logout">Wyloguj</a></li>
						{/if}
					</ul>
				</nav>
			</header>
			
			{block name=top} {/block}

			{block name=messages}

					{if $msgs->isMessage()}
					<div class="col-6 col-12-xsmall">
						<ul>
						{foreach $msgs->getMessages() as $msg}
						{strip}
							<ol class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</ol>
						{/strip}
						{/foreach}
						</ul>
					</div>
					{/if}
			{/block}
					
			{block name=bottom} {/block}			

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="https://github.com/Nemezian/" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
					</ul>
					<ul class="copyright">
						<li>Autor: Patryk Graj</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="{$conf->app_url}/js/jquery.min.js"></script>
			<script src="{$conf->app_url}/js/jquery.scrolly.min.js"></script>
			<script src="{$conf->app_url}/js/jquery.dropotron.min.js"></script>
			<script src="{$conf->app_url}/js/jquery.scrollex.min.js"></script>
			<script src="{$conf->app_url}/js/browser.min.js"></script>
			<script src="{$conf->app_url}/js/breakpoints.min.js"></script>
			<script src="{$conf->app_url}/js/util.js"></script>
			<script src="{$conf->app_url}/js/main.js"></script>

	</body>
</html>