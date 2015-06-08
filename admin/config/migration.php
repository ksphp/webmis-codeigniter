<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['migration_enabled'] = FALSE;
$config['migration_type'] = 'timestamp';
$config['migration_table'] = 'migrations';
$config['migration_auto_latest'] = FALSE;
$config['migration_version'] = 0;
$config['migration_path'] = APPPATH.'migrations/';
