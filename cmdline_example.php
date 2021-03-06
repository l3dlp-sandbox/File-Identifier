#!/usr/bin/php
<?php

/**
    * Example command-line usage of FileIdentifier class.
    *
    * Usage:
    *        php -f <thisfilename> <filename>
    *        ./<thisfilename> <filename>
    *
    * @author        Martin Latter <copysense.co.uk>
    * @copyright     Martin Latter 15/06/2016
    * @version       0.1
    * @license       GNU GPL v3.0
    * @link          https://github.com/Tinram/File-Identifier.git
*/


###################################################
require('fileidentifier.class.php');
require('filesignatures.class.php');
###################################################


use CopySense\FileIdentifier\FileIdentifier;


if (@ ! $_SERVER['argv'][1])
{
    $sUsage = PHP_EOL . basename($_SERVER['argv'][0], '.php') . PHP_EOL . PHP_EOL . "\tusage: " . basename($_SERVER['argv'][0], '.php') . ' <filename>' . PHP_EOL . PHP_EOL;
    die($sUsage);
}

$sFile = $_SERVER['argv'][1];

if ( ! file_exists($sFile))
{
    die(PHP_EOL . $sFile . ' does not exist in this directory!' . PHP_EOL . PHP_EOL);
}
else
{
    $oFileCheck = new FileIdentifier($sFile);
    $aResult = $oFileCheck->getResult();

    echo $aResult['mimeinfo'] . PHP_EOL;
    echo $aResult['fileinfo'] . PHP_EOL;
}

?>