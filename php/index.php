<?php
//$serverName = "sqlserver";
//$connectionOptions = [
//    "Database" => "TestDB",
//    "Uid" => "sa",
//    "PWD" => "YourStrong(!)Password"
//];
//$conn = sqlsrv_connect($serverName, $connectionOptions);
//if ($conn) {
//    echo "Connected!";
//} else {
//    echo "Connection could not be established.<br />";
//    die(print_r(sqlsrv_errors(), true));
//}
//?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mercator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v9.1.0/ol.css">
    <style>
        .legend {
            position: absolute;
            top: 10px;
            right: 10px;
            background: white;
            padding: 10px;
            border: 1px solid #ccc;
            z-index: 1000;
        }
        .legend button {
            display: block;
            margin-bottom: 5px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="map" style="width: 100%; height: 400px"></div>
    <div class="legend">
        <button id="draw-point">Draw Point</button>
        <button id="draw-line">Draw Line</button>
        <button id="draw-polygon">Draw Polygon</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/ol@v9.1.0/dist/ol.js"></script>
    <script>
        // Create a new map with a Tile layer using OpenStreetMap (OSM) as the source
        const map = new ol.Map({
            layers: [
                new ol.layer.Tile({ source: new ol.source.OSM() }),
            ],
            view: new ol.View({
                center: [0, 0],
                zoom: 2,
            }),
            target: 'map',
        });

        // Create a vector source to hold the drawn features (this will contain the feature data)
        const source = new ol.source.Vector();

        // Create a vector layer to display the features from the vector source
        // (this will handle the rendering of the features using the data from the vector source)
        const vectorLayer = new ol.layer.Vector({
            source: source,
        });

        // Add the vector layer to the map
        map.addLayer(vectorLayer);

        // Variable to hold the current drawing interaction
        let draw;

        /**
         * Function to add a drawing interaction to the map
         * @param {string} type - The geometry type to draw ('Point', 'LineString', or 'Polygon')
         */
        function addInteraction(type) {
            // Remove any existing interaction
            map.removeInteraction(draw);
            // Create a new drawing interaction
            draw = new ol.interaction.Draw({
                source: source,
                type: type,
            });
            // Add the drawing interaction to the map
            map.addInteraction(draw);
        }

        // Event listener for the "Draw Point" button
        document.getElementById('draw-point').addEventListener('click', function () {
            addInteraction('Point');
        });

        // Event listener for the "Draw Line" button
        document.getElementById('draw-line').addEventListener('click', function () {
            addInteraction('LineString');
        });

        // Event listener for the "Draw Polygon" button
        document.getElementById('draw-polygon').addEventListener('click', function () {
            addInteraction('Polygon');
        });
    </script>
</body>
</html>
