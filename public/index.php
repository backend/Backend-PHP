<?php
/**
 * Main URL end point
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
//Setup the environment
$router = null;
$formatter = null;
$config = null;
require 'bootstrap.php';

if (array_key_exists('HTTP_HOST', $_SERVER)) {
    switch ($_SERVER['HTTP_HOST']) {
    case 'www.liveserver.com':
        define('BACKEND_SITE_STATE', 'production');
        break;
    case 'localhost':
    default:
        define('BACKEND_SITE_STATE', 'development');
        break;
    }
}
//Get the application. This can be reduced to one line if you know what application
//you want to use.
if (class_exists('\Backend\Base\Application', true)) {
    $application = new Backend\Base\Application($router, $formatter, $config);
} else {
    $application = new Backend\Core\Application($router, $formatter);
}
//The application generates a response
$response = $application->main();
//Which is then outputted to the Client
$response->output();

//Done
