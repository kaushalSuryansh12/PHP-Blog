<?php include('header.php'); ?>
<div class="container" style="margin-top:20px;">
	<h1>Admin Login</h1>


   <h2><?php //echo $this->session->flashdata('Login_failed'); ?></h2> 

   <?php if($error=$this->session->flashdata('Login_failed')) : ?>
   	<div class="row">
   	<div class="col-lg-6">
   	<div class="alert alert-danger">
   	<?php echo $error; ?>
    </div>
	</div>
	</div>
   <?php endif; ?>

	<?php echo form_open('login'); ?>
	<div class="row">
	<div class="col-lg-6">
 		<div class="form-group">
    <label for="email">Username:</label>
     <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Username', 'name'=>'uname', 'value'=>set_value('uname')]); ?>
   		</div>
   	</div>
   	<div class="col-lg-6"  style="padding-top:30px;">
   		<?php echo form_error('uname'); ?>
   	</div>
 	</div>
 	<div class="row">
	<div class="col-lg-6">
 		<div class="form-group">
   <label for="pwd">Password:</label>
   <?php echo form_password(['class'=>'form-control','type'=>'password','placeholder'=>'Enter Password','name'=>'pass','value'=>set_value('pass')]); ?>
		</div>
 	</div>
   	<div class="col-lg-6" style="padding-top:30px;">
   		<?php echo form_error('pass'); ?>
   	</div>
 	</div>
	<?php echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'Submit','style'=>'margin-top:10px']); ?>
	<?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset', 'style'=>'margin-top:10px']); ?>
</div>
<?php include('footer.php'); ?>

