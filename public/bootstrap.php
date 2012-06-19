<?php
/**
 * bootstrapping script
 *
 * Copyright (c) 2011 JadeIT cc
 * @license http://www.opensource.org/licenses/mit-license.php
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in the
 * Software without restriction, including without limitation the rights to use, copy,
 * modify, merge, publish, distribute, sublicense, and/or sell copies of the Software,
 * and to permit persons to whom the Software is furnished to do so, subject to the
 * following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR
 * A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
 * CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE
 * OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @package CoreFiles
 */
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) {
    die("This file cannot be executed directly");
}
date_default_timezone_set('Africa/Johannesburg');

/**
 * @var The project folder, containing the public folder, all libraries and configs.
 */
define('PROJECT_FOLDER', dirname(getcwd()) . '/');

/**
 * @var The root vendor folder, containing all libraries, including Backend-Core.
 */
define('VENDOR_FOLDER', PROJECT_FOLDER . 'libraries/');

/**
 * @var The root application folder, containing all application space code.
 */
define('SOURCE_FOLDER', PROJECT_FOLDER . 'app/');

/**
 * @var The root folder for Backend-Core source files
 */
define('BACKEND_FOLDER', VENDOR_FOLDER . 'Backend/');

/**
 * @var string The publicly accessable part of the installation
 */
define('WEB_FOLDER', PROJECT_FOLDER . 'public/');

/**
 * @var string The default extension for config files
 */
define('CONFIG_EXT', 'yaml');

//define('SITE_FOLDER', APP_FOLDER . '/sites/liveserver.com');
require(BACKEND_FOLDER . 'Core/Autoloader.php');
\Backend\Core\Autoloader::register();
