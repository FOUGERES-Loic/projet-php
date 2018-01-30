<?php
include __DIR__ . '/header.php';
?>
<nav class='navbar navbar-default'>
    <div class='container-fluid'>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class='navbar-header'>
            <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
                <span class='sr-only'>Toggle navigation</span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
                <span class='icon-bar'></span>
            </button>
            <a class='navbar-brand' href='../index.php'>Base</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
            <ul class='nav navbar-nav'>
                <li class='<?php active('index.php');?>'><a href='../index.php'>Index</a></li>
                <li class='<?php active('create.php');?>'><a href='../create.php'>Create</a></li>
                <li class='<?php active('update.php');?>'><a href='../update.php'>Update</a></li>
                <li class='<?php active('delete.php');?>'><a href='../delete.php'>Delete</a></li>
                <li class='<?php active('index.php?type=fruit');?>'><a href='../index.php?type=fruit'>Fruits</a></li>
                <li class='<?php active('index.php?type=legume');?>'><a href='../index.php?type=legume'>Légumes</a></li>
            </ul>
            <form class='navbar-form navbar-right' method='POST'>
                <div class='form-group'>
                    <input type='text' name='recherche' class='form-control' placeholder='Rechercher'
                           value="<?= isset($search) ? $search : '' ?>">
                </div>
                <button type='submit' class='btn btn-default'>Envoyer</button>
            </form><br>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class='container'>