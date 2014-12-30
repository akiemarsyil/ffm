<div class="container">
	<div class="block full" style="margin-top:10px;">
		<blockquote>
			<p><i class="icon-file-text"></i> Posting Thread</p>
		</blockquote>
		<?php echo $this->session->flashdata('flash_message'); ?>
			<?php
				if($aksi == 'add'){
			?>
			<form action="<?php echo base_url($this->module).'/'.$this->cname.'/do_reply';?>" method="post" enctype="multipart/form-data">
			<?php 
				}else{
			?>
			<form action="<?php echo base_url($this->module).'/'.$this->cname.'/edit_reply';?>" method="post" enctype="multipart/form-data">
			<?php } ?>
				<div class="row">
					<div class="col-md-2">
						<label>Judul : </label>
					</div>
					<div class="col-md-4">
						<input type="text" id="title" name="title" class="form-control" value="<?php //echo @$forum[0]->title;?>">
					</div>
				</div><br>

				<!-- <div class="row">
					<div class="col-md-2">
						<label>Image : </label>
					</div>
					<div class="col-md-4">
						<?php 
    						//if($user[0]->images!=null)
    					?>
    					<img class="col-md-3" src="<?php echo base_url().'public/assets/uploads/'.$user[0]->images; ?>">
						<input type="file" id="images" name="images">
    					<span class="help-block">Max file size = 1 Mb</span>
					</div>
				</div><br> -->

				<!-- <div class="row">
					<div class="col-md-2">
						<label>Kategori : </label>
					</div>
					<div class="col-md-4">
						<!-- <input type="text" id="address" name="address" class="form-control" value="<?php //echo @$user[0]->address;?>"> --
						<select id="categories" name="categories" class="form-control chosen-select">
							<option value="<?php echo $forum[0]->cat;?>"><?php echo $forum[0]->cat;?></option>
							<option value="action">Action</option>
							<option value="drama">Drama</option>
							<option value="comdey">Comedy</option>
							<option value="horor">Horor</option>
							<option value="thriller">Thriller</option>
						</select>
					</div>
				</div><br> -->
	
				<div class="row">
					<div class="col-md-2">
						<label>Content : </label>
					</div>
					<div class="col-md-12">
						<textarea name="isi" id="isi" class="ckeditor" cols="80"   rows='8' ><?php //echo @$forum[0]->content; ?></textarea>
					</div>
				</div><br>
	
				<div class="row">
					<div class="col-md-4">
						<input hidden id="id_current" name="id_current" value="<?php //echo @$forum[0]->id;?>">
						<input hidden id="id_thread" name="id_thread" value="<?php echo @$thread;?>">
						<input type="submit" class="btn btn-success" value="submit">
						<a href="<?php echo base_url().$this->module.'/'.$this->cname;?>" class="btn btn-warning">Batal</a>
					</div>
				</div>
			</form>
	</div>
</div>
