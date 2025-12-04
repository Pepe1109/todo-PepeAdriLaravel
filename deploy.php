<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config
set('application', 'todo-PepeAdriLaravel');

set('repository', 'https://github.com/Pepe1109/todo-PepeAdriLaravel.git');

add('shared_files', ['']);
add('shared_dirs', ['']);
add('writable_dirs', []);

set('git_tty', true);

// Hosts

host('3.238.98.126')
    ->set('remote_user', 'ddaw-ud4-deployer')
    ->set('deploy_path', '/var/www/ddaw-ud4-a4/html');

// Hooks

task('build', function () {
run('cd {{release_path}} && build');
});

after('deploy:failed', 'deploy:unlock');

before('deploy:symlink', 'artisan:migrate');