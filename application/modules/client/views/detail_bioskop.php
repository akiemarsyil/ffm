<div class="container">
	<div class="block full" style="margin-top:10px;">
		<blockquote>
			<p><i class="icon-file-text"></i> Informasi Detail Bioskop</p>
		</blockquote>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo $bioskop[0]->name;?></h3>
			</div>
			<div class="panel-body">
	  		<div class="row" style="margin-left:auto;margin-right:auto">
	  			<div class="col-md-5 col-md-offset-4">
	  				<?php 
	  					if($bioskop[0]->images){
	  				?>
	  					<img src="<?php echo base_url().'public/assets/cinema/'.$bioskop[0]->images;?>">
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
	    				<label class="control-label">Nama Bioskop :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<input type="text" disabled class="form-control" value="<?php echo $bioskop[0]->name;?>">
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-3">
	    				<label class="control-label">Alamat :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<input type="text" disabled class="form-control" value="<?php echo $bioskop[0]->address;?>">
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-3">
	    				<label class="control-label">Telephone :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<input type="text" disabled class="form-control" value="<?php echo $bioskop[0]->telephone;?>">
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-3">
	    				<label class="control-label">Keterangan :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<textarea disabled class="form-control"><?php echo $bioskop[0]->description;?></textarea>
	    			</div>
	    		</div><br><br>
	    		<div class="row">
	    			<div class="col-md-3">
	    				<input hidden id="id_current" name="id_current" value="<?php echo @$bioskop[0]->idCinemas;?>">
	    				<a id="button" class="btn btn-warning">Kembali</a>
	    			</div>
	    		</div><br><br>
	    	</div>
	    	<div class="well well-sm">
	    		Komentar
	    	</div>
	    	<div id="com">	
	    	<div id="flash_message"></div>
	    		<?php 
	    			if($rating == null){
	    				echo "Tidak ada Data";
	    			}
	    			foreach ($rating as $key => $value) {
	    		?>
	    		<div class="row">
	    			<div class="col-md-6 col-md-offset-3">
	    				<div class="panel panel-warning">
							<div class="panel-heading">
								<h3 class="panel-title"><?php echo $value->by;?></h3>
							</div>
							<div class="panel-body">
							<?php echo $value->comment;?>
							</div>
						</div>
	    			</div>
	    		</div> 
	    		<?php
	    			}
	    		?>
	    		<div class="row">
	    			<div class="col-md-3">
	    				<a id="komen" class="btn btn-primary">Komentar</a>
	    			</div>
	    		</div>
	    	</div>
	    	<div id="input_com">
	    		<div class="input-group">
  					<span class="input-group-addon">Rating</span>
  					<select id="rat" name="rat" class="chosen-select form-control">
  						<option value="0">Buruk</option>
  						<option value="1">Cukup </option>
  						<option value="2">Rata-Rata</option>
  						<option value="3">Baik</option>
  						<option value="4">Memuaskan</option>
  					</select>
  					<!-- <span class="input-group-addon"><i class="glyphicon glyphicon-film"></i></span> -->
  				</div><br>
  				<div class="row">
  					<div class="col-md-3">
	    				<label class="control-label">Oleh :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<input type="text" id="by" name="by" class="form-control">
	    			</div>
  				</div><br>
  				<div class="row">
  					<div class="col-md-3">
	    				<label class="control-label">Komentar :</label>
	    			</div>
	    			<div class="col-md-6">
	    				<textarea id="coment" name="coment" class="form control"></textarea>
	    			</div>
  				</div><br>
  				<div class="input-group">
  					<a id="sent_com" class="btn btn-success">Submit</a>
  				</div>
	    	</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function begin(){
		$('#input_com').hide();
	}
	function clear(){
		$('#id_current').val('');
		$('#coment').val('');
		$('#rat').val('');
		$('#by').val('');
	}
	$(document).ready(function(){
		begin();
		$('#button').on('click',function(){
			// similar behavior as clicking on a link
			window.location.href = "<?php echo base_url().$this->module.'/'.$this->cname.'/cinema';?>";
		});

		$('#komen').on('click',function(){
			$('#com').hide();
			$('#input_com').show();
		});

		$('#sent_com').on('click',function(){
			$('#com').show();
			$('#input_com').hide();
			var rate = $('#rat').val();
			var com = $('#coment').val();
			var id = $('#id_current').val();
			var by = $('#by').val();
			$.ajax({
			type: "POST",
			url: "<?php echo base_url($this->module).'/'.$this->cname.'/do_comment'; ?>",
			// data: $('#form_akademik').serialize(),
			data: { rate:rate,
					com:com,
					id:id,
					by:by },
			success: function(msg)
				{
					data = msg.split("|");
					if(data[0]==1){
						clear();
					}
					$("#flash_message").show();
					$("#flash_message").html(data[1]);
					setTimeout(function() {$("#flash_message").hide();}, 5000);
				}
			});
		});
	});
</script>