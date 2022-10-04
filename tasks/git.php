<?php

namespace Deployer;

desc('Git pull in the current directory');
task('pull:update_code', function () {
    if (test("[ ! -d {{deploy_path}}/current ]")) {
        throw new \Exception("There is no `current` folder to execute a `git pull` from.\nPlease choose another strategy to deploy your application before using the `pull` strategy");
    }
    
    run('cd {{deploy_path}}/current && git pull', ['tty' => true]);
});