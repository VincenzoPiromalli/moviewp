<?php
/*
* ----------------------------------------------------
* @author: fr0zen
* @author URI: https://fr0zen.store
* @copyright: (c) 2022 Vincenzo Piromalli. All rights reserved
* ----------------------------------------------------
* @since 3.8.7
* 20 May 2022
*/

$id = $_GET['id'];
$sv = $_GET['sv'];
$season = $_GET['s'];
$episode = $_GET['e'];
$string = 'emarfi';
$film = strrev ( $string );
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		
		<style>
			
			body, html{
			background:transparent url(//i.imgur.com/IGuF7mW.gif) no-repeat fixed center;
			position: fixed;
			top: 0px;
			left: 0px;
			width: 100%;
			height: 100%;
			z-index: 200;
			}
			
			#player{
			position: fixed;
			top: 0px;
			left: 0px;
			width: 100%;
			height: 100%;
			z-index: 100;
			}
		</style>
	</head>
	<body>
		<<?php echo $film; ?> id="player" src="getPlayTV.php?id=<?php echo $id; ?>&s=<?php echo $season; ?>&e=<?php echo $episode; ?>&sv=<?php echo $sv; ?>&playtv=true" scrolling="no" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen></<?php echo $film; ?>>
	</body>
</html>