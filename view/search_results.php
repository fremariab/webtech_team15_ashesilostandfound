<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>

</head>
<body>
    <h1>Search Results</h1>
    <div class="search-results">
        <?php
        if (isset($_GET["results"])) {
            $searchResults = json_decode(urldecode($_GET["results"]), true);
            if ($searchResults && !empty($searchResults)) {
                foreach ($searchResults as $result) {
                    echo "<div class='item'>";
                    echo "<h3>Item Name: " . $result["item_name"] . "</h3>";
                    echo "<p>Location: " . $result["location"] . "</p>";
                    echo "<p>Description: " . $result["description"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No matching items found.</p>";
            }
        } else {
            echo "<p>No search results available.</p>";
        }
        ?>
    </div>
</body>
</html>
