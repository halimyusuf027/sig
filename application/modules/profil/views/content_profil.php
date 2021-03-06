<!-- Basic modal -->
<div id="modal_default" class="modal fade">
	<div class="modal-dialog">
		<iframe width="854" height="480" src="https://www.youtube.com/embed/TwFR7Gkd1kU?autoplay=1" frameborder="0" allowfullscreen autoplay></iframe>
	</div>
</div>
<!-- /basic modal -->

<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Profil</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>profil/update_data">
			<?php  echo form_hidden('id',$id); ?>
			<fieldset class="content-group">
				<div class="form-group">
					<label class="control-label col-lg-3">Nama <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control" required="required" placeholder="Nama">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Username <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="username" value="<?php echo $username; ?>" class="form-control" required="required" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Password </label>
					<div class="col-lg-9">
						<input type="password" name="password"  class="form-control" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Foto <span class="text-danger">*</span></label>
					<div class="col-lg-3">
						<div class="thumbnail no-padding">
							<div class="thumb">
								<img src="<?php echo base_url();?>assets/foto/<?php echo $foto; ?>" alt="">
								<div class="caption-overflow">
									<span>
										<a href="https://www.youtube.com/embed/TwFR7Gkd1kU" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
										<!-- <iframe width="854" height="480" src="https://www.youtube.com/embed/TwFR7Gkd1kU" frameborder="0" allowfullscreen></iframe> -->
									</span>
								</div>
							</div>
				    	</div>
					</div>
					
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3"></label>
					<div class="col-lg-3">
						<input type="file" name="foto" class="file-styled" >
					</div>
				</div>
			</fieldset>

			
			<div class="text-right">
				<button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</form>
		<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_default">Launch <i class="icon-play3 position-right"></i></button>

		
	</div>
</div>