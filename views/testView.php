<?php
$title = 'Dashboard ACS - Test';
$specialStyleCSS = null;
$specialJS = null;

ob_start(); ?>
<p>Login et Password OK : page de l'utilisateur</p>

<a href="index.php">Retour</a>

<?php
echo ID . '<br>';
echo LOGIN . '<br>';
echo PWD . '<br>';
echo EMAIL . '<br><hr>';


echo $_SESSION['id'];
echo $_SESSION['login'];
echo $_SESSION['pwd'];
echo $_SESSION['email'];

var_dump($_SESSION['logged']);
?>

<?php
$content = ob_get_clean(); ?>

<?php require('template.php'); ?>
