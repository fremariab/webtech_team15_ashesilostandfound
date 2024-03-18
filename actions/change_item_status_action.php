<?php
 include "../settings/connection.php";
session_start();
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $item_type = $_POST['item_type'];
    $item_id = $_POST['item_id'];
    $uid = $_POST['uid'];

     if ($item_type === "lost") {
        $table_name = "lost_items";
        $status = 3;  
    } elseif ($item_type === "found") {
        $table_name = "found_items";
        $status = 3;  
    } else {
         exit("Invalid item type");
    }
    $status = 3;
    $rid = 1;
    $sql = "UPDATE $table_name SET sid = ? WHERE itemid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $status, $item_id);
    $stmt->execute();

    $sql_claim = "INSERT INTO claimed_items (found_item_id, rid, sid, interaction_time, uid) VALUES ('$item_id', '$rid', '$status', NOW(), '$uid')";
    $result = mysqli_query($conn, $sql_claim);
    
    if ($result) {
        header("Location: ../admin/all_claimed_items.php");
        exit();
    } else {
        header("Location: ../admin/all_claimed_items.php?error=Status not changed.");
    }
    header("Location: ../admin/all_claimed_items.php?");
    exit();
}
?>
