# 101Ants Test Task

This project is based on drupal/recommended-project, an open-source project template.

## Requirements

- docker
- php8

## Getting started

```bash
# First time setup
git clone https://github.com/iMokys/101Ants.git

docker-compose up -d --build

make shell

composer install

# Import database from dump.
drush sql-cli < dump.sql
```
