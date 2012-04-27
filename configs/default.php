<?php
return array (
    'services' =>
    array (
      'backend.Render' => 'Backend\\Base\\Utilities\\Render',
      'backend.Logger' => 'Backend\\Core\\Utilities\\Logger',
      'backend.PearLogger' =>
      array (
        'Backend\\Core\\Utilities\\PearLogger',
        array (
          array (
            'filename' => '/tmp/backend-pear.log',
          ),
        ),
      ),
    ),
    'subjects' =>
    array (
      'Backend\\Core\\Utilities\\ApplicationEvent' =>
      array (
        'observers' =>
        array (
          'backend.Logger',
          'backend.PearLogger',
        ),
      ),
      'Backend\\Core\\Application' =>
      array (
        'observers' =>
        array (
          'backend.Logger',
          'backend.PearLogger',
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
