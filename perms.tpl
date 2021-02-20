#!/bin/sh
wwwuser=daemon
wwwgroup=stuff

sudo chgrp -R $wwwuser storage/logs storage/framework storage/app bootstrap/cache database/dumps
sudo chmod -R ugo+rwx storage/logs storage/framework storage/app bootstrap/cache database/dumps
sudo chgrp -R $wwwgroup .
sudo chmod -R g+rwX .
find . -type d -exec chmod g+s '{}' +
