
# Word meaning

This drupal project, include a drupal module word-meaning.

You'll be able to display the definition of any given word.

## Demo

![demo](./demo.gif)

## Requirements

- docker
- docker-compose

## How the module word-meaning is organized

- js
  - form.js : the js i've written for the form included via word_meaning_form_alter in word_meaning.module
- src
  - Api
    - DictionaryApi.php
      - getDefinitions(string $word): array : interact with api.dictionaryapi.dev and return the meanings/definitions
  - Controller
    - DictionaryController.php
      - searchDefinitions(string $word): array : use the dictionary api client and forward the result to the template show-definitions
  - Form
    - WordMeaningForm.php : the form with a text box and a button. could be in html pure without using it.
- templates
  - search-definitions.html.twig: show the page with the bottom form
  - show-definitions.html.twig: show the result panel
- tests
  - src
    - Unit
      - Api
        - DictionaryTest.php: here are our unit tests for the client.
          - No other unit tests are needed for this project, the rest can be tested through fonctional tests
- phpunit.xml: the configuration to load the autoloader of drupal and specifiy where the tests are located
- word_meaning.info.xml: the metadata of the module
- word_meaning.libraries.yml
  - form: my own javascript code to make the form come to life.
  - jquery: a library needed by backbone
  - underscore: a library needed by backbone
  - backbone: a tiny javascript framework ideal for this kinda use cases.
- word_meaning.module
  - word_meaning_theme: the templates I needed
  - word_meaning_form_alter: the code to inject the javascript in the good way.
    - I try to include directly in the template and the results was not meet my expectation since drupal inject also its js/css files, that's why I proceed this way.
- word_meaning.routing.yml
  - GET /dictionary/{word}
    - this show the html injected in the result-panel by javascript
      - I could've block call when it's not a xhr request
    - the parameter word is sanitized with requirements
  - GET /dictionary
    - this show the html form
- word_meaning.services.yml
  - word_meaning.guzzle_client
    - the preconfigured guzzle client as a service
      - http_errors is equals to false so that instead of throw an exception when the status code is not 200, it allows check the status code this way "$response->getStatusCode()".
  - word_meaning.api:
    - the php client for the dictionary api
  - word_meaning.dictionary_controller
    - the controller is declared as a service so that I can inject "word_meaning.api".

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

Build image php

```bash
  docker-compose build
```

Install dependencies

```bash
  docker-compose run --no-deps --user $(id -u) --entrypoint=/usr/local/bin/composer php install
```

Start the server

```bash
  docker-compose up -d
```

Clean drupal cache

```bash
  docker-compose run --user $(id -u) --entrypoint=/wait-for-it.sh php -h db -p 3306 -- /var/www/html/vendor/bin/drush cache:rebuild
```

Go to http://localhost/dictionary

