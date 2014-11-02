<div class="container">
	<div class="panel panel-default">
	  	<div class="panel-heading">
	    	<h3 class="panel-title">Informasi Film</h3>
	  	</div>
	  	<div class="panel-body">
	  		<div class="row" style="margin-left:auto;margin-right:auto">
	  			<div class="col-md-5 col-md-offset-4">
	  				<?php 
	  					if($detail[0]->image){
	  				?>
	  					<img src="<?php echo base_url().'public/assets/movie/'.$detail[0]->image;?>">
	  				<?php 
	  					}else{
	  						echo "No Image";
	  					}
	  				?>
	  			</div>
	  		</div>
	  		<br><br>
	    	<div class="form-group">
	    		<div class="row">
	    			<div class="col-md-3">
	    				<label class="control-label">Nama Film :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<input type="text" disabled class="form-control" value="<?php echo $detail[0]->film;?>">
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-3">
	    				<label class="control-label">Kategori :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<input type="text" disabled class="form-control" value="<?php echo $detail[0]->kategori;?>">
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-3">
	    				<label class="control-label">Sinopsis :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<input type="text" disabled class="form-control" value="<?php echo $detail[0]->sinopsis;?>">
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-3">
	    				<label class="control-label">Sutradara :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<input type="text" disabled class="form-control" value="<?php echo $detail[0]->sutradara;?>">
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-3">
	    				<label class="control-label">Tayang :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<input type="text" disabled class="form-control" value="<?php echo $detail[0]->tayang;?>">
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-3">
	    				<label class="control-label">Bioskop :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<input type="text" disabled class="form-control" value="<?php echo $detail[0]->bioskop;?>">
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-3">
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
		})
	});
</script>