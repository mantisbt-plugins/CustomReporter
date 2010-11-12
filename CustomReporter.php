<?php

class CustomReporterPlugin extends MantisPlugin {

	function register() {
		$this->name = 'CustomReporter';    
		$this->description = 'Ability to select Reporter';    
		$this->page = 'config';           
		$this->version = '1.01';     
		$this->requires = array( 'MantisCore' => '1.2.0', );
		$this->author = 'Carlos Proensa';        
		$this->contact = '';       
		$this->url = '';           
	}

	function config() {
		return array(
			'reporter_select_threshold'	=> DEVELOPER,
			);
	}


	function init() { 
		plugin_event_hook( 'EVENT_REPORT_BUG_FORM_TOP', 'reportBugFormTop' );
		plugin_event_hook( 'EVENT_REPORT_BUG_DATA', 'reportBug' );
	}

	function reportBugFormTop ( $p_event, $p_project_id){
		
		#
		#/ allow to change reporter_id (if access level is higher than defined)
		#
		$user_id= auth_get_current_user_id();
		$access_level= user_get_access_level( $user_id, $p_project_id );
		if ($access_level >plugin_config_get( 'reporter_select_threshold'  )) {
			?>
			<tr <?php echo helper_alternate_class() ?>>
			<td class="category" width="30%">
			<?PHP echo 'Reporter: ' ?>
			</td>
			<td width="70%">
			<select <?php echo helper_get_tab_index() ?> name="user_id">
			<?php
			print_reporter_option_list( $user_id, $p_project_id );
			?>
			</select>
			</td>
			</tr>
			<?PHP
		}
	}


	function reportBug($p_event,$p_bug_data) {
		// this custom input was created on bug_report page event
		$p_bug_data->reporter_id = gpc_get_int('user_id',auth_get_current_user_id());
		return $p_bug_data;
	}
}