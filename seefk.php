<?php
$appTitle = "";
$favicon = '&#8801;';
?>

<!DOCTYPE html>
<html>

<head>
    <title><?= $favicon . '  DB FK-Finder' ?></title>
    <style>
        h5 {
            margin-bottom: 0.1rem;
        }

        pre.log-1 {
            font-family: monospace;
            border: 1px solid #ccc;
            padding: 10px;
            white-space: pre-wrap;
            overflow-x: auto;
            overflow-y: auto;
            max-height: 54vh;
            /* Set a maximum height for the log */
        }

        pre.log-2 {
            font-family: monospace;
            border: 1px solid #ccc;
            padding: 10px;
            white-space: pre-wrap;
            overflow-x: auto;
            overflow-y: scroll;
            max-height: 54vh;
            /* Set a maximum height for the log */
        }
    </style>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">

    <style>
        .2nd-log-container {
            overflow-x: auto;
        }

        #foreign-keys-table {
            width: 100%;
        }

        #foreign-keys-table th {
            background-color: #f8f9fa;
        }

        #foreign-keys-table th,
        #foreign-keys-table td {
            padding: 10px;
            text-align: center;
        }

        .number {
            font-weight: bold;
        }
    </style>

    <style>
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination li a {
            display: block;
            padding: 5px 10px;
            background-color: #f8f9fa;
            color: #000;
            text-decoration: none;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .pagination li.active a {
            background-color: #007bff;
            color: #fff;
        }

        .pagination li.disabled a {
            pointer-events: none;
            opacity: 0.5;
        }

        .pagination li a:hover {
            background-color: #ccc;
        }
    </style>


    <!-- ------------------------------------------------------------------------------------------------------------------- -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var logContainer = document.querySelector('.log-2');
            logContainer.scrollTop = logContainer.scrollHeight; // Scroll to the bottom of the log

            $('#foreign-keys-table').DataTable();
        });
    </script>
    <!-- ------------------------------------------------------------------------------------------------------------------- -->

    <!-- JS DATATABLES -->
    <script>
        $(document).ready(function() {
            $('#foreign-keys-table').DataTable({
                "paging": true,
                "searching": true
            });
        });
    </script>
    <!-- ENDOF: JS DATATABLES -->

</head>

<body>
    <h1>DB FK-Finder by Henry.K</h1>
    <div class="1st-log-container">
        <pre class="log-1"><?php
                            // Read the .env file and parse it into an array
                            $envFile = __DIR__ . '/.env';
                            $envData = file_get_contents($envFile);
                            $envVariables = [];

                            // Parse each line of the .env file
                            $lines = explode("\n", $envData);
                            foreach ($lines as $line) {
                                $line = trim($line);

                                // Display log
                                if (!empty($line) && strpos($line, '=') !== false) {
                                    list($key, $value) = explode('=', $line, 2);
                                    $key = trim($key);
                                    $value = trim($value); // Trim the value to remove leading and trailing spaces

                                    $envVariables[$key] = $value;
                                    $envVariables[$key] = str_replace('"', '', $value);

                                    if ($key == "DB_CONNECTION" || $key == "DB_HOST" || $key == "DB_PORT" || $key == "DB_DATABASE" || $key == "DB_USERNAME" || $key == "DB_PASSWORD") {
                                        echo "$key = $value\n";
                                    }
                                }
                            }
                            ?>
        </pre>
    </div>

    <div class="2nd-log-container">
        <!-- <h5>Logs: <br></h5> -->
        <table id="foreign-keys-table" class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Table Name</th>
                    <th>Table Attributes</th>
                    <th>The FK in Attributes</th>
                    <th>Related Table Name</th>
                    <th>Related Table Attributes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = $envVariables['DB_HOST'];
                $username = $envVariables['DB_USERNAME'];
                $password = $envVariables['DB_PASSWORD'];
                $dbname = $envVariables['DB_DATABASE'];

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                function getTableAttributes($conn, $table)
                {
                    $attributes = [];
                    $result = $conn->query("SHOW COLUMNS FROM `$table`");
                    while ($row = $result->fetch_assoc()) {
                        $attributes[] = $row['Field'];
                    }
                    return $attributes;
                }

                function getTableData($conn, $table, $attributes)
                {
                    $data = [];
                    $result = $conn->query("SELECT * FROM `$table`");
                    while ($row = $result->fetch_assoc()) {
                        $rowData = [];
                        foreach ($attributes as $attribute) {
                            $rowData[] = $row[$attribute];
                        }
                        $data[] = $rowData;
                    }
                    return $data;
                }

                $tables = [];
                $result = $conn->query("SHOW TABLES");
                while ($row = $result->fetch_row()) {
                    $tables[] = $row[0];
                }

                $count = 1;
                foreach ($tables as $table) {
                    $result = $conn->query("SHOW CREATE TABLE `$table`");
                    $row = $result->fetch_row();
                    $createTableQuery = $row[1];

                    preg_match_all('/FOREIGN KEY \(`(.*?)`\) REFERENCES `(.*?)` \(`(.*?)`\)/', $createTableQuery, $matches, PREG_SET_ORDER);

                    foreach ($matches as $match) {
                        $columnName = $match[1];
                        $referencedTable = $match[2];
                        $referencedColumn = $match[3];

                        $tableAttributes = getTableAttributes($conn, $table);
                        $referencedTableAttributes = getTableAttributes($conn, $referencedTable);

                        echo '<tr>';
                        echo '<td class="number">' . $count . '</td>';
                        echo '<td>' . $table . '</td>';
                        echo '<td>' . implode(", ", $tableAttributes) . '</td>';
                        echo '<td>' . $columnName . '</td>';
                        echo '<td>' . $referencedTable . '</td>';
                        echo '<td>' . implode(", ", $referencedTableAttributes) . '</td>';
                        echo '</tr>';

                        $count++;
                    }
                }

                $conn->close();

                if (count($tables) === 0) {
                    echo '<tr><td colspan="6">Database empty</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>




</body>

</html>