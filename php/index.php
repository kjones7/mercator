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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mercator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v9.1.0/ol.css">
</head>
<body>
    <div id="map" style="width: 100%; height: 400px"></div>
    <script src="https://cdn.jsdelivr.net/npm/ol@v9.1.0/dist/ol.js"></script>
    <script>
        new ol.Map({
            layers: [
                new ol.layer.Tile({source: new ol.source.OSM()}),
            ],
            view: new ol.View({
                center: [0, 0],
                zoom: 2,
            }),
            target: 'map',
        });
    </script>
</body>
</html>