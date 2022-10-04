<?php

namespace Deployer;

task('pm2:upload', function () {
    $files = glob(get('pm2_file'));
    foreach ($files as $file) {
        $file_name = basename($file);
        upload($file, '{{deploy_path}}/' . $file_name);
    }
});

task('pm2:start', function () {
    run('cd {{deploy_path}} && pm2 start {{deploy_path}}/*.yml');
});

task('pm2:stop', function () {
    run('cd {{deploy_path}} && pm2 stop {{deploy_path}}/*.yml');
});

task('pm2:restart', function () {
    run('cd {{deploy_path}} && pm2 restart {{deploy_path}}/*.yml');
});

task('pm2:del', function () {
    run('cd {{deploy_path}} && pm2 del {{deploy_path}}/*.yml');
});

task('pm2:full', [
    'pm2:upload',
    'pm2:restart'
]);