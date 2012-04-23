<?php
return array (
    'tools' =>
    array (
      'Render' => 'Backend\\Base\\Utilities\\Render',
      'Logger' => 'Backend\\Core\\Utilities\\Logger',
      'PearLogger' =>
      array (
        0 => 'Backend\\Core\\Utilities\\PearLogger',
        1 =>
        array (
          'filename' => '/tmp/backend-pear.log',
        ),
      ),
    ),
    'subjects' =>
    array (
      'Backend\\Core\\Utilities\\ApplicationEvent' =>
      array (
        'observers' =>
        array (
          0 => 'Logger',
          1 => 'PearLogger',
        ),
      ),
      'Backend\\Core\\Application' =>
      array (
        'observers' =>
        array (
          0 => 'Logger',
          1 => 'PearLogger',
        )
      ),
    ),
    'application' =>
    array (
      'values' =>
      array (
        'applicationName' => 'Backend PHP',
      ),
    ),
    'database' =>
    array (
      'default' =>
      array (
        'connection' =>
        array (
          'driver' => 'sqlite',
          'path' => '/tmp/backend-core.sqlite',
        ),
      ),
      'default_mysql' =>
      array(
        'connection' =>
        array(
          'driver' => 'mysql',
          'username' => 'username',
          'password' => 'password',
          'host' => 'localhost',
          'dbname' => 'database',
        ),
      ),
    ),
);
