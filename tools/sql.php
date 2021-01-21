<?php
define('DB_NAME', 'purchase_management_dashboard');
define('DB_HOST', 'localhost');
define('DB_CHAR', 'utf8');
define('DB_USER', 'root');
define('DB_PWD', 'root');
define('PDO_OPTIONS', [ \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC, \PDO::ATTR_EMULATE_PREPARES => false, ]);
