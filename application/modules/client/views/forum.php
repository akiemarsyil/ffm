<div class="container">
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
			    	<h3 class="panel-title">Forum Fantasy Film</h3>
			  	</div>
			  	<div class="panel-body">
			  		<a href="<?php echo base_url().$this->module.'/'.$this->cname;?>/form_forum" class="btn btn-primary">Create Thread</a>
			    	<hr>
			    		<div class="panel panel-default">
						  	<div class="panel-body" id="forum">
						    	
						  	</div>
						</div>
			    	<hr>

			  	</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function() {
    load_forum();
});
function load_forum() {
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url().$this->module.'/'.$this->cname.'/load_forum/'?>",
        success:
            function(msg) {
                $('#forum').html(msg);
            }
    });
}
</script>