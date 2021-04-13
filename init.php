<?php

session_start();
session_regenerate_id(true);

$files = glob('Database/*.php');

foreach ($files as $file) {
    require_once($file);   
}
$files = glob('Classes/*.php');

foreach ($files as $file) {
    require_once($file);   
}
$conn= new Connection();
$pdo=$conn->make();
$patient = new Patient($pdo);
$doctor	= new Doctor($pdo);
$quartier = new Quartier($pdo);
$admin = new Admin($pdo);