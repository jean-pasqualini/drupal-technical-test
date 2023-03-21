<?php

$databases['default']['default'] = array(
  'database' => 'drupal',
  'username' => 'drupal',
  'password' => 'drupal',
  'host' => 'db',
  'driver' => 'mysql',
);

$config_directories['sync'] = '../config/sync';

$settings['hash_salt'] = 'yourhashsalt';

$settings['trusted_host_patterns'] = array(
  '^localhost$',
);

$settings['install_profile'] = 'standard';

$settings['update_free_access'] = FALSE;

$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/default/services.yml';

$settings['file_scan_ignore_directories'] = [
  'node_modules',
  'bower_components',
];

$settings['file_private_path'] = '../private';

$settings['file_public_path'] = 'sites/default/files';
$settings['file_public_base_url'] = 'sites/default/files';

$settings['config_sync_directory'] = '../config/sync';

$settings['allow_authorize_operations'] = FALSE;

$settings['rebuild_access'] = FALSE;

$settings['entity_update_batch_size'] = 50;

$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/development.services.yml';
$settings['cache']['bins']['render'] = 'cache.backend.null';

$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/default/local.services.yml';

$settings['skip_permissions_hardening'] = TRUE;

$settings['simpletest_clear_results'] = FALSE;

$config['system.site']['name'] = 'Word meaning';
$config['system.site']['mail'] = 'admin@example.com';
$config['system.logging']['error_level'] = 'hide';
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;
$config['system.performance']['cache']['page']['max_age'] = 0;
$config['system.performance']['cache']['page']['use_internal'] = FALSE;

$settings['install_profile'] = 'standard';

$config['system.file']['path']['temporary'] = '/tmp';

$config['system.theme']['default'] = 'stable';

$config['system.module']['update']['fetch_url'] = 'https://updates.drupal.org/release-history';

$settings['extension_discovery_scan_tests'] = FALSE;
