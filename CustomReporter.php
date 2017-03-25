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

class CustomReporterPlugin extends MantisPlugin {

	function register() {
		$this->name = plugin_lang_get( 'title' );
		$this->description = plugin_lang_get( 'description' );
		$this->page = 'config';
		$this->version = '2.0.0';
		$this->requires = array( 'MantisCore' => '2.0.0', );
		$this->author = 'Carlos Proensa, Cas Nuy, Damien Regad';
		$this->contact = 'dregad@mantisbt.org';
		$this->url = 'https://github.com/mantisbt-plugins/CustomReporter/';
	}

	function config() {
		return array(
			'select_threshold' => DEVELOPER,
			);
	}


	function init() {
		plugin_event_hook( 'EVENT_REPORT_BUG_FORM_TOP', 'reportBugFormTop' );
		plugin_event_hook( 'EVENT_REPORT_BUG_DATA', 'reportBug' );
	}

	function reportBugFormTop( $p_event, $p_project_id ) {

		# allow to change reporter_id (if access level is higher than defined)

		$t_user_id = auth_get_current_user_id();
		$t_access_level = user_get_access_level( $t_user_id, $p_project_id );

		if ( $t_access_level >= plugin_config_get( 'select_threshold' ) ) {
?>
			<tr>
				<th class="category">
					<label for="reporter_id">
						<?php echo lang_get( 'reporter' ) ?>
					</label>
				</th>
				<td>
					<select id="reporter_id" name="reporter_id"
							<?php echo helper_get_tab_index() ?>
							class="autofocus input-sm">
						<?php print_reporter_option_list( $t_user_id, $p_project_id ) ?>
					</select>
				</td>
			</tr>
<?php
		}
	}


	function reportBug( $p_event, $p_bug_data ) {

		# this custom input was created on bug_report page event

		$p_bug_data->reporter_id = gpc_get_int( 'reporter_id', auth_get_current_user_id() );
		return $p_bug_data;
	}
}
