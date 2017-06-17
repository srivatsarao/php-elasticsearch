<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Games library :: ElasticSearch</title>
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url('css');?>style.css">
</head>
<body>

<div id="container">
	<h1>Games Library</h1>

	<div id="body">
		<form method="GET" action="<?php echo site_url();?>welcome/search" name="search_form" id="searchForm">
			<input type="text" name="search" value="Enter title, developer or genre">
			<button type="submit">Search</button>
		</form>

		<?php if(isset($results))
		{ 
			foreach($results as $result){
		?>
		<div>
			<div><h2><?php echo $result['title']; ?></h2></<div>
			<div>Developer: <?php echo $result['developer']; ?></<div>
			<div>Genre: <?php echo $result['genres']; ?></<div>
		</div>
		<?php 
			}
		} 
		?>
	</div>

	
</div>

</body>
</html>