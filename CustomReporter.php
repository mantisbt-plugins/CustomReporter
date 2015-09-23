<?php

class CustomReporterPlugin extends MantisPlugin {

	function register() {
		$this->name = lang_get( 'plugin_customreporter_title' );
		$this->description = lang_get( 'plugin_customreporter_description' );
		$this->page = 'config';
		$this->version = '1.03';
		$this->requires = array( 'MantisCore' => '1.2.0, < 1.4', );
		$this->author = 'Carlos Proensa, Cas Nuy, Damien Regad';
		$this->contact = '';
		$this->url = '';
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
			if (substr(MANTIS_VERSION, 0, 3) == "1.3")
			{		
?>		    
				<div class="field-container">
					<label><span><?php echo lang_get( 'reporter' ) ?></span></label>
					<span class="input">
						<select <?php echo helper_get_tab_index() ?> name="reporter_id">
							<?php print_reporter_option_list( $t_user_id, $p_project_id ) ?>
						</select>
					</span>
					<span class="label-style"></span>
				</div>
<?php
			}
			elseif (substr(MANTIS_VERSION, 0, 3) == "1.2")
			{				
?>		
				<tr <?php echo helper_alternate_class() ?>>
					<td class="category" width="30%">
						<?php echo lang_get( 'reporter' ) ?>
					</td>
					<td width="70%">
						<select <?php echo helper_get_tab_index() ?> name="reporter_id">
							<?php print_reporter_option_list( $t_user_id, $p_project_id ) ?>
						</select>
					</td>
				</tr>
<?php
			}
		}
	}


	function reportBug( $p_event, $p_bug_data ) {

		# this custom input was created on bug_report page event

		$p_bug_data->reporter_id = gpc_get_int( 'reporter_id', auth_get_current_user_id() );
		return $p_bug_data;
	}
}
