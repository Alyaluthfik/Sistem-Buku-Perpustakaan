<?php
include '../config/database.php';

$database = new Database();
$conn = $database->getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM books WHERE id = ?";
    $stmt = $conn->prepare($query);
    
    if ($stmt->execute([$id])) {
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Gagal menghapus buku'); window.location.href='index.php';</script>";
    }
} else {
    header("Location: index.php");
    exit();
}
?>