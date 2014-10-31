<div class="container">
	<div class="panel panel-default">
	  	<div class="panel-heading">
	    	<h3 class="panel-title">Data Member</h3>
	  	</div>
	  	<div class="panel-body">
	  		<div class="row" style="margin-left:auto;margin-right:auto">
	  			<div class="col-md-5">
	  				<?php 
	  					if($user[0]->images){
	  				?>
	  					<img src="<?php echo base_url().'public/assets/uploads/'.$user[0]->images;?>">
	  				<?php 
	  					}else{
	  						echo "No Image";
	  					}
	  				?>
	  			</div>
	  		</div>
	  		<br><br>
	  		<div id="flash_message"></div>
	    	<div class="form-group">
	    		<div class="row">
	    			<div class="col-md-3">
	    				<label class="control-label">Nama :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<input type="text" disabled class="form-control" value="<?php echo $user[0]->name;?>">
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-3">
	    				<label class="control-label">Alamat :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<input type="text" disabled class="form-control" value="<?php echo $user[0]->address;?>">
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-3">
	    				<label class="control-label">Username :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<input type="text" disabled class="form-control" value="<?php echo $user[0]->username;?>">
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-3">
	    				<label class="control-label">Status :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<!-- <input type="text" disabled class="form-control" value="<?php echo $user[0]->sutradara;?>"> -->
	    				<select id="status" name="status" class="form-control">
	    					<option value=""><?php if($user[0]->isAktif == 'yes'){ echo "--Aktif--";}else{echo "--Non Aktif--";}?></option>
	    					<option value="yes">Aktif</option>	
	    					<option value="no">Non Aktif</option>	
	    				</select>
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-3">
	    				<label class="control-label">Status Admin :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<!-- <input type="text" disabled class="form-control" value="<?php echo $user[0]->tayang;?>"> -->
	    				<select id="lvl" name="lvl" class="form-control">
	    					<option value=""><?php if($user[0]->level == '1'){ echo "--Admin--"; }else{echo "--Member--";}?></option>
	    					<option value="1">Admin</option>	
	    					<option value="0">Member</option>	
	    				</select>
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-4">
	    				<a id="edit" class="btn btn-success">Simpan</a>
	    				<a id="button" class="btn btn-warning">Kembali</a>
	    			</div>
	    		</div><br><br>
	    	</div>
	  	</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#button').on('click',function(){
			// similar behavior as clicking on a link
			window.location.href = "<?php echo base_url().$this->module.'/'.$this->cname.'/film';?>";
		});

		$('#edit').on('click',function(){
			var stat = $('#status').val();
			var lvl = $('#lvl').val();
			$.ajax({
			type: "POST",
			url: "<?php echo base_url($this->module).'/'.$this->cname.'/edit_user'; ?>",
			// data: $('#form_akademik').serialize(),
			data: { stat:stat,
					lvl:lvl}
			success: function(msg)
				{
					data = msg.split("|");
					if(data[0]==1){
						// clear();
					}
					$("#flash_message").show();
					$("#flash_message").html(data[1]);
					setTimeout(function() {$("#flash_message").hide();}, 5000);
				}
			});
		});
	});
</script>