<?php
$serverName = "sqlserver";
$connectionOptions = [
    "Database" => "TestDB",
    "Uid" => "sa",
    "PWD" => "YourStrong(!)Password"
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn) {
    echo "Connected!";
} else {
    echo "Connection could not be established.<br />";
    die(print_r(sqlsrv_errors(), true));
}
?>
