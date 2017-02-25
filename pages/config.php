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
layout_page_header( $t_title );
layout_page_begin( 'manage_overview_page.php' );
print_manage_menu();
?>

<br/>
<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container">

	<form action="<?php echo plugin_page( 'config_edit' ) ?>" method="post">
		<?php echo form_security_field( 'plugin_customreporter_config_update' ) ?>

		<fieldset>
			<div class="widget-box widget-color-blue2">
				<div class="widget-header widget-header-small">
					<h4 class="widget-title lighter">
						<i class="ace-icon fa fa-exchange"></i>
						<?php echo plugin_lang_get( 'config' ); ?>
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main no-padding">
						<div class="table-responsive">
							<table class="table table-bordered table-condensed table-striped">
								<tr>
									<td class="category">
										<?php echo plugin_lang_get( 'threshold' ) ?>
									</td>
									<td>
										<select id="plugin_customreporter_threshold"
												name="plugin_customreporter_threshold"
												class="input-sm"><?php
											print_enum_string_option_list(
												'access_levels',
												plugin_config_get( 'select_threshold' )
											); ?>
										</select>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="widget-toolbox padding-8 clearfix">
						<input type="submit"
							   class="btn btn-primary btn-white btn-round"
							   value="<?php echo lang_get( 'change_configuration' ) ?>"/>
					</div>
				</div>
			</div>
		</fieldset>
	</form>
</div>
</div>

<?php
layout_page_end();
