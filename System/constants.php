<?php
define('ENV', config('APP_ENV'));
define('ROOT_SPLIT', explode('\\', ROOT));
define('ROOT_SPLIT_COUNT', count(ROOT_SPLIT));

define('HOST', $_SERVER['HTTP_HOST']);
define('REQUEST_URI', $_SERVER['REQUEST_URI']);
define('QUERY_STRING', $_SERVER['QUERY_STRING']);
define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);
define('REQUEST_SCHEME', $_SERVER['REQUEST_SCHEME']);

/* Build URI's */
define('BASE_REQUEST_URI', ENV === 'development' ? implode('/', array_slice(explode('/', REQUEST_URI), 2)) : REQUEST_URI);
define('URI', REQUEST_SCHEME . '://' . explode('?', HOST . REQUEST_URI)[0]);
define('BASE_URI', REQUEST_SCHEME . '://' . HOST . (ENV === 'development' ? '/' . (explode('/', REQUEST_URI)[1]) : NULL));
define('FULL_URI', URI . (!empty(QUERY_STRING) ? '?' . QUERY_STRING : NULL));