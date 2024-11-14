<?php
    if (!function_exists('loadEnv')) 
    {
        function loadEnv($file)
        {
            if (file_exists($file)) 
            {
                $lines = file($file);
                foreach ($lines as $line) 
                {
                    if (strpos(trim($line), '#') === 0 || trim($line) === '') {
                        continue;
                    }
                    list($key, $value) = explode('=', trim($line), 2);
                    putenv("$key=$value");
                }
            }
        }
    }

    loadEnv(__DIR__ . '/.env');

    $conn = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_DATABASE'));
    if ($conn->connect_error) 
    {
        die("Conexión fallida: " . $conn->connect_error);
    }

