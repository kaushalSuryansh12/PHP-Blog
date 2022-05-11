<?php include('header.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6" style="margin-top: 100px;">
			<h2> Contact Form</h2><br>

			<?php if($error = $this->session->flashdata('msg')){
			?> <p style="color: green;"><strong>Sucess!</strong> <?php echo $error; ?></p>
			<?php } ?>
			<form action="<?php echo base_url(); ?>email_send/send" method="post">
			<input type="email" name="from" class="form-control" placeholder="Enter Email" required><br>
			<textarea name="message" class="form-control" placeholder="Enter message here" required></textarea><br>
			<button type="submit" class="btn btn-primary">Send Message</button>
		</form>
		<div>
			<div class="col-sm-3">
		</div>
	</div>




<?php include('footer.php'); ?>
