<?php
session_start();

if(isset($_POST['current'])){
    $_SESSION['current'] = intval($_POST['current']);
}
