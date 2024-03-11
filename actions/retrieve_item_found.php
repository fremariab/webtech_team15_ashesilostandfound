<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "../settings/connection.php";

function getFoundItems($connection) {
    
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    
    $limit = 10; 
    $offset = ($current_page - 1) * $limit;

    
    $sql = "SELECT * FROM Found_Items LIMIT $limit OFFSET $offset";
    $result = $connection->query($sql);

    if ($result === false) {
        echo "Error: " . $connection->error;
        return array();
    }

    $foundItems = array();
    while ($row = $result->fetch_assoc()) {
        $foundItems[] = $row;
    }

    $result->free();

    return $foundItems;
}


$foundItems = getFoundItems($conn);


echo json_encode($foundItems);
?>
