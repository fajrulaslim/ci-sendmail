<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Contoh Progress Bar Upload dengan Ajax dan Bootstrap 3</title>
	<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	
</head>
<body>
<div id="container">
	<h1>Contoh Progress Bar Upload dengan Ajax dan Bootstrap 3</h1>


	<div id="body">
		
		
		
	<?php
	if($this->session->userdata('status_upload')!=null){
	echo $this->session->userdata('status_upload');  // menampilkan pesan error upload
	}

	if($this->session->userdata('status_hapus')!=null){
	echo $this->session->userdata('status_hapus');  // menampilkan pesan error upload
	}

	if(!isset($page)){
		$this->load->view('daftar_file');
	} else{
		$this->load->view($page);
	}
	
	
	
	
	if($this->session->userdata('status_upload')!=null){ // menghapus pesan error upload
	$this->session->unset_userdata('status_upload');
	}

	if($this->session->userdata('status_hapus')!=null){ // menghapus pesan error upload
	$this->session->unset_userdata('status_hapus');
	}
	?>

	</div>

	<p class="footer">Visit My Blog <b><a href="http://ozs.web.id" target="_blank">http://ozs.web.id</a></b> :: Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/filestyle.js" type="text/javascript"></script>

<script>

function uploadFile() {
    var file = document.getElementById("fileku").files[0];
    var formdata = new FormData();
    formdata.append("file_nya", file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressUpload, false);
    ajax.open("POST", "<?php echo site_url('upload/do_upload');?>", true);
    ajax.send(formdata);
}

function progressUpload(event){
    var percent = (event.loaded / event.total) * 100;
    document.getElementById("progress-bar").style.width = Math.round(percent)+'%';    
    document.getElementById("status").innerHTML = Math.round(percent)+"% kumplit bro";
	if(event.loaded==event.total){
		window.location.href = '<?php echo base_url();?>';
	}
}

</script>


</body>
</html>
