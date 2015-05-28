<!DOCTYPE html>
<html>
<head>
<style>
th { text-align: left; }
body{
	background-image:url("////art/images/craft_tool_window.png");
	background-repeat: no-repeat;
}
</style>
<body>

<?php

	$servername = "localhost";
	$username = "root";
	$password = "abc123";

	$connection = new mysqli($servername, $username, $password);

	if($connection->connect_error) 
	{
		die("Connection failed: " . $connection->connect_error);
	}

if(isset($_GET['ContainerID']))
{

	$ObjectXML = simpleXML_load_file("xml\objects_types.xml") or die("Error: Cannot Open XML file Object Types");


	echo("Connected Successfully<br>");

	$sql = "SELECT * FROM lif_1.items WHERE ContainerID = ".$_GET['ContainerID'].";";
	$result = $connection->query($sql);
	echo('<table style="width:100%">');
	echo("<tr>");
	echo("	<th>ID</th>");
	echo("	<th>ContainerID</th>");
	echo("	<th>ObjectTypeID</th>");
	echo("	<th>Icon</th>");
	echo("	<th>Quality</th>");
	echo("	<th>Quantity</th>");
	echo("	<th>Durability</th>");
	echo("	<th>MaxDurability</th>");
	echo("</tr>");
	foreach($result as $row)
	{
		echo("<tr>");
		$rowpos = 0;
		foreach($row as $value)
		{
			$rowpos++;
			echo("<td valign='center'>");
			echo($value);
			if($rowpos==3)
			{
				echo(": ");
				//echo($ObjectXML->row[$value-1]->Name);
				$xpathobject = $ObjectXML->xpath("row/ID[.=\"$value\"]/parent::*");
				$name = $xpathobject[0]->Name;
				echo($name);
				echo(" </td><td valign='center'> ");
				$imgurl=$xpathobject[0]->FaceImage;
				$imgurl=str_replace("\\","/",$imgurl);
				$imgurl=str_replace("2","TWO",$imgurl);
				echo("<a href='http://lifeisfeudal.gamepedia.com/index.php?search=".$name."'><img src='".$imgurl."' style='width:64px;height:64px;'></img></a>");
			}
			echo("</td>");
		}
		echo("</tr>");
	}
}

$sql2 = "SELECT DISTINCT ContainerID FROM lif_1.items;";
$result2 = $connection->query($sql2);

echo("<br>");
echo("Select A Container:<br>");
echo("<form name='ContainerForm' action='container.php' method='get'>");
echo("<select name='ContainerID'>");

foreach($result2 as $value2)
{
	echo("<option value='".$value2["ContainerID"]."'>".$value2["ContainerID"]."</option>");
}
echo("</select>");
echo("<input value='Select Container' type='submit'>");
echo("</form>");
?>
<form action="index.php"><input value="Main Menu" type="submit"></form>
<br>
<br>
</body>
</html>