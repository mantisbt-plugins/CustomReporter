<?php
// authenticate
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
// Read results
$f_reporter_select_threshold = gpc_get_int( 'reporter_select_threshold', DEVELOPER );
// update results
plugin_config_set( 'reporter_select_threshold', $f_reporter_select_threshold );
// redirect
print_successful_redirect( plugin_page( 'config',TRUE ) );