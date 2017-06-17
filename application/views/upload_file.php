<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
        <form action="<?php echo site_url();?>upload_file/upload_file_data" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
            <span>Choose your file (.csv only):</span>
            <input type="file" class="form-control" name="userfile" id="userfile"  align="center"/>
            <span class="col-lg-offset-3 col-lg-9">
                <button type="submit" name="submit" class="btn btn-info">Save</button>
            </span>
        </form>
    </div> 
</div>

</body>
</html>
