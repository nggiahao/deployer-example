<?php

namespace Deployer;
//
host(...['example'])
    ->hostname('1.1.1.1')
    ->stage('ex')
    ->user('')
    ->port()
    ->set('repository', '')
    ->set('branch', 'deploy')
    ->set('deploy_path', '')
    ->set('env_file', __DIR__.'/.env')
    ->set('pm2_file', __DIR__.'/pm2/*.yml');
