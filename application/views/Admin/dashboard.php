<?php include('header.php'); ?>

<!--  print_r($articles); ?> -->

<div class="container" style="margin-top:50px">
<div class="row">
<div class="col-lg-3">
<a href="addUser" class="btn btn-lg btn-primary"> Add Article </a>
</div>
</div>
  <?php if($error=$this->session->flashdata('Added')) : ?>
   	<div class="col-lg-3" style="margin-top:30px;">
   	<div class="alert alert-danger">
   		<?php echo $error; ?>
    </div>
	</div>
   <?php endif; ?>
   </div>
</div>

<div class="container" style="margin-top:50px;">
<div class="table">
<table style="margin-left:35%;">
		<thead>
			<tr>
				<th style="padding:10px;">ID</th>
				<th style="padding:10px;">Article Title</th>
				<th style="padding:10px;">Article Body</th>
				<th style="padding:10px;">Edit</th>
				<th style="padding:10px;">Delete</th>
			</tr>
		</thead>
		<tbody>
		<?php if(count($articles)): ?>	
			<?php foreach ($articles as $art): ?> 
				<tr>
					<td><?= $art->id; ?> </td>
					<td><?= $art->article_title; ?></td>
					<td><?= $art->article_body; ?></td>
					<td>
					<?=
					form_open('Users/editUser'), // would open a form 
					form_hidden('id',$art->id), // would produce an input of type hidden, name id, value $art->id
					form_submit(['name'=>'submit', 'value'=>'Edit', 'class'=>'btn btn-primary','style'=>'margin-top:20%; margin-left:10px;']), // 
					form_close(); // would close a forms
					?>
					<td>
					<?=
					form_open('Users/delarticle'), // would open a form 
					form_hidden('id',$art->id), // would produce an input of type hidden, name id, value $art->id
					form_submit(['name'=>'submit', 'value'=>'Delete', 'class'=>'btn btn-danger','style'=>'margin-top:20%; margin-left:10px;']), // 
					form_close(); // would close a forms
					?>
				</td>
				</tr/>
			<?php endforeach; ?>

		<?php else: ?>
			<tr>
				<td colspan=""> No data available</td>
			</tr>
		<?php endif; ?>	
		</tbody>

<?= $this->pagination->create_links();  ?>

</table>




</div>
<?php include('footer.php'); ?>