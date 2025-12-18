<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config
set('application', 'todo-PepeAdriLaravel');
set('repository', 'https://github.com/Pepe1109/todo-PepeAdriLaravel.git');
set('git_tty', true);

add('shared_files', []); 
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts
host('44.222.122.223')
    ->set('remote_user', 'ddaw-ud4-deployer')
    ->set('deploy_path', '/var/www/ddaw-ud4-a4/html')
    ->set('ssh_multiplexing', false);

// Hooks

task('build', function () {
    run('cd {{release_path}} && build');
});

task('reload:php-fpm', function () {
    run('sudo /etc/init.d/php8.3-fpm restart');
});

after('deploy:failed', 'deploy:unlock');

before('deploy:symlink', 'artisan:migrate');

after('deploy', 'reload:php-fpm');