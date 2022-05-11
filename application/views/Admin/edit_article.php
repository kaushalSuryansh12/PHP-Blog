<?php include('header.php'); ?>

<div class="container" style="margin-top:20px;">
	<h1>Edit Articles</h1>

    <?php //echo form_hidden('user', '$this->session->userdata('id')');?>
	<?php echo form_open("Users/updatearticle/{$article->id} ") ?>
	<!-- <?php echo form_hidden('article_id',$article->id); ?> -->
	<div class="row">
	<div class="col-lg-6">
 		<div class="form-group">
    <label for="article_title">Article Title:</label>
    <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Article Title', 'name'=>'article_title', 'value'=>set_value('article_title',$article->article_title)]); ?>
   		</div>
   	</div>
   	<div class="col-lg-6"  style="padding-top:30px;">
   		<?php echo form_error('article_title'); ?>
   	</div>
 	</div>
 	<div class="row">
	<div class="col-lg-6">
 		<div class="form-group">
   <label for="article_body">Article Body:</label>
   <?php echo form_textarea(['class'=>'form-control','placeholder'=>'Article Body','name'=>'article_body','value'=>set_value('article_body',$article->article_body)]); ?>
		</div>
 	</div>
   	<div class="col-lg-6" style="padding-top:30px;">
   		<?php echo form_error('article_body'); ?>
   	</div>
 	</div>
	<?php echo form_submit(['type'=>'submit','class'=>'btn btn-default','value'=>'Submit','style'=>'margin-top:10px']); ?>
	<?php echo form_reset(['type'=>'reset','class'=>'btn btn-primary','value'=>'Reset', 'style'=>'margin-top:10px']); ?>
</div>
<?php include('footer.php'); ?>

