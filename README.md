# 101Ants Test Task

This project is based on BLT, an open-source project template and tool that enables building, testing, and deploying Drupal installations following Acquia Professional Services best practices.

## Requirements

- docker
- php8

## Getting started

```bash
# First time setup
git https://github.com/iMokys/101Ants.git

docker-compose up -d --build

make shell

composer install

# Import database from dump.
drush sql-cli < dump-file-name.sql
```
