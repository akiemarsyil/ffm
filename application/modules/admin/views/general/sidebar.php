<?php $user = $this->session->userdata('swhpsession'); ?>
<div class="col-md-3">
		<div class="well sidebar-nav">
		<img style="width:100px; height:100px; margin-left:auto; margin-right:auto" 
		src="<?php echo base_url().'public/assets/uploads/'.$user[0]->images; ?>">
            <ul class="nav nav-list">
              	<li class="nav-header"><?php echo $user[0]->username;?></li>
              	<div class="panel-group" id="accordion">
  					<div class="panel panel-default">
    					<div class="panel-heading">
        					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          						Master
        					</a>
    					</div>
    					<div id="collapseOne" class="panel-collapse collapse">
    						<ul>
    							<li><a href="<?php echo base_url().'admin/bioskop';?>">Bioskop</a></li>
    							<li><a href="<?php echo base_url().'admin/film';?>">Film</a></li>
    							<li><a href="<?php echo base_url().'admin/ticket';?>">Ticket</a></li>
                  <li><a href="<?php echo base_url().'admin/schedule';?>">Jadwal</a></li>
    						</ul>
    					</div>
    				</div>
    			</div>
              	<li><a href="<?php echo base_url().'admin/admin_forum/load_forum';?>">Forum</a></li>
              	<li><a href="<?php echo base_url().'admin/admin_user/load_user';?>">Member</a></li>
              	<li><a href="<?php echo base_url().'admin/complain';?>">Komplain</a></li>
            </ul>
         </div><!--/.well -->
</div>