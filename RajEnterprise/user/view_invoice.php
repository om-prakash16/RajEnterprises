<?php
include '../db/db_connection.php';
session_start();

$order_id = $_GET['order_id'];
$sql = "SELECT invoice_path FROM orders WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();

if ($order['invoice_path']) {
    header('Content-Disposition: attachment; filename="' . basename($order['invoice_path']) . '"');
    readfile('../uploads/' . $order['invoice_path']);
    exit();
} else {
    echo "Invoice not found!";
}
?>
