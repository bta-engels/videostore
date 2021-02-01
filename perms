#!/bin/sh
wwwuser=daemon

sudo chgrp -R $wwwuser storage/logs storage/framework storage/app bootstrap/cache database/dumps
sudo chmod -R ugo+rwx storage/logs storage/framework storage/app bootstrap/cache database/dumps
sudo chgrp -R staff .
sudo chmod -R g+rwX .
find . -type d -exec chmod g+s '{}' +
