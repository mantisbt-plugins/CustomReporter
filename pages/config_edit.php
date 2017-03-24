<?php
/**
 * CustomReporter plugin for MantisBT
 * https://github.com/mantisbt-plugins/CustomReporter
 *
 * Copyright (c) 2011  Carlos Proensa, Cas Nuy
 * Copyright (c) 2011  Damien Regad - dregad@mantisbt.org
 *
 * This file is part of the CustomReporter plugin for MantisBT.
 *
 * CustomReporter is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

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
