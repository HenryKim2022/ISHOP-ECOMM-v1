<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
        $value = trim($value, '"'); // Trim the double quotes from the value

        $envVariables[$key] = $value;
    }
}

$servername = $envVariables['DB_HOST'];
$username = $envVariables['DB_USERNAME'];
$password = $envVariables['DB_PASSWORD'];
$dbname = $envVariables['DB_DATABASE'];

$conn = new mysqli($servername, $username, $password, $dbname);

$tables = [];
$query = "SHOW TABLES";
$result = $conn->query($query);

if ($result) {
    while ($row = $result->fetch_row()) {
        $tables[] = $row[0];
    }
}

$relationships = [];
$query = "SELECT TABLE_NAME, COLUMN_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME
          FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
          WHERE TABLE_SCHEMA = '$dbname' AND REFERENCED_TABLE_NAME IS NOT NULL";
$result = $conn->query($query);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $relationships[] = $row;
    }
}

$jointShapes = [];

foreach ($tables as $tableName) {
    $columns = [];

    $rect = new stdClass();
    $rect->id = $tableName;
    $rect->shape = new stdClass();
    $rect->shape->position = new stdClass();
    $rect->shape->position->x = 0;
    $rect->shape->position->y = 0;
    $rect->shape->size = new stdClass();
    $rect->shape->size->width = 100;
    $rect->shape->size->height = 60;
    $rect->shape->attrs = new stdClass();
    $rect->shape->attrs->body = new stdClass();
    $rect->shape->attrs->body->fill = 'lightblue';
    $rect->shape->attrs->body->rx = 10;
    $rect->shape->attrs->body->ry = 10;
    $rect->shape->attrs->body->strokeWidth = 2;

    // Retrieve primary keys for the table
    $query = "SHOW KEYS FROM $tableName WHERE Key_name = 'PRIMARY'";
    $result = $conn->query($query);
    $primaryKeys = [];

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $primaryKeys[] = $row['Column_name'];
        }
    }

    $query = "SHOW COLUMNS FROM $tableName";
    $result = $conn->query($query);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $columnText = $row['Field'] . ' (' . $row['Type'] . ')';

            if (in_array($row['Field'], $primaryKeys)) {
                $columnText = '[PK] ' . $columnText;
            }

            // Check if the column is a foreign key
            foreach ($relationships as $relationship) {
                if ($relationship['TABLE_NAME'] === $tableName && $relationship['COLUMN_NAME'] === $row['Field']) {
                    $columnText = '[FK] ' . $columnText;
                    break;
                }
            }

            $columns[] = $columnText;
        }
    }

    $rect->shape->attrs->label = new stdClass();
    $rect->shape->attrs->label->text = "[". $tableName . "]" . "\n" . "\n" . implode("\n", $columns);
    $rect->shape->attrs->label->fill = 'black';
    $rect->shape->attrs->label->fontSize = 12;
    $rect->shape->attrs->label->refY = '50%';
    $rect->shape->attrs->label->fontWeight = 'bold';

    $jointShapes[] = $rect;
}

$data = [
    'tables' => $jointShapes,
    'relationships' => $relationships
];

header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
exit();
?>