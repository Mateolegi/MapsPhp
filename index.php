<?php

$env = parse_ini_file('.env', true);
$host = $env['server']['host'];
$port = $env['server']['port'];
$executeServer = "php -S {$host}:{$port} server.php";

execute($host, $port);

// $output = `ls -al`;
// echo "<pre>$output</pre>";

function execute($host, $port) {
    $proc = proc_open("php -S {$host}:{$port} server.php", [['pipe','r'],['pipe','w'],['pipe','w']], $pipes);
    echo "Server running on {$host}:{$port}";
    while(($line = fgets($pipes[1])) !== false) {
        fwrite(STDOUT,$line);
    }
    while(($line = fgets($pipes[2])) !== false) {
        fwrite(STDERR,$line);
    }
    fclose($pipes[0]);
    fclose($pipes[1]);
    fclose($pipes[2]);
    return proc_close($proc);
}

// include 'public/welcome.php';