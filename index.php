<?php
require 'lib/functions.php';

if (Utils::isLoggedin()) {
	header('Location: issues.php');
} else {
	header('Location: login.php');
}
