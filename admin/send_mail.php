<?php
include "../settings/connection.php";
function fetchRecentItems($conn, $tableName) {
    $sql = "SELECT * FROM $tableName ORDER BY interaction_time DESC LIMIT 5";
    $result = $conn->query($sql);
    $items = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }
    return $items;
}

 $claimedItems = fetchRecentItems($conn, "claimed_items");

 $lostItems = fetchRecentItems($conn, "lost_items");

 $foundItems = fetchRecentItems($conn, "found_items");

 $to = "freda.beecham@ashesi.edu.gh";
$subject = "Top 5 Most Recent Items";
$message = "Top 5 Most Recent Claimed Items:\n";
foreach ($claimedItems as $item) {
    $message .= "Item Name: " . $item['item_name'] . "\n";
}
$message .= "\nTop 5 Most Recent Lost Items:\n";
foreach ($lostItems as $item) {
    $message .= "Item Name: " . $item['item_name'] . "\n";
}
$message .= "\nTop 5 Most Recent Found Items:\n";
foreach ($foundItems as $item) {
    $message .= "Item Name: " . $item['item_name'] . "\n";
}

$headers = "From: ascwelfare@ashesi.edu.gh" . "\r\n" .
           "Reply-To: freda.beecham@ashesi.edu.gh" . "\r\n" .
           "X-Mailer: PHP/" . phpversion();
mail($to, $subject, $message, $headers);

echo "Mail sent";?>
