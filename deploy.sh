#!/bin/sh

set -e

vendor/bin/phpunit
(git push) || true
git checkout staging
git merge main
git push origin staging
git checkout main
