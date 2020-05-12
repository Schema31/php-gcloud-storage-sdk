<?php

require __DIR__."/../vendor/autoload.php";

use Schema31\GCloudStorageSDK\gCloud_Storage;

if ($argc < 4) {
    die("\n\nAttenzione!\n\nNon hai specificato abbastanza parametri: \n" . $argv[0] . " <repositoryName> <Authentication> <fileKey> [<fileVersion>] [<chainName> <chainSubFile>]\n\n");
}

$repositoryName = $argv[1];
$Authentication = $argv[2];
$fileKey = $argv[3];
$fileVersion = (array_key_exists(4, $argv) ? $argv[4] : NULL); // ATTRIBUTO FACOLTATIVO
$chainName = (array_key_exists(5, $argv) ? $argv[5] : NULL);  // ATTRIBUTO FACOLTATIVO
$chainSubFile = (array_key_exists(6, $argv) ? $argv[6] : NULL); // ATTRIBUTO FACOLTATIVO

$Storage = new gCloud_Storage();
$Storage->repositoryName = $repositoryName;
$Storage->Authentication = $Authentication;

$response = $Storage->detailFile($fileKey, $fileVersion, $chainName, $chainSubFile);

if ($response !== FALSE) {
    echo PHP_EOL;
    print_r($response);
    echo PHP_EOL;
} else {
    echo PHP_EOL;
    echo "Il sistema ha tornato errore: " . $Storage->LastError . PHP_EOL;
    echo PHP_EOL;
}
