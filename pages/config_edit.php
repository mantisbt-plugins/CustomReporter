<?php
# Custom Reporter
#
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

# Read inputs
$fv = 'plugin_CustomReporter_config_update';
form_security_validate( $fv );
$input_name = plugin_config_get( 'html_select_threshold_name' );
$f_reporter_select_threshold = gpc_get_int( $input_name, DEVELOPER );

# update results
plugin_config_set( $input_name, $f_reporter_select_threshold );
form_security_purge( $fv  );

print_successful_redirect( plugin_page( 'config', true ) );
