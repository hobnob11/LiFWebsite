<!DOCTYPE html>
<html>
<head>
<style>

#equipment{
	width:350px; 
	height:579px;
	background-image:url("art/gui/equipment/eq_background.png");
	}
#name{
	position:relative;
	width:100%;
	height:16px;
	text-align:center;
	padding-top:20px;
}
		
</style>

</head>
<body>

<form action="index.php"><input value="Main Menu" type="submit"></form>

<?php $player="Hobnob"; ?>

<div id="equipment">
	<div id="name"><?php echo($player);?></div>
	
	
	
</div>

</body>
</html>