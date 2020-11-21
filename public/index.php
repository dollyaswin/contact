<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (__FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}

// Composer autoloading
require_once __DIR__ . '/../vendor/autoload.php';

$configs = require_once(__DIR__ . '/../config/local.php');
$cfg = ActiveRecord\Config::instance();
$cfg->set_model_directory('src/Model');
$cfg->set_connections($configs['db']['connection']);
$cfg->set_default_connection('development');

// test  model
// $contact = new SocialHP\Model\Contact;
$contact = SocialHP\Model\Contact::find(110);
echo 'id: ', $contact->id, PHP_EOL;
echo 'first_name: ', $contact->first_name, PHP_EOL;
echo 'last_name: ', $contact->last_name, PHP_EOL;
echo 'position: ', $contact->position, PHP_EOL;
echo 'doomain: ', $contact->domain->domain_name, PHP_EOL;
