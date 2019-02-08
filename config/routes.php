<?php

return [
    'login' => 'admin/login',
    'auth' => 'admin/auth',
    'logout' => 'admin/logout',
    'dayside/index.php' => 'dayside/index',
    'task/new' => 'task/new',
    'task/store' => 'task/store',
    'task/edit/([0-9]+)' => 'task/edit/$1',
    'task/save/([0-9]+)' => 'task/save/$1',

    'task/list/([0-9]+)' => 'task/list/$1',
    '' => 'task/list',
];