<html>
<head>
<!--<link href="http://localhost/TP2K16/Assets/css/bootstrap.min.css" rel="stylesheet">-->
<link href="<?= base_url("Assets/css/bootstrap.min.css") ?>" rel="stylesheet">
<title>TechaSoft </title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" style="margin-left: 20px;" href="<?= base_url('Users/Welcome'); ?>">TechaSoft</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php 
      if($this->session->userdata('id'))
      {
        ?>
      <a href="<?= base_url('login/logout'); ?>" class="btn btn-danger" style="">Logout</a>
      <a href="<?= base_url('Users/addContact'); ?>" class="btn btn-danger" style="margin-left:20px;">Contact Us</a>
    
    <?php
  }
    ?>


</nav>