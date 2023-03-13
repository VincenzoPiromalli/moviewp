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
		<<?php echo $film; ?> id="player" src="getPlay.php?id=<?php echo $id; ?>&sv=<?php echo $sv; ?>&play=true" scrolling="no" frameborder="0" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen=""></<?php echo $film; ?>>
	</body>
</html>