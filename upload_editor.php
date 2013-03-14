<?php
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
	<script type="text/javascript">
		$(function() {
			$( "#tab" ).tabs();
		 });
	</script>
</head>
<style>
	body{
		background-color: #F0F0F0;
		width: 450px;
	}
	.member {
	    position: relative;
	    width: 422px;
	    margin: 0px 10px 10px 0px;
	    height: auto;
	}
	
	.floatdiv{
		width: 400px;	
	}
	
	.fl_left {
	    clear: left;
		float: left;
		position: relative;
		width: 200px;
	}
	
	.fl_right {
		clear: right;
		float: right;
		position: relative;
		width: 200px;
	}
</style>
<body>
<div id="tab" style="font-size:11px !important;">
<ul>
<li><a href="#tab-1">Upload File</a></li>
<li><a href="#tab-2">Media Library</a></li>
<li><a href="#tab-3">Author</a></li>
</ul>
<div id="tab-1">
<p>
	<form>
	<input type="file" name="datafile" /></br>
	<input type="button" value="upload"
		onClick="fileUpload(this.form,'/upload_file.php','upload'); return false;" >
	</form>
	<div id="upload" style="width: 450px !important;"></div>
	
</p>
</div>
<div id="tab-2">
<p>    <table class="">
		   <col style="width: 5%">
                    <col style="width: 30%">
                    <col style="width: auto">
		    <col style="width: 10%">
              <thead>
                <tr>
                  <th>&nbsp;</th>
                  <th align="left">Image</th>
                  <th align="left">Name</th>
		  <th align="left">Action</th>
                </tr>
              </thead>
              <tbody>
		<?php
		$allowed_file = "{*.".str_replace("|",",*.",$config['allowed_types'])."}";
		
		$images = glob($config['upload_path'] . $allowed_file, GLOB_BRACE);
		$i=0;
		foreach($images as $values) {
			$filename = str_replace($config['upload_path'],"",$values);
		?>
                <tr id="media-<?php echo $i;?>">
                  <td>&nbsp;</td>
                  <td><img src='<?php echo $config['base_url_image'].$filename;?>' width="75px" height="75px"></td>
                  <td><a target='_blank' href=''><?php echo $filename;?></a></td>
		  <td><a href="#media-<?php echo $i;?>" class="show-hide-reply-comment" data-commentid="<?php echo $i;?>">show</a></td>
		  
                </tr>
		<tr id="<?php echo $i;?>" style="display: none;" class="toggle-hide">
		<td>&nbsp;</td>
		<td valign="top">
			<input type="text" id="image<?php echo $i;?>" name="imagename-<?php echo $i;?>" style="display: none;" value="<?php echo $filename;?>" />
			<input id="someval<?php echo $i;?>" name="someval-<?php echo $i;?>" type="text" style="display: none; width: 1000px;" class="text" value="<?php echo $config['base_url_image'].$filename;?>" />
		<p>Size</p>
			<p><input type="radio" name="imgSize-<?php echo $i;?>" data-id="<?php echo $i;?>" id="align-<?php echo $i;?>" checked="checked" value="center" onchange="Apwot.imgSize('', <?php echo $i;?>);return false;"> Original</p>
			<p><input type="radio" name="imgSize-<?php echo $i;?>" data-id="<?php echo $i;?>" id="align-<?php echo $i;?>" value="center" onchange="Apwot.imgSize('100', <?php echo $i;?>);return false;"> 100 </p>
			<p><input type="radio" name="imgSize-<?php echo $i;?>" data-id="<?php echo $i;?>" id="align-<?php echo $i;?>" value="center" onchange="Apwot.imgSize('300', <?php echo $i;?>);return false;"> 300 </p>
			<p><input type="radio" name="imgSize-<?php echo $i;?>" data-id="<?php echo $i;?>" id="align-<?php echo $i;?>" value="center" onchange="Apwot.imgSize('500', <?php echo $i;?>);return false;"> 500 </p>
			<input id="sizevalue<?php echo $i;?>" name="sizevalue<?php echo $i;?>" data-id="<?php echo $i;?>" type="text" style="display: none;" value="" />
		<br><p><input type="button" id="insert" data-id="<?php echo $i;?>" name="insert" value="insert" onclick="Apwot.insert(<?php echo $i;?>);return false;" /></p>
		</td>
		<td valign="top">
		<p>Align: </p>
			<p><input type="radio" id="align-<?php echo $i;?>" data-id="<?php echo $i;?>" name="align-<?php echo $i;?>" checked="checked" value="left" onchange="Apwot.align('left', <?php echo $i;?>);return false;"> Align Left </p>
			<p><input type="radio" name="align-<?php echo $i;?>" data-id="<?php echo $i;?>" id="align-<?php echo $i;?>" value="right" onchange="Apwot.align('right', <?php echo $i;?>);return false;"> Align Right</p> 
			<p><input type="radio" name="align-<?php echo $i;?>" data-id="<?php echo $i;?>" id="align-<?php echo $i;?>" value="center" onchange="Apwot.align('center', <?php echo $i;?>);return false;"> Align Center </p>
			<input id="alignvalue<?php echo $i;?>" name="alignvalue<?php echo $i;?>" type="text" style="display: none;" value="left" />
		</td>
			<td>
			&nbsp;	
			</td>
		</tr>
		<?php
		$i++;
		} ?>
              </tbody>
            </table></p>
<ul></ul>
</div>
<div id="tab-3">
<p>Author : <a href='http://hardyantz.com/'>hardyantz</a> <a href='https://github.com/hardyantz'>github</a>.</p>
</div>
</div>
<br>
<script type="text/javascript">
	
	$('.show-hide-reply-comment').click(function(){
		var commentid = $(this).data('commentid');
		 $( ".toggle-hide" ).each(function(){
			$( this ).hide();
		      });
		$('#'+commentid).toggle('slow');
	     });
</script>
 
</body>
</html>
