<?php
namespace Deployer;

require 'recipe/laravel.php';


//require 'tasks/elasticsearch.php';
require 'tasks/env.php';
require 'tasks/git.php';
require 'tasks/migrate_all.php';
require 'tasks/pm2.php';

set( 'writable_mode', 'chmod' );
set( 'writable_chmod_recursive', false );
set( 'writable_chmod_mode', '0777' );
set( 'allow_anonymous_stats', false );
set('keep_releases', 3);

require __DIR__ . '/domains/domains.php';

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'env:upload',
    'deploy:vendors',
    'deploy:writable',
    'artisan:storage:link',
    'artisan:config:cache',
    'artisan:route:cache',
    'artisan:view:clear',
    'artisan:optimize',
    'artisan:migrate:all',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
]);

desc('Quick pull your project');
task('pull:full', [
    'deploy:prepare',
    'deploy:lock',
    'pull:update_code',
    'env:upload',
    'artisan:storage:link',
    'artisan:config:cache',
    'artisan:route:cache',
    'artisan:view:clear',
    'artisan:optimize',
    'artisan:migrate:all',
    'deploy:unlock',
]);

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');





