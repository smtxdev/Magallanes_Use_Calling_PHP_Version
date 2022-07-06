#!/usr/bin/env $PHPBINFORMAGE
<?php
/*
 * This file is part of the Magallanes package.
*
* (c) Andrés Montañez <andres@andresmontanez.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
$timezone = ini_get('date.timezone');
if (empty($timezone)) {
    date_default_timezone_set('UTC');
}

$baseDir = dirname(dirname(__FILE__));

define('MAGALLANES_VERSION', '1.0.7');
define('MAGALLANES_DIRECTORY', $baseDir);

if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require_once __DIR__ . '/../vendor/autoload.php';
} else if (file_exists(__DIR__ . '/../../../autoload.php')) {
    require_once __DIR__ . '/../../../autoload.php';
}

require_once $baseDir . '/Mage/Autoload.php';
$loader = new \Mage\Autoload();
spl_autoload_register(array($loader, 'autoLoad'));

// Clean arguments
array_shift($argv);

// Run Magallanes
$console = new Mage\Console;
$exitCode = $console->run($argv);

exit((integer) $exitCode);
