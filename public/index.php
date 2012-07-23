<?php
/**
 * Main URL end point
 *
 * PHP Version 5.3
 *
 * @category  Backend
 * @package   Core
 * @author    J Jurgens du Toit <jrgns@backend-php.net>
 * @copyright 2011 - 2012 Jade IT (cc)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @link      http://backend-php.net
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
 */
//Setup the environment
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
require 'bootstrap.php';
$parser = new Symfony\Component\Yaml\Parser;
$config = Backend\Core\Utilities\Config::getNamed($parser, 'application');
$container = new Backend\Core\Utilities\DependencyInjectionContainer($config);

//Get the application. This can be reduced to one line if you know what application
//you want to use.
if (class_exists('\Backend\Base\Application', true)) {
    $application = new Backend\Base\Application($config, $container);
} else {
    $application = new Backend\Core\Application($config, $container);
}
//The application generates a response
$response = $application->main();
//Which is then outputted to the Client
$response->output();

//Done
