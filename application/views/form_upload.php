<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

		<h2>Form Upload File</h2>
		<p>Gunakan form dibawah ini untuk mengupload file.</p>
		<form id="upload_form" enctype="multipart/form-data">
		
			<div class="form-group">
				<label>Pilih File</label>
				<input type="file" name="file_nya" id="fileku" class="filestyle" data-buttonText=" Cari file" data-iconName="fa fa-folder-open-o">
			</div>
			
			<div class="progress">
				  <div class="progress-bar" id="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%">
					<span id="status"></span>
				  </div>
			</div> 
			
			<div class="form-group">
				<button type="button" class="btn btn-primary" onclick="uploadFile()"><span class="glyphicon glyphicon-cloud-upload"></span> Upload !</button>
			</div>
   
		</form>
