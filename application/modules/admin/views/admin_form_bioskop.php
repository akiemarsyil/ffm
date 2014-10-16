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
					<?php
						if($aksi == 'add'){

					?>
					<form action="<?php echo base_url().'admin/tambah_bioskop';?>" method="post" enctype="multipart/form-data">
					<?php 
						}else{
					?>
					<form action="<?php echo base_url().'admin/edit_bioskop';?>" method="post" enctype="multipart/form-data">
					<?php } ?>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">Nama</span>
								<input type="text" id="name" name="name" value="<?php echo @$bioskop[0]->name; ?>" class="form-control">
								<span class="input-group-addon"><i class="glyphicon glyphicon-expand"></i></span>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon">Alamat</span>
								<input type="text" id="address" name="address" value="<?php echo @$bioskop[0]->address; ?>" class="form-control">
								<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon">Telephone</span>
								<input type="text" id="telephone" name="telephone" value="<?php echo @$bioskop[0]->telephone; ?>" class="form-control">
								<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon">Keterangan</span>
								<textarea id="description" name="description" class="form-control"><?php echo @$bioskop[0]->description; ?></textarea>
								<span class="input-group-addon"><i class="glyphicon glyphicon-pushpin"></i></span>
							</div>
							<br>
							<div class="input-group">
    							<label>Image</label>
    							<?php 
    								if(@$bioskop[0]->images){
    							?>
    							<br><img src="<?php echo base_url().'public/assets/cinema/'.$bioskop[0]->images;?>" style="height:150px;widht:150px">
    							<?php } ?>
    							<input type="file" id="images" name="images">
    							<span class="help-block">Max file size = 1 Mb</span>
  							</div>
						</div>
						<div class="form-group">
							<!-- Untuk menu edit -->
							<input hidden id="img_old" name="img_old" value="<?php echo @$bioskop[0]->images;?>">
							<input hidden id="id_current" name="id_current" value="<?php echo @$bioskop[0]->idCinemas;?>">
							<!-- Tombol aksi -->
							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="<?php echo base_url($this->cname); ?>" class="btn btn-warning">Batal</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>