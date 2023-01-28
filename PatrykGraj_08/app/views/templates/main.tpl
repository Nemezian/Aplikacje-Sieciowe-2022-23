<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{$page_description|default:"Opis domyślny"}">
	<meta name="author"      content="Patryk Graj">
	
	<title>{$page_title|default:"Kalkulator kredytowy"}</title>

	<link rel="shortcut icon" href="{$conf->app_url}/images/gt_favicon.png">
	
	<!-- Bootstrap itself -->
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!-- Custom styles -->
	<link rel="stylesheet" href="{$conf->app_url}/css/magister.css">

	<!-- Fonts -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
</head>

<!-- use "theme-invert" class on bright backgrounds, also try "text-shadows" class -->
<body class="theme-invert">

<div>
<a href="{$conf->action_root}loginShow" >Kalkulator</a>
</div>


			<ul>
				<li><a class="active" href="{$conf->action_root}calcShow" >Kalkulator</a></li>
				<li><a href="{$conf->action_root}results" >Lista wyników</a></li>
				<li><a href="{$conf->action_root}loginShow">Zaloguj</a></li>
			</ul>


	<div class="container">

		{block name=content} Domyślna treść zawartości .... {/block}
            
	</div>

<!-- Load js libs only when the page is loaded. -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="{$conf->app_url}/js/modernizr.custom.72241.js"></script>
<!-- Custom template scripts -->
<script src="{$conf->app_url}/js/magister.js"></script>
</body>
</html>