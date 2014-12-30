<div class="container">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
			    	<h3 class="panel-title">Forum Fantasy Film</h3>
			  	</div>
			  	<div class="panel-body">
			  		<a href="<?php echo base_url().$this->module.'/'.$this->cname.'/reply/'.$thread[0]->id?>" class="btn btn-primary" style="margin-bottom:2%">Reply</a>
			  		<div class="panel panel-default">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3">
									<img src="<?php echo base_url().'public/assets/uploads/'.$thread[0]->img;?>" style="width:25%;height:30%"><br>
									<?php echo $thread[0]->uname;?><br>
									Join : <?php $date = explode(' ', $thread[0]->date); echo $date[0];?><br>
									<a href="#">Report</a>
								</div>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<h4><?php echo $thread[0]->title;?></h4>
									<?php echo $thread[0]->content;?>
									<div class="pull-right" style="margin-top:5%">
										<?php if($sesi == $thread[0]->us_id){
										?>
										<a href="<?php echo base_url().$this->module.'/'.$this->cname.'/form_forum/'.$thread[0]->id?>">Edit |</a>
										<?php }?>
										<a href="#">Report</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php foreach ($reply as $key => $value) {
					?>
					<div class="panel panel-default"> 
						<div class="panel-body">
							<div class="col-md-3 col-sm-3 col-xs-3">
								<img src="<?php echo base_url().'public/assets/uploads/'.$value->img;?>" style="width:25%;height:30%"><br>
								<?php echo $value->uname;?><br>
								Join : <?php $date = explode(' ', $value->date); echo $date[0];?><br>
								<a href="#">Report</a>
							</div>
							<div class="col-md-9 col-sm-9 col-xs-9">
								<?php echo $value->content;?>
								<div class="pull-right" style="margin-top:9%">
									<?php $tgl = explode(' ',$value->tgl); echo $tgl[0];?>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
					<?php echo $paging;?>
			  	</div>
			</div>
		</div>
	</div>
</div>