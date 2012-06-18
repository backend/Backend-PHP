Backend-PHP
============

Backend-PHP is a basic code base that provides REST functionality using MVC architecture.
It's ideal for developing API's that should provide information in multiple formats, or
an API that also needs to act as a web site.

It also has the following advantages:

* Unit Testable and Tested using PHPUnit
* PEAR Coding Standards compliant
* Can be called using the command line or a web client (like a browser)
* Results can be modified on a per format basis

It serves as the ideal low level base for applications or frameworks that need to be
RESTful and done using MVC. The code base is divided in to Components, managed as git sub
modules.

Installation
----------

    git clone git@github.com:backend/Backend-PHP.git
    git submodule init
    git submodule update

Or, to add it to an existing project

    git remote add backend git@github.com:backend/Backend-PHP.git
    git merge remotes/backend/master

You'll also nead the Twig templating engine and Pear Logger (or equivalents).

    pear config-set auto_discover 1
    pear install pear.twig-project.org/Twig
    pear install Log

As well as the Symfony YAML parser (or equivalent).

    sudo pear channel-discover pear.symfony-project.com
    sudo pear install symfony/YAML


Usage
----

###Command Line

    cd public
    php index.php GET contacts #Will run contacts/read/0
    php index.php DELETE contacts/3 #Will run contacts/delete/3
    php index.php GET contacts/3 json #Will run contacts/delete/3 with the JsonView

###HTTP

    curl --data contacts --data _method=POST http://localhost/backend-core/public/index.php #Will run contacts/create
      #Will run contacts/update/3
    curl --data contacts/3 http://localhost/backend-core/public/index.php  #Will run contacts/read/3

Details
------

RESTfullnes is achieved in the Web environment by checking the following for the HTTP
verb to use:

* A `_method` POST variable
* A `X_HTTP_METHOD_OVERRIDE` header sent with the request
* The HTTP request's method

The MVC components are structured as follows:

* All Application Logic happens in the Controller
* All Business Logic happens in the Model
* All Output happens in the View

The Application class holds everything together.

The code is further separated by removing all data source related code from the Model. Models can be
defined as BoundModel's that have a data binding. These data bindings provide the code and functionality
to perform CRUD functionality on a data source. The data source can be a conventional database, an API or
a file.
