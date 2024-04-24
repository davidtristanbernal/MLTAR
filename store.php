<?php
// Function to store the data in a file
function storeData($name, $email)
{
    $data = "Name: $name, Email: $email\n";
    file_put_contents('submissions.txt', $data, FILE_APPEND);
}

// Function to search for a specific submission
function searchSubmission($query)
{
    $submissions = file_get_contents('submissions.txt');
    $results = [];
    $lines = explode("\n", $submissions);

    foreach ($lines as $line) {
        if (stripos($line, $query) !== false) {
            $results[] = $line;
        }
    }

    return $results;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Store the submitted data
    storeData($name, $email);

    // Display the submitted data
    echo "<div style='display: flex;'>";
    echo "<strong>Name:</strong> $name&nbsp;&nbsp;&nbsp;";
    echo "<strong>Email:</strong> $email";
    echo "</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Submissions</title>
</head>
<body>
    <h2>Search Submissions</h2>
    <form action="" method="GET">
        <label for="query">Search:</label>
        <input type="text" name="query" id="query" required>
        <input type="submit" value="Search">
    </form>

    <?php
    // Handle search query
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $query = $_GET['query'];
        $results = searchSubmission($query);

        echo "<h3>Search Results</h3>";

        if (count($results) > 0) {
            foreach ($results as $result) {
                echo "<div>$result</div>";
            }
        } else {
            echo "<div>No results found.</div>";
        }
    }
    ?>
</body>
</html>
