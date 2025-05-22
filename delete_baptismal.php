<?php
session_start();
include 'shjpdb.php';

if (!isset($_SESSION['username'])) {
    header("Location: admin_loginpage.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM BaptismalRecords WHERE baptismalrecord_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: records.php");
exit();
