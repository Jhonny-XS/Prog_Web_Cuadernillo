<html>
<head>
    <title>Ejercicio 32 - Leer Feeds RSS Local</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0 auto;
            padding: 20px;
            max-width: 800px;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        h2 {
            color: #0056b3;
        }
        .feed-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #fff;
            border-radius: 5px;
        }
        .feed-item a {
            text-decoration: none;
            color: #0056b3;
            font-size: 18px;
        }
        .feed-item a:hover {
            text-decoration: underline;
        }
        .feed-item .date {
            color: #666;
            font-size: 14px;
        }
        .feed-item .description {
            color: #333;
            font-size: 14px;
            margin-top: 5px;
        }
        .error {
            color: red;
            text-align: center;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>Ejercicio 32 - Leer Feeds RSS Local</h1>

    <?php
    // Ruta al archivo RSS local (ajústala según donde lo subas)
    $rss_file = "nasa_rss.xml"; // Ejemplo: sube el archivo como "nasa_rss.xml" al mismo directorio

    if (!file_exists($rss_file)) {
        echo "<p class='error'>Error: El archivo $rss_file no se encuentra en el servidor.</p>";
    } else {
        $rss_data = file_get_contents($rss_file);
        if ($rss_data === false) {
            echo "<p class='error'>Error: No se pudo leer el archivo $rss_file.</p>";
        } else {
            $rss_feed = simplexml_load_string($rss_data);
            if ($rss_feed === false) {
                echo "<p class='error'>Error: No se pudo procesar el archivo RSS.</p>";
            } else {
                $site_title = $rss_feed->channel->title;
                echo "<h2>" . htmlspecialchars($site_title) . "</h2>";

                $i = 0;
                $max_items = 5;

                foreach ($rss_feed->channel->item as $item) {
                    if ($i >= $max_items) {
                        break;
                    }

                    $title = $item->title;
                    $link = $item->link;
                    $description = $item->description;
                    $pubDate = $item->pubDate;

                    $formatted_date = date('D, d M Y', strtotime($pubDate));

                    echo "<div class='feed-item'>";
                    echo "<a href='" . htmlspecialchars($link) . "' target='_blank'>" . htmlspecialchars($title) . "</a>";
                    echo "<div class='date'>" . htmlspecialchars($formatted_date) . "</div>";
                    echo "<div class='description'>" . htmlspecialchars(implode(' ', array_slice(explode(' ', $description), 0, 20))) . "...</div>";
                    echo "</div>";

                    $i++;
                }

                if ($i === 0) {
                    echo "<p class='error'>No se encontraron artículos en el feed.</p>";
                }
            }
        }
    }
    ?>
</body>
</html>