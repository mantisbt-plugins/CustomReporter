<?php
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
html_page_top1( lang_get( 'plugin_format_title' ) );
html_page_top2();
print_manage_menu();
?>
<br/>
<form action="<?php echo plugin_page( 'config_edit' ) ?>" method="post">
<table align="center" class="width50" cellspacing="1">

<tr <?php echo helper_alternate_class() ?>>
<td class="category">
<?php echo lang_get( 'reporter_select_threshold' ) ?>
</td>
<td class="center">
<select name="reporter_select_threshold">
<?php print_enum_string_option_list( 'access_levels', plugin_config_get( 'reporter_select_threshold'  ) ) ?>;
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