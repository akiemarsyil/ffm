<?php $user = $this->session->userdata('swhpsession');?>
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
									<a href="#" data-toggle="modal" data-target="#user">Report</a>
								</div>
								<div class="col-md-9 col-sm-9 col-xs-9">
									<h4><?php echo $thread[0]->title;?></h4>
									<?php echo $thread[0]->content;?>
									<div class="pull-right" style="margin-top:5%">
										<?php if($sesi == $thread[0]->us_id){
										?>
										<a href="<?php echo base_url().$this->module.'/'.$this->cname.'/form_forum/'.$thread[0]->id?>">Edit |</a>
										<?php }?>
										<a href="#" data-toggle="modal" data-target="#thread">Report</a>
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

<!-- modal report thread -->
<div class="modal fade" id="thread" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">Complain Thread</h4>
      		</div>
      		<div class="modal-body">
        		<!-- <form id="complain_thread"> -->
        			<div class="row">
        				<div class="col-md-4">
  							  	<label>Username :</label>
        				</div>
        				<div class="col-md-6">
        					<input type="text" class="form-control" id="uname" value="<?php echo $user[0]->username;?>" disabled>
        					<input hidden type="text" value="<?php echo $thread[0]->us_id;?>" id="us_id">
        					<input hidden type="text" value="<?php echo $thread[0]->id;?>" id="thread_id">
        					<input hidden type="text" value="thread" id="t_hread">
        				</div>
        			</div><br>
        			<div class="row">
        				<div class="col-md-4">
  							<label>Pesan :</label>
        				</div>
        				<div class="col-md-6">
        					<textarea class="form-control" rows="3" id="pesan"></textarea>
        				</div>
        			</div>
        		<!-- </form>	 -->
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" id="comp_thread">Save changes</button>
      		</div>
    	</div>
  	</div>
</div>

<!-- modal report user -->
<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        		<h4 class="modal-title" id="myModalLabel">Complain User</h4>
      		</div>
      		<div class="modal-body">
        		<div class="row">
        			<div class="col-md-4">
  						  	<label>Username :</label>
        			</div>
        			<div class="col-md-6">
        				<input type="text" class="form-control" id="un_ame" value="<?php echo $user[0]->username;?>" disabled>
        				<input hidden type="text" value="<?php echo $thread[0]->us_id;?>" id="us_er_id">
        				<input hidden type="text" value="<?php echo $thread[0]->id;?>" id="thr_ead_id">
        				<input hidden type="text" value="user" id="us_er">
        			</div>
        		</div><br>
        		<div class="row">
        			<div class="col-md-4">
  						<label>Pesan :</label>
        			</div>
        			<div class="col-md-6">
        				<textarea class="form-control" rows="3" id="pe_san"></textarea>
        			</div>
        		</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" id="comp_user">Save changes</button>
      		</div>
    	</div>
  	</div>
</div>


<script type="text/javascript">
	$('#comp_thread').on('click',function(){
		var uname = $('#uname').val();
		var us_id = $('#us_id').val();
		var thread_id = $('#thread_id').val();
		var pesan = $('#pesan').val();
		var status = $('#t_hread').val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url().$this->module.'/'.$this->cname.'/complain_forum/'; ?>",
			data: {uname:uname,us_id:us_id,thread_id:thread_id,pesan:pesan,stat:status},
			success: function(msg)
			{
				// $('#pph_21').val(msg);
				alert(msg);
			}
		});
		return false;
	})

	$('#comp_user').on('click',function(){
		var uname = $('#un_ame').val();
		var us_id = $('#us_er_id').val();
		var thread_id = $('#thr_ead_id').val();
		var pesan = $('#pe_san').val();
		var status = $('#us_er').val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url().$this->module.'/'.$this->cname.'/complain_user/'; ?>",
			data: {uname:uname,us_id:us_id,thread_id:thread_id,pesan:pesan,stat:status},
			success: function(msg)
			{
				// $('#pph_21').val(msg);
				alert(msg);
			}
		});
		return false;
	})
</script>