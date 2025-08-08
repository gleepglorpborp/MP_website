<?php
session_start();

if (!isset($_POST['selected']) || !isset($_SESSION['answer'])) {
    header("Location: guess.php");
    exit();
}

$_SESSION['total'] += 1;
if ($_POST['selected'] === $_SESSION['answer']) {
    $_SESSION['correct'] += 1;
}

unset($_SESSION['answer']);
header("Location: guess.php");
exit();
