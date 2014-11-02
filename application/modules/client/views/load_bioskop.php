<?php
	if($bioskop == null){
		echo "tidak ada data";
	}
	foreach ($bioskop as $key => $value) {
?>
<div class="panel panel-default">
	<div class="panel-heading">
			<h3 class="panel-title"></h3><?php echo $value->name;?></h3>
	</div>
	<div class="row">
		<div class="col-md-4">
			<a href="<?php echo base_url().$this->module.'/'.$this->cname.'/detail_cinema/'.$value->idCinemas;?>">
				<img src="<?php echo base_url().'public/assets/cinema/'.$value->images;?>">
			</a>
		</div>
		<div class="col-md-6">
			<?php echo cut_word($value->description,100);?>
			<a href="<?php echo base_url().$this->module.'/'.$cname.'/detail_cinema/'.$value->idCinemas;?>" style="position:relative" class="btn btn-primary pull-right">Detail</a>
		</div>
	</div>
</div>
<?php 
	}
?>