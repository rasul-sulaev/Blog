<?php
session_start();

unset($_SESSION['id'], $_SESSION['login'], $_SESSION['admin']);
header('location: /');