<?php

namespace Deployer;

desc('Execute artisan migrate');
task('artisan:migrate:all', function () {
    run('{{bin/php}} {{release_path}}/artisan migrate --force');
});