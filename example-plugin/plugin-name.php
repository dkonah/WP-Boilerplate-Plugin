<?php
/*
Plugin Name: Plugin Example
Plugin URI: http://example.com
Description: Do something useful
Version: 1.0.0
Author: author-name
Author URI: author-name url
License: GPL2
*/
 
function run_plugin_name() {
    

    spl_autoload_register(function ($class) {

        // project-specific namespace prefix
        $prefix = 'inc\\';

        // base directory for the namespace prefix
        $base_dir = __DIR__ . '/inc/';

        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            // no, move to the next registered autoloader
            return;
        }
        // get the relative class name
        $relative_class = substr($class, $len);


        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        // if the file exists, require it
        if (file_exists($file)) {
            require $file;
        }
    });

    $plugin = new inc\PluginNameClass();
    $plugin->run();
}

run_plugin_name();