<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">

<div id="equipment">
	<div id="name">
	<?php 
		if(isset($_GET["name"]))
		{
			echo($_GET["name"]);
		}else{
			echo("NO GET DATA YUDODIS");
		}
	?>
    </div>
</div>
<div>
    <div id="armor" style="right: 0px; top: 0px; position: absolute; width: 487px">
        <iframe id="armorframe" src="" width=100% height=200px></iframe>
    </div>
    <div id="inventory">
    	
    </div>
</div>