<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CodeIgniter View Example</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url() ?>inc/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url() ?>inc/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>



</head>

<body>

<header>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">My Project</a>
                </div>
                <div style="float: right;">
                    <ul class="nav navbar-nav">
                        <li ><a href="<?= base_url() ?>home/">Home</a></li>
                        <?php if ($this->session->has_userdata('is_logged') == false): ?>
                            <li><a href="<?= base_url() ?>home/login">Login</a></li>
                        <?php endif ?>
                        <?php if ($this->session->has_userdata('is_logged') == true): ?>
                            <li><a href="<?= base_url() ?>home/enter">My page</a></li>
                        <?php endif; ?>
                        <?php if ($this->session->has_userdata('is_logged') == true): ?>
                            <li><a href="<?= base_url() ?>home/logout">Logout </a></li>
                        <?php endif; ?>
                        <?php if ($this->session->has_userdata('is_logged') == false): ?>
                            <li><a href="<?= base_url() ?>home/register">Register</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

<div class="container div_cont_reg">
    <div class="container-fluid">
        <div class="row">