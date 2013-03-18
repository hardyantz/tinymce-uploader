apwot
=====

Apwot is A tinyMCE plugin for file Uploader
APWOT is a tinymce plugin for upload file, this plugin is simple as its be, simply for modification and installation.
Apwot, is a weird name actually, I created this when I was develop something in my project, 
I try to find upload image plugin for tinymce and its hard to find. and then i try to create it myself, 
and share this plugins in github to everyone maybe, 
this is how to install the plugins:
- download source here (of course)
- extract plugin wherever you like.
- move apwor folder to tinymce plugin (tinymce/plugins/apwot)
- move file : class.upload.php, config.php, upload_editor.php, upload_file.php and statics folder
- set your configuration in config.php file. 
- open editor_plugin.js its located in ( tinymce/plugins/apwot )
- change the window popup url in line 27 :
window.open("upload_editor.php", ......
- set tinymce.init inside head tag in your index file or whatever file you wish to create your tinymce editor, add tinymce.init :
tinyMCE.init({
  .....
        plugins : "...,apwot", 
  theme_advanced_buttons1:"....,apwot",
        .....
});
- no try open your editor and upload your file.

dont forget to say 'thanks' to me if its success and usefull for you.

author :
hardyantz, inc 

http://hardyantz.com

http://hardyantz.com/2013/03/18/apwot-a-tinymce-plugin-for-upload-image-english-ver/
