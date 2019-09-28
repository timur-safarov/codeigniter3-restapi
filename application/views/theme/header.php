<!DOCTYPE html>
<html>
<head>
    <title>Basic Crud operation in Codeigniter 3</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>

<div class="container">

	<nav class="navbar navbar-inverse navbar-fixed-top">

		<div class="container">

			<div class="row">
	    		<div class="col-xs-12 col-sm-12 col-md-12">

			        <div class="container-fluid">
			            <div class="navbar-header">
			                <a class="navbar-brand" href="#">REST API SERVICE</a>
			            </div>
			            <ul class="nav navbar-nav navbar-right">
			                <li class="active"><a href="<?=base_url();?>">Home</a></li>
			                <li><a href="<?=base_url('user');?>">Пользователи</a></li>
			                <li><a href="<?=base_url('library');?>">Библиотеки</a></li>
			                <li><a href="<?=base_url('book');?>">Книги</a></li>
			            </ul>
			        </div>
			    </div>
			</div>

		</div>

    </nav>

    <div class="container" style="margin-top: 80px;">
