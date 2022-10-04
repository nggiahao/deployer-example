<?php

namespace Deployer;

task('env:upload', function() {
    upload(get('env_file'), '{{release_path}}/.env');
});

task('env:update', [
    'env:upload',
    'artisan:config:cache',
]);