<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/Pepe1109/todo-PepeAdriLaravel.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('3.238.98.12')
    ->set('remote_user', 'ddaw-ud4-deployer')
    ->set('deploy_path', '/var/www/ddaw-ud4-a4/html');

// Hooks

after('deploy:failed', 'deploy:unlock');
