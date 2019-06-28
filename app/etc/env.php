<?php
return [
  'backend' => [
    'frontName' => 'admin'
  ],
  'crypt' => [
    'key' => '87cb6a05b78c25160bf4879a3ce1e3b7'
  ],
  'db' => [
    'table_prefix' => '',
    'connection' => [
      'default' => [
        'host' => 'https://icoinpress.com/icoinpress/',
        'dbname' => 'icoinpress',
        'username' => 'admin',
        'password' => 'LAtuhoidau1988@!',
        'active' => '1'
      ]
    ]
  ],
  'resource' => [
    'default_setup' => [
      'connection' => 'default'
    ]
  ],
  'x-frame-options' => 'SAMEORIGIN',
  'MAGE_MODE' => 'developer',
  'session' => [
    'save' => 'files'
  ],
  'cache_types' => [
    'config' => 1,
    'layout' => 1,
    'block_html' => 1,
    'collections' => 1,
    'reflection' => 1,
    'db_ddl' => 1,
    'eav' => 1,
    'customer_notification' => 1,
    'config_integration' => 1,
    'config_integration_api' => 1,
    'full_page' => 1,
    'translate' => 1,
    'config_webservice' => 1,
    'vertex' => 1,
    'compiled_config' => 1
  ],
  'install' => [
    'date' => 'Sun, 26 May 2019 01:27:14 +0000'
  ]
];
