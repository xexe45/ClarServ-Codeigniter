<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Claro Serv</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/dashboard.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/btable/bootstrap-table.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/btable/bootstrap-editable.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/toastr.min.css">
  <link rel="icon" href="<?=base_url()?>assets/imagenes/claro.png">
	<script src="<?=base_url()?>assets/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<header>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Claro Serv</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>-->
      </ul>
      <!--<form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> <?=$this->session->userdata('user')?></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs" aria-hidden="true"></i> Configuraciones <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?=base_url()?>logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<div class="list-group">
			  <a href="<?=base_url()?>home" class="list-group-item <?php if ($this->uri->segment(1) == 'home'): ?>
          active
        <?php endif ?>"><i class="fa fa-home" aria-hidden="true"></i>
			    Dashboard
			  </a>
			  
			  <a href="#" class="list-group-item">Morbi leo risus</a>
			  <a href="#" class="list-group-item">Porta ac consectetur ac</a>

        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle list-group-item <?php if ($this->uri->segment(1) == 'clientes' || $this->uri->segment(1) == 'clientes-interesados'): ?>
            active
          <?php endif ?>" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-male" aria-hidden="true"></i> Clientes
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="<?=base_url()?>clientes-interesados">Clientes Interesados</a></li>
            <li><a href="<?=base_url()?>clientes">Clientes</a></li>
            
          </ul>
        </div>

        <a href="<?=base_url()?>servicios" class="list-group-item <?php if ($this->uri->segment(1) == 'servicios'): ?>
          active
        <?php endif ?>"><i class="fa fa-podcast" aria-hidden="true"></i> Planes</a>
        
        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle list-group-item <?php if ($this->uri->segment(1) == 'usuarios' || $this->uri->segment(1) == 'roles'): ?>
            active
          <?php endif ?>" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-users" aria-hidden="true"></i> Usuarios
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="<?=base_url()?>roles">Roles y Permisos</a></li>
            <li><a href="<?=base_url()?>usuarios">Usuarios</a></li>
            
          </ul>
        </div>

			  <a href="#" class="list-group-item">Reportes</a>
        <a href="<?=base_url()?>sistema" class="list-group-item <?php if ($this->uri->segment(1) == 'sistema'): ?>
          active
        <?php endif ?>"><i class="fa fa-cog" aria-hidden="true"></i> Sistema
        </a>

			</div>
		</div>
		<div class="col-md-10">
			<ol class="breadcrumb">
      <li><a href="home">Home</a></li>
      <li class="active"><?=$this->uri->segment(1)?></li>
    </ol>
			<div class="panel panel-default">
				<div class="panel-body">
			    	<div class="container-fluid">
                <div class="row">
                  
     
	
