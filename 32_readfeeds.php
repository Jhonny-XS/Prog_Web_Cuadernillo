<html>
<head>
    <title>Ejercicio 32 - Leer Feeds RSS</title>
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
    <h1>Ejercicio 32 - Leer Feeds RSS</h1>

    <?php
    // URL del feed RSS
    $rss_url = "https://www.nasa.gov/rss/dyn/breaking_news.rss"; // URL válida

    // Verificar si allow_url_fopen está habilitado
    if (!ini_get('allow_url_fopen')) {
        echo "<p class='error'>Error: La directiva allow_url_fopen está desactivada en php.ini. Habilítala para cargar feeds RSS.</p>";
    } else {
        // Intentar cargar el feed RSS con simplexml_load_file
        $rss_feed = @simplexml_load_file($rss_url);

        // Verificar si el feed se cargó correctamente
        if ($rss_feed === false) {
            // Si simplexml_load_file falla, intentar con cURL como alternativa
            if (function_exists('curl_init')) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $rss_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                $rss_data = curl_exec($ch);
                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                if ($rss_data !== false && $http_code == 200) {
                    $rss_feed = simplexml_load_string($rss_data);
                }
            }

            // Si aún no se pudo cargar el feed
            if (!isset($rss_feed) || $rss_feed === false) {
                echo "<p class='error'>Error: No se pudo cargar el feed RSS. Verifica la URL o tu conexión a internet.</p>";
                echo "<p class='error'>URL intentada: " . htmlspecialchars($rss_url) . "</p>";
            } else {
                // Procesar el feed
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
        } else {
            // Procesar el feed
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
    ?>   
</body>
</html>