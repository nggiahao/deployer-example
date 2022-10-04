<?php
$server_files = glob(__DIR__ . '/*/servers.php');

foreach ($server_files as $server_file) {
    require $server_file;
}
