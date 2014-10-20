<div id="page-content" class="block" style="min-height:500px;">
		<div class="row">
			<div class="col-sm-12">
				<div class="block full" style="margin-top:10px;" id="master-akun">
					<div class="row">
						<div class="col-sm-12">
							<blockquote>
								<p><i class="icon-file-text"></i> Data Film</p>
							</blockquote>
							<a href="<?php echo base_url($this->module).'/admin_master/form_film'; ?>" class="btn btn-success">
								<i class="icon-plus icon-white"></i> Add
							</a><br><br>
						</div>
					</div>
					<div class="table-responsive">
						<table id="example" class="table display table-bordered table-hover">
							<thead>
								<tr>
									<th width="10px" class="text-center">No</th>
									<th width="100px">Nama</th>
									<th width="200px">Direktor</th>
									<th width="150px">Kategori</th>
									<th width="200">Review</th>
									<th class="text-center" width="120px">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									foreach ($film as $key => $value) {
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $value->name;?></td>
									<td><?php echo $value->director;?></td>
									<td><?php echo $value->categories;?></td>
									<td><?php echo $value->content;?></td>
									<td>
										<a href="<?php echo base_url($this->module).'/admin_master/form_film/'.$value->idMovies; ?>"><span class="label label-success">
                                	        <i class="glyphicon glyphicon-pencil"></i> Edit</span>
                                	    </a>
                                	    <a href="<?php echo base_url($this->module).'/admin_master/delete_film/'.$value->idMovies; ?>">
                                	        <span class="label label-danger"><i class="glyphicon glyphicon-remove"></i> Delete</span>
                                	    </a>
                                	</td>
								</tr>
								<?php
									$i++;
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
    	$('#example').dataTable();
	});
</script>