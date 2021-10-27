<?php

ini_set('log_errors', 1);
ini_set('display_errors', 0);

// ========== DATABASE ==========

define('CP_DB_NAME', '');
define('CP_DB_USER', '');
define('CP_DB_PASSWORD', '');

// ========== APPLICATION ==========

define('DEFAULT_VIEW', 'blog');
define('DEFAULT_VIEW_FILENAMES', ['index.html', 'index.php', 'default.html', 'default.php']);

define('BASEPATH', '');
define('UPLOADS_DIR', dirname(__DIR__, 1) . BASEPATH . '/uploads/');
