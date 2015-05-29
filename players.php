<?php include("header.html") ?>

<div id="database">
	<?php
	
		$servername = "localhost";
		$username = "root";
		$password = "abc123";

		$connection = new mysqli($servername, $username, $password);

		if($connection->connect_error) 
		{
			die("Connection failed: " . $connection->connect_error);
		}
		echo("Connected Successfully<br>");
		
		$sql="SELECT * FROM lif_1.character;";
		echo($sql."<br>");
		$query = $connection->query($sql);

		foreach($query as $players)
		{
			echo($players["Name"]." ".$players["LastName"]);

			echo("<div id='datatable'><table border='1'><tr>");
			foreach($query->fetch_fields() as $coloum)
			{
				echo("<th style='text-align:center'>");
				echo(" ".$coloum->name." ");
				echo("</th>");
			}
			echo("</tr><br><tr>");
			foreach($players as $values)
			{
				echo("<td style='text-align:center'>");
				echo($values);
				echo("</td>");
			}
			echo("</tr></table></div><br>");
		}
	?>
</div>

<a href="index.php" class="btn btn-default">Index</a>

<?php $player="Hobnob"; ?>

<div id="equipment">
	<div id="name"><?php echo($player);?></div>
</div>

<?php include("footer.html") ?>