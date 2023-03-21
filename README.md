
# Word meaning

This drupal project, include a drupal module word-meaning.

You'll be able to display the definition of any given word.

## Demo

![demo](./demo.gif)

## Requirements

- docker
- docker-compose

## Run unit tests

vendor/bin/phpunit -c web/modules/custom/word_meaning/

## Run Locally

Warning: stop any server running on the port 80 since the container is running on it

Clone the project

```bash
  git clone https://github.com/jean-pasqualini/drupal-technical-test
```

Go to the project directory

```bash
  cd drupal-technical-test
```

Install dependencies

```bash
  docker-compose run --user $(id -u) --entrypoint=/usr/local/bin/composer php install
```

Start the server

```bash
  docker-compose up -d
```

Clean drupal cache (if you have "SQLSTATE[HY000] [2002] Connection refused", wait a bit for mysql is ready)

```bash
  docker-compose run --user $(id -u) --entrypoint=/var/www/html/vendor/bin/drush php cache:rebuild
```

Go to http://localhost/dictionary

