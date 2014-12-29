<?php foreach ($forum as $key => $value) {
?>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-6">
			<a href="<?php echo base_url().$this->module.'/'.$this->cname.'/forum_thread/'.$value->id;?>"><?php echo $value->title;?></a>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<?php echo $value->cat;?>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<?php echo $value->uname;?>
		</div>
	</div>
<hr>
<?php }?>	
<?php //echo $paging;?>