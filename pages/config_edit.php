<?php

# authenticate
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

# Read results
form_security_validate( 'plugin_customreporter_config_update' );
$f_reporter_select_threshold = gpc_get_int( 'plugin_customreporter_threshold', DEVELOPER );

# update results
plugin_config_set( 'select_threshold', $f_reporter_select_threshold );
form_security_purge( 'plugin_customreporter_config_update' );

# redirect
print_successful_redirect( plugin_page( 'config', true ) );
