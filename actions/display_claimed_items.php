<?php

include "../settings/connection.php";


function getItemDetails($conn, $itemid) {
    $itemDetails = array();

    $itemid = mysqli_real_escape_string($conn, $itemid);

    $sql = "SELECT c.*, i.file_name, s.sname
            FROM claimed_items f 
            INNER JOIN image i ON c.image_id = i.image_id
            WHERE c.itemid = $itemid";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0) {
        // Fetch the details of the item
        $item = mysqli_fetch_assoc($result);

        // Assign the item details to the array
        $itemDetails['item_name'] = $item['item_name'];
        $itemDetails['file_name'] = $item['file_name'];
        $itemDetails['category'] = $item['category'];
        $itemDetails['description'] = $item['description'];
        $itemDetails['interaction_time'] = $item['interaction_time'];
        $itemDetails['location'] = $item['location'];
        
    }

  
    mysqli_close($conn);

    return $itemDetails;
}
?>
