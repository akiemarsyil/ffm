<div id="page-content" class="block" style="min-height:500px;">
		<div class="row">
			<div class="col-sm-12">
				<div class="block full" style="margin-top:10px;" id="tambah-div">
					<div class="row">
						<div class="col-sm-4">
							<blockquote>
								<p><i class="icon-file-text"></i> Pendaftaran Bioskop Malang</p>
							</blockquote>
						</div>
					</div>
					<?php echo $this->session->flashdata('flash_message'); ?>
					<form action="<?php echo base_url().'admin/tambah_bioskop';?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Nama</span>
								<input type="text" id="name" name="name" value="<?php echo @$val['name']; ?>" class="form-control">
								<span class="input-group-addon"><i class="glyphicon glyphicon-expand"></i></span>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon">Alamat</span>
								<input type="text" id="address" name="address" value="<?php echo @$val['name']; ?>" class="form-control">
								<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon">Telephone</span>
								<input type="text" id="telephone" name="telephone" value="<?php echo @$val['name']; ?>" class="form-control">
								<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon">Keterangan</span>
								<textarea id="description" name="description" value="<?php echo @$val['name']; ?>" class="form-control"></textarea>
								<span class="input-group-addon"><i class="glyphicon glyphicon-pushpin"></i></span>
							</div>
							<br>
							<div class="input-group">
    							<label>Image</label>
    							<input type="file" id="images" name="images">
    							<span class="help-block">Max file size = 1 Mb</span>
  							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
	// $('#formBioskop').submit(function(){
	// 	$.ajax({
	// 		type: "POST",
	// 		url: "<?php echo base_url($this->cname).'/tambah_bioskop'; ?>",
	// 		data: $('#formBioskop').serialize(),
	// 		success: function(msg)
	// 		{
	// 			data = msg.split("|");
	// 			if(data[0]==1){
	// 				clear();
	// 			}
	// 			$("#flash_message").show();
	// 			$("#flash_message").html(data[1]);
	// 			setTimeout(function() {$("#flash_message").hide();}, 5000);
	// 		}
	// 	});
	// 	return false;
	// });
</script>