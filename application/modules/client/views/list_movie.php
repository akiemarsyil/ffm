<div class="table-responsive">
	<table id="example">
		<thead>
			<tr>
				<th class="header">No</th>
				<th class="header">Nama</th>
				<th class="header">Nama Direktor</th>
				<th class="header">Tayang</th>
				<th class="header">Kategori</th>
				<th class="header">Aksi</th>
			</tr>
		</thead>
		<tbody >
		<?php
			$i=1;
			foreach ($film as $key => $value) {
		?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $value->film; ?></td>
				<td><?php echo $value->sutradara; ?></td>
				<td><?php echo $value->tayang; ?></td>
				<td><?php echo $value->kategori; ?></td>
				<td>
					<a href="<?php echo base_url($this->module).'/'.$this->cname.'/detail_movie/'.$value->id; ?>"><span class="label label-success">
                        <i class="glyphicon glyphicon-pencil"></i> Detail</span>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#example').dataTable();
	})
</script>