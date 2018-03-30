<?php
spl_autoload_register(function ($object) {
	$object = str_replace("\\","/",$object);
	require_once "./$object.class.php";
});
