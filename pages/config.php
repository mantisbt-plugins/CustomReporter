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

auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
$t_title = plugin_lang_get( 'title' );
html_page_top( $t_title );
print_manage_menu();
?>

<br/>
<form action="<?php echo plugin_page( 'config_edit' ) ?>" method="post">
	<?php echo form_security_field( 'plugin_customreporter_config_update' ) ?>

	<table align="center" class="width50" cellspacing="1">

		<tr>
			<td class="form-title" colspan="2">
				<?php echo $t_title . ': ' . plugin_lang_get( 'config' )?>
			</td>
		</tr>

		<tr <?php echo helper_alternate_class() ?>>
			<td class="category">
				<?php echo plugin_lang_get( 'threshold' ) ?>
			</td>
			<td class="center">
				<select name="plugin_customreporter_threshold">
				<?php print_enum_string_option_list( 'access_levels', plugin_config_get( 'select_threshold'  ) ) ?>;
				</select>
			</td>
		</tr>

		<tr>
			<td class="center" colspan="3">
				<input type="submit" class="button" value="<?php echo lang_get( 'change_configuration' ) ?>" />
			</td>
		</tr>

	</table>
<form>

<?php
html_page_bottom1( __FILE__ );
