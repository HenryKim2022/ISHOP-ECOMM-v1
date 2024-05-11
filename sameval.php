<?php
// Read the .env file and parse it into an array
$envFile = __DIR__ . '/.env';
$envData = file_get_contents($envFile);
$envVariables = [];

// Parse each line of the .env file
$lines = explode("\n", $envData);
foreach ($lines as $line) {
    $line = trim($line);

    if (!empty($line) && strpos($line, '=') !== false) {
        list($key, $value) = explode('=', $line, 2);
        $key = trim($key);
        $value = trim($value);

        $envVariables[$key] = $value;
    }
}

// Database configuration
$servername = $envVariables['DB_HOST'] ?? '';
$username = $envVariables['DB_USERNAME'] ?? '';
$password = $envVariables['DB_PASSWORD'] ?? '';
$dbname = $envVariables['DB_DATABASE'] ?? '';

// Check if all required database configuration variables are present
if (empty($servername) || empty($username) || empty($password) || empty($dbname)) {
    die("Missing database configuration in the .env file.");
}

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("SET FOREIGN_KEY_CHECKS=0");

// Get all table names in the database
$tableResult = $conn->query("SHOW TABLES");
$tables = [];

while ($row = $tableResult->fetch_row()) {
    $tables[] = $row[0];
}

$sameValues = []; // Array to store the same values from all tables

foreach ($tables as $table) {
    $conn->query("SET FOREIGN_KEY_CHECKS=0");

    // Retrieve the column names for the current table
    $query = "DESCRIBE `$table`";
    $result = $conn->query($query);

    $columnNames = [];
    while ($row = $result->fetch_assoc()) {
        $columnNames[] = $row['Field'];
    }

    if (!empty($columnNames)) {
        // Process the column names as needed
        foreach ($columnNames as $columnName) {
            // Do something with $columnName
            // For example, you can add it to the $sameValues array
            $sameValues[] = $columnName;
        }

        $conn->query("TRUNCATE TABLE `$table`");

        echo "Truncated table: $table\n";
    } else {
        echo "Column names not found for table: $table\n";
    }
}

$conn->close();

// Output the same values with asterisks and two new lines
$output = implode("\n\n*****\n\n", $sameValues);
if (!empty($output)) {
    echo "\n\n*****\n\nSame Values:\n$output";
} else {
    echo "\n\n*****\n\nNo same values found.";
}
?>