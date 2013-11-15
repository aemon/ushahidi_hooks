<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * @package  Core
 *
 * Sets the default route to "welcome"
 */

$config['_default'] = 'reports';
$config['feed/atom'] = 'feed/index/atom';

$config['ochevidec'] = 'reports/submit';

$config['reports/([0-9]+)(-)([a-z0-9/-]+)'] = 'reports/view/$1';
$config['reports/([0-9]+)-'] = 'reports/view/$1';
$config['reports/([0-9]+)'] = 'reports/view/$1';

$config['sobytiya'] = 'reports/';
$config['message'] = 'contact/';

$config['sob/([0-9]+)(-)([a-z0-9/-]+)'] = 'reports/view/$1';
$config['sob/([0-9]+)-'] = 'reports/view/$1';
$config['sob/([0-9]+)'] = 'reports/view/$1';

$config['form1'] = 'http://112.ua';

// Action::config - Config Routes
Event::run('ushahidi_action.config_routes', $config);
