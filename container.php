<?php
	include("header.html");

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
	?>

	<table style="width:100%">
	<tr>
		<th>ID</th>
		<th>ContainerID</th>
		<th>ObjectTypeID</th>
		<th>Icon</th>
		<th>Quality</th>
		<th>Quantity</th>
		<th>Durability</th>
		<th>MaxDurability</th>
	</tr>
	<?php
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
?>
<br>
Select A Container:<br>
<form name='ContainerForm' action='container.php' method='get'>
<select name='ContainerID' onchange='this.form.submit()'>

<?php
if(isset($_GET['ContainerID']))
{
	echo("<option value='".$_GET['ContainerID']."'>".$_GET['ContainerID']."</option>");
}
foreach($result2 as $value2)
{
	if(isset($_GET['ContainerID'])){
		if($_GET['ContainerID']!=$value2['ContainerID']){
			echo("<option value='".$value2["ContainerID"]."'>".$value2["ContainerID"]."</option>");
		}
	}else{
		echo("<option value='".$value2["ContainerID"]."'>".$value2["ContainerID"]."</option>");
	}
}
?>
</select>
<noscript><input class="btn btn-default" value='Select Container' type='submit'></noscript>
</form>
<a href="index.php" class="btn btn-default">Index</a>

<?php include("footer.html") ?>