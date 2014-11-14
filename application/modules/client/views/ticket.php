
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
	    	<h3 class="panel-title">Reservasi Ticket</h3>
	  	</div>
	  	<div class="panel-body">
	  		<div id="filter">
	  			<div class="row">
	  				<div class="col-md-2">
	  					<label>Bioskop</label>
	  				</div>
	  				<div class="col-md-4">
	  					<select id="cinema" name="cinema" class="chosen-select form-control">
	  						<option value=""></option>
	  						<?php foreach ($bioskop as $key => $value) {
	  						?>
	  						<option value="<?php echo $value->idCinemas;?>"><?php echo $value->name;?></option>
	  						<?php } ?>
	  					</select>
	  				</div>
	  			</div><br>

	  			<div class="row">
	  				<div class="col-md-2">
	  					<label>Film</label>
	  				</div>
	  				<div class="col-md-4">
	  					<select id="movie" name="movie" class="chosen-select form-control">
	  						
	  					</select>
	  				</div>
	  			</div><br>

	  			<div class="row">
	  				<div class="col-md-2">
	  					<input hidden type="text" id="user" name="user" value="<?php echo $user;?>">
	  					<button id="pesan" class="btn btn-primary">Pesan</button>
	  				</div>
	  			</div>

	  		</div>
	  		<div id="form" class="col-md-offset-3">


	  		</div>

	  	</div>
	</div>
</div>
<script type="text/javascript">
	
		$('#cinema').on('change',function(){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url($this->module).'/'.$this->cname.'/get_film'; ?>",
				data: {bioskop:$('#cinema').val()},
				success: function(msg)
				{
					// alert(msg);
					$('#movie').html(msg);
					$('#movie').trigger('chosen:updated');
				}
			});
			return false;
		});

		$("#pesan").on('click',function(){
			var cin = $('#cinema').val();
			var mov = $('#movie').val();
			var id = $('#user').val();
			if(mov != null){
				$('#filter').hide();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url($this->module).'/'.$this->cname.'/load_form_ticket'; ?>",
					data: {cinema:cin,
							movie:mov,
							id:id},
					success: function(msg)
					{
						// alert(msg);
						$('#form').html(msg);
						// $('#movie').trigger('chosen:updated');
					}
				});
				return false;
			}else{
				alert('Isi Filter terlebih dahulu');
			}
		});

</script>