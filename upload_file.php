<?php
include('class.upload.php');		
include('config.php');

$upload = new Upload($config);
		
if ( ! $upload->upload_file('datafile'))
{
	$error = array('error' => $upload->display_errors());

//	print_r($error);
}
else
{
	$data = array('upload_data' => $upload->data());

	//print_r($data);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd"
    >
<html lang="en">
<head>
    <head>
	<title>Apwot - Uploader File</title>
	<link href="<?php echo $config['base_url'];?>statics/css/jquery-ui.css" rel="stylesheet">
        <link href="<?php echo $config['base_url'];?>statics/css/bootstrap-combined.min.css" rel="stylesheet">
        <script src="<?php echo $config['base_url'];?>statics/js/html5.js"></script>
        <![endif]-->
        <script type="text/javascript" src="<?php echo $config['base_url'];?>statics/js/jquery.validate.js"></script>
        <script src="<?php echo $config['base_url'];?>statics/js/jquery.min.js"></script>
	<script src="<?php echo $config['base_url'];?>statics/js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo $config['base_url'];?>statics/js/tiny_mce/tiny_mce_popup.js"></script>
        <script type="text/javascript" src="<?php echo $config['base_url'];?>statics/js/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript" src="<?php echo $config['base_url'];?>statics/js/tiny_mce/plugins/apwot/js/uploader.js"></script>
	<script type="text/javascript" src="<?php echo $config['base_url'];?>statics/js/tiny_mce/plugins/apwot/js/dialog.js"></script>
</head>
<style>
	body{
		background-color: #F0F0F0;
		width: 450px;
	}
</style>

</head>
<body>
<!-- preview image -->
<?php if(isset($error)){
    echo $error;
    } else { ?>
<form id="myForms" name="myForms" onsubmit="Apwot.insert();return false;" action="#">
	<p></p>
        <p><img src="<?php echo $config['base_url_image']."/".$data['upload_data']['file_name'];?>" width="100px;" height="100px;"></p>
	<p>Image name : <?php echo $data['upload_data']['file_name'];?></p>
	<p>Url Image: <a href='http://new.<?php echo $config['base_url_image'].$data['upload_data']['file_name']; ?>'><?php echo $config['base_url_image'].$data['upload_data']['file_name']; ?></a></p>
	<input type="text" id="imagename" name="imagename" style="display: none;" value="<?php echo $config['base_url_image'].$data['upload_data']['file_name']; ?>" />
	<p><input id="someval" name="someval" type="text" style="display: none; width: 1000px;" class="text" value="<?php echo $config['base_url_image'].$data['upload_data']['file_name']; ?>" /></p>
	<div class="floatdiv">
	    <div class="fl_left">
		<p>Size</p>
		<p><input type="radio" name="imgSize" id="align" checked="checked" value="center" onchange="Apwot.imgSize('','');return false;"> Original</p>
		<p><input type="radio" name="imgSize" id="align" value="center" onchange="Apwot.imgSize('100','');return false;"> 100 </p>
		<p><input type="radio" name="imgSize" id="align" value="center" onchange="Apwot.imgSize('300','');return false;"> 300 </p>
		<p><input type="radio" name="imgSize" id="align" value="center" onchange="Apwot.imgSize('500','');return false;"> 500 </p>
		<input id="sizevalue" name="sizevalue" type="text" style="display: none;" value="" />

	    </div>
	    
	    <div class="fl_right">
		<p>Align: </p>
		<p><input type="radio" id="align" name="align" checked="checked" value="left" onchange="Apwot.align('left','');return false;"> Align Left </p>
		<p><input type="radio" name="align" id="align" value="right" onchange="Apwot.align('right','');return false;"> Align Right</p> 
		<p><input type="radio" name="align" id="align" value="center" onchange="Apwot.align('center','');return false;"> Align Center </p>
		<input id="alignvalue" name="alignvalue" type="text" style="display: none;" value="left" />
		
	    </div>
	</div>	
	
	<p>
	<div class="mceActionPanel">
		<input type="button" id="insert" name="insert" value="Insert" onclick="Apwot.insert('');return false;" />
		<input type="button" id="cancel" name="cancel" value="Cancel" onclick="tinyMCEPopup.close();" />
	
	
	</div>
	</p>
</form>

<?php } ?>
</body>
</html>