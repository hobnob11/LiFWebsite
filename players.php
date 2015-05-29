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
			echo("<h4>".$players["Name"]." ".$players["LastName"]."</h4>");

			echo("<div id='datatable'><table border='1'><tr>");
			foreach($query->fetch_fields() as $coloum)
			{
				echo("<th style='text-align:center'>");
				echo($coloum->name);
				echo("</th>");
			}
			echo("</tr><tr>");
			foreach($players as $values)
			{
				echo("<td style='text-align:center'>");
				echo($values);
				echo("</td>");
			}
			echo("</tr></table></div>");
		}
	?>
</div>

<a href="index.php" class="btn btn-default">Index</a>
<iframe id="equipmentframe" src="" width=100% height=500px></iframe>

<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type='text/javascript'>
	var iframe = $("#equipmentframe")
	$( "#database" ).accordion({
    collapsible: true,
    active: false,
	activate: function(event,ui){
        if(ui && ui.newHeader[0]){
            console.log(ui.newHeader[0].innerText);
            iframe.attr("src","equipment.php?name="+ $(ui.newHeader).text());
        }
    }  

});
</script>



<?php include("footer.html") ?>