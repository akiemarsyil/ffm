<div class="container">
	<div class="block full" style="margin-top:10px;">
		<blockquote>
			<p><i class="icon-file-text"></i> Informasi Bioskop</p>
		</blockquote>
		<div id="load">
		
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(function(){
			load_table();
		});

		function load_table(){
			$.ajax({
        		type: 'POST',
        		url: "<?php echo base_url().$this->module.'/'.$cname.'/load_cinema';?>",
        		success:
            		function(msg) {
                		$('#load').html(msg);
            		}
    		});
		}

	})
</script>