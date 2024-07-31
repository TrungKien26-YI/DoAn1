<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=nuochoa_DTK", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        // echo "Kết nối thành công";
        return $conn;
    } catch (PDOException $e) {
        echo "Kết nối thất bại: " . $e->getMessage();
    }
