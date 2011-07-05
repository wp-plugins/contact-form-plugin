<?php
/*
Plugin Name: Contact Form Plugin
Plugin URI:  http://bestwebsoft.com/plugin/
Description: Plugin for portfolio.
Author: BestWebSoft
Version: 2.02
Author URI: http://bestwebsoft.com/
License: GPLv2 or later
*/
/*  Copyright 2011  BestWebSoft  ( plugin@bestwebsoft.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
wp_enqueue_style( 'cntctfrmStylesheet', WP_PLUGIN_URL .'/contact-form-plugin/contact_form_style.css' );

if( ! function_exists( 'bws_plugin_header' ) ) {
	function bws_plugin_header() {
		global $post_type;
		?>
		<style>
		#adminmenu #toplevel_page_my_new_menu div.wp-menu-image
		{
			background: url("<?php echo get_bloginfo('url');?>/wp-content/plugins/contact-form-plugin/images/icon_16.png") no-repeat scroll center center transparent;
		}
		#adminmenu #toplevel_page_my_new_menu:hover div.wp-menu-image,#adminmenu #toplevel_page_my_new_menu.wp-has-current-submenu div.wp-menu-image
		{
			background: url("<?php echo get_bloginfo('url');?>/wp-content/plugins/contact-form-plugin/images/icon_16_c.png") no-repeat scroll center center transparent;
		}	
		.wrap #icon-options-general.icon32-bws
		{
			background: url("<?php echo get_bloginfo('url');?>/wp-content/plugins/contact-form-plugin/images/icon_36.png") no-repeat scroll left top transparent;
		}
		</style>
		<?php
	}
}

add_action('admin_head', 'bws_plugin_header');

if( ! function_exists( 'bws_add_menu_render' ) ) {
	function bws_add_menu_render() {
		global $title;
		?>
		<div class="wrap">
			<div class="icon32 icon32-bws" id="icon-options-general"></div>
			<h2><?php echo $title;?></h2>
			<p><a href="http://wordpress.org/extend/plugins/captcha/">Captcha</a></p>
			<p><a href="http://wordpress.org/extend/plugins/contact-form-plugin/">Contact Form</a></p>
			<p><a href="http://wordpress.org/extend/plugins/facebook-button-plugin/">Facebook Like Button Plugin</a></p>
			<p><a href="http://wordpress.org/extend/plugins/twitter-plugin/">Twitter Plugin</a></p>
			<p><a href="http://wordpress.org/extend/plugins/portfolio/">Portfolio</a></p>
			<span style="color: rgb(136, 136, 136); font-size: 10px;">If you have any questions, please contact us via plugin@bestwebsoft.com or fill in our contact form on our site <a href="http://bestwebsoft.com/contact/">http://bestwebsoft.com/contact/</a></span>
		</div>
		<?php
	}
}

// Add option page in admin menu
if( ! function_exists( 'cntctfrm_admin_menu' ) ) {
	function cntctfrm_admin_menu() {
		//add_options_page( "Contact Form Options", "Contact Form", 'manage_options',  __FILE__, 'cntctfrm_settings_page' );
	add_menu_page(__('BWS Plugins'), __('BWS Plugins'), 'edit_themes', 'my_new_menu', 'bws_add_menu_render', " ", 90); 
		add_submenu_page('my_new_menu', 'Contact Form Options', 'Contact Form', 'edit_themes', "contact_form.php", 'cntctfrm_settings_page');

		//call register settings function
		add_action( 'admin_init', 'cntctfrm_settings' );
	}
}

// Register settings for plugin
if( ! function_exists( 'cntctfrm_settings' ) ) {
	function cntctfrm_settings() {
		global $cntctfrm_options;

		$cntctfrm_option_defaults = array(
			'cntctfrm_user_email' => 'admin',
			'cntctfrm_custom_email' => '',
			'cntctfrm_select_email' => 'user',
		);

		if( ! get_option( 'cntctfrm_options' ) )
			add_option( 'cntctfrm_options', $cntctfrm_option_defaults, '', 'yes' );

		$cntctfrm_options = get_option( 'cntctfrm_options' );

		$cntctfrm_options = array_merge( $cntctfrm_option_defaults, $cntctfrm_options );
	}
}

// Add settings page in admin area
if( ! function_exists( 'cntctfrm_settings_page' ) ) {
	function cntctfrm_settings_page() {
		global $cntctfrm_options;
		$error = "";	
		// Save data for settings page
		if( isset( $_REQUEST['cntctfrm_form_submit'] ) ) {
			$cntctfrm_options_submit['cntctfrm_user_email'] = $_REQUEST['cntctfrm_user_email'];
			$cntctfrm_options_submit['cntctfrm_custom_email'] = $_REQUEST['cntctfrm_custom_email'];
			$cntctfrm_options_submit['cntctfrm_select_email'] = $_REQUEST['cntctfrm_select_email'];
			$cntctfrm_options = array_merge( $cntctfrm_options, $cntctfrm_options_submit  );
			if( 'user' == $cntctfrm_options_submit['cntctfrm_select_email'] ) {
				if( false !== get_userdatabylogin( $cntctfrm_options_submit['cntctfrm_user_email'] ) )
				{
					update_option( 'cntctfrm_options', $cntctfrm_options, '', 'yes' );
					$message = "Options saved.";
				}
				else {
					$error = "Such user is not exist. Settings are not saved.";
				}
			}
			else {
				if( $cntctfrm_options_submit['cntctfrm_custom_email']  != "" && preg_match( "/^(?:[a-z0-9]+(?:[-_\.]?[a-z0-9]+)?@[a-z0-9]+(?:[-\.]?[a-z0-9]+)?\.[a-z]{2,5})$/i", trim( $cntctfrm_options_submit['cntctfrm_custom_email'] ) ) ) {
					update_option( 'cntctfrm_options', $cntctfrm_options, '', 'yes' );
					$message = "Options saved.";
				}
				else {
					$error = "Please input correct email. Settings are not saved.";
				}
			}
		}
		// Display form on the setting page
	?>
	<div class="wrap">
		<div class="icon32 icon32-bws" id="icon-options-general"></div>
		<h2>Contact Form Options</h2>
		<div class="updated fade" <?php if( ! isset( $_REQUEST['cntctfrm_form_submit'] ) || $error != "" ) echo "style=\"display:none\""; ?>><p><strong><?php echo $message; ?></strong></p></div>
		<div class="error" <?php if( "" == $error ) echo "style=\"display:none\""; ?>><p><strong><?php echo $error; ?></strong></p></div>
		<form method="post" action="admin.php?page=contact_form.php">
			<span style="margin-bottom:15px;">
				<p>If you would like to add a Contact Form to your website, just copy and put this shortcode onto your post or page: [contact_form]</p>
				If information in the below fields are empty then the message will be send to an address which was specified during registration.
			</span>
			<table class="form-table">
				<tr valign="top">
					<th scope="row" style="width:195px;">Use email of wordpress user: </th>
					<td>
						<input type="radio" id="cntctfrm_select_email_user" name="cntctfrm_select_email" value="user" <?php if($cntctfrm_options['cntctfrm_select_email'] == 'user') echo "checked=\"checked\" "; ?>/>
					</td>
					<td>
						<input type="text" name="cntctfrm_user_email" value="<?php echo $cntctfrm_options['cntctfrm_user_email']; ?>" onfocus="document.getElementById('cntctfrm_select_email_user').checked = true;" />
						<span style="color: rgb(136, 136, 136); font-size: 10px;clear:both;">Set a name of user wo will get messages from a contact form.</span>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="width:195px;">Use this email: </th>
					<td>
						<input type="radio" id="cntctfrm_select_email_custom" name="cntctfrm_select_email" value="custom" <?php if($cntctfrm_options['cntctfrm_select_email'] == 'custom') echo "checked=\"checked\" "; ?>/>
					</td>
					<td>
						<input type="text" name="cntctfrm_custom_email" value="<?php echo $cntctfrm_options['cntctfrm_custom_email']; ?>" onfocus="document.getElementById('cntctfrm_select_email_custom').checked = true;" />
						<span style="color: rgb(136, 136, 136); font-size: 10px;clear:both;">Set an email address which will be used for messages receiving.</span>
					</td>
				</tr>
				</tr>
			</table>    
			<input type="hidden" name="cntctfrm_form_submit" value="submit" />
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
	<?php 
	}
}

// Display contact form in front end - page or post
if( ! function_exists( 'cntctfrm_display_form' ) ) {
	function cntctfrm_display_form() {
		global $error_message;
		$content = "";

		$result = "";	
		// If contact form submited
		$name = isset( $_REQUEST['cntctfrm_contact_name'] ) ? $_REQUEST['cntctfrm_contact_name'] : "";
		$email = isset( $_REQUEST['cntctfrm_contact_emai'] ) ? $_REQUEST['cntctfrm_contact_emai'] : "";
		$subject = isset( $_REQUEST['cntctfrm_contact_subject'] ) ? $_REQUEST['cntctfrm_contact_subject'] : "";
		$message = isset( $_REQUEST['cntctfrm_contact_message'] ) ? $_REQUEST['cntctfrm_contact_message'] : "";
		if( isset( $_REQUEST['cntctfrm_contact_action'] ) )
		{
			// Check all input data
			$result = cntctfrm_check_form();
		}
		// If it is good
		if( true === $result ) {
			$content .= __( "Thank you for contact.", "cmntfrm" );
		}
		else if( false === $result )
		{
			// If email not be delivered
			$error_message['error_form'] = __( "Sorry, your e-mail could not be delivered.", "cmntfrm" );
		}
		else { 
			// Output form
			$content .= '<form method="post" id="cntctfrm_contact_form" action="" enctype="multipart/form-data">';
			if( isset( $error_message['error_form'] ) ) { 
				$content .= '<div style="text-align: left; color: red;">'.$error_message['error_form'].'</div>';
				}
				$content .= '<div style="text-align: left; padding-top: 5px;">
					<label for="cntctfrm_contact_name">Name:<span class="required"> *</span></label>
				</div>';
			if( isset( $error_message['error_name'] ) ) {
				$content .= '<div style="text-align: left; color: red;">'.$error_message['error_name'].'</div>';
			}
				$content .= '<div style="text-align: left;">
					<input class="text" type="text" size="40" value="'.$name.'" name="cntctfrm_contact_name" id="cntctfrm_contact_name" style="text-align: left; margin: 0;">
				</div>

				<div style="text-align: left;">
					<label for="cntctfrm_contact_email">E-Mail Address:<span class="required"> *</span></label>
				</div>';
			if( isset( $error_message['error_email'] ) ) {
				$content .= '<div style="text-align: left; color: red;">'.$error_message['error_email'].'</div>';
				}
				$content .= '<div style="text-align: left;">
					<input class="text" type="text" size="40" value="'.$email.'" name="cntctfrm_contact_emai" id="cntctfrm_contact_email" style="text-align: left; margin: 0;">
				</div>

				<div style="text-align: left;">
					<label for="cntctfrm_contact_subject1">Subject:<span class="required"> *</span></label>
				</div>';
			if( isset( $error_message['error_subject'] ) ) {
				$content .= '<div style="text-align: left; color: red;">'.$error_message['error_subject'].'</div>';
			}
				$content .= '<div style="text-align: left;">
					<input class="text" type="text" size="40" value="'.$subject.'" name="cntctfrm_contact_subject" id="cntctfrm_contact_subject" style="text-align: left; margin: 0;">
				</div>

				<div style="text-align: left;">
					<label for="cntctfrm_contact_message">Message:<span class="required"> *</span></label>
				</div>';
			if( isset( $error_message['error_message'] ) ) {
				$content .= '<div style="text-align: left; color: red;">'.$error_message['error_message'].'</div>';
			}
				$content .= '<div style="text-align: left;">
					<textarea rows="10" cols="30" name="cntctfrm_contact_message" id="cntctfrm_contact_message1">'.$message.'</textarea>
				</div>';
			$content .= apply_filters( 'cntctfrm_display_captcha' , $error_message );
				
				$content .= '<div style="text-align: left; padding-top: 8px;">
					<input type="hidden" value="send" name="cntctfrm_contact_action">
					<input type="submit" value="Submit" style="cursor: pointer; margin: 0pt; text-align: center;margin-bottom:10px;"> 
				</div>
				</form>';
		}
		return $content ;
	}
}

// Check all input data
if( ! function_exists( 'cntctfrm_check_form' ) ) {
	function cntctfrm_check_form() {
		global $error_message;
		$result = "";
		// Error messages array
		$error_message = array();
		$error_message['error_name'] = __( "Your name is required.", "cmntfrm" );
		$error_message['error_email'] = __( "A proper e-mail address is required.", "cmntfrm" );
		$error_message['error_subject'] = __( "Subject text is required.", "cmntfrm" );
		$error_message['error_message'] = __( "Message text is required.", "cmntfrm" );
		$error_message['error_form'] = __( "Please make corrections below and try again.", "cmntfrm" );
		// Check information wich was input in fields
		if( "" != $_REQUEST['cntctfrm_contact_name'] )
			unset( $error_message['error_name'] );
		if( "" != $_REQUEST['cntctfrm_contact_emai'] && preg_match( "/^(?:[a-z0-9]+(?:[-_\.]?[a-z0-9]+)?@[a-z0-9]+(?:[-\.]?[a-z0-9]+)?\.[a-z]{2,5})$/i", trim( $_REQUEST['cntctfrm_contact_emai'] ) ) )
			unset( $error_message['error_email'] );
		if( "" != $_REQUEST['cntctfrm_contact_subject'] )
			unset( $error_message['error_subject'] );
		if( "" != $_REQUEST['cntctfrm_contact_message'] )
			unset( $error_message['error_message'] );
		// If captcha plugin exists
		if( ! apply_filters( 'cntctfrm_check_form', $_REQUEST ) )
			$error_message['error_captcha'] = __( "Please complete the CAPTCHA.", "cmntfrm" );
		if( 1 == count( $error_message ) ) {
			unset( $error_message['error_form'] );
			// If all is good - send mail
			$result = cntctfrm_send_mail();
		}
		return $result;
	}
}

// Send mail function
if( ! function_exists( 'cntctfrm_send_mail' ) ) {
	function cntctfrm_send_mail() {
		global $cntctfrm_options;
		$to = "";
		if($cntctfrm_options['cntctfrm_select_email'] == 'user') {
			if( false !== $user = get_userdatabylogin($cntctfrm_options_submit['cntctfrm_user_email'] ) )
				$to = $user['user_email'];
		}
		else {
			$to = $cntctfrm_options['cntctfrm_custom_email'];
		}
		if( "" == $to ) {
			// If email options are not certain choose admin email
			$to = get_option("admin_email");
		}
		if( "" != $to ) {
			// subject
			$subject = $_REQUEST['cntctfrm_contact_subject'];
			// message
			$message = '
			<html>
			<head>
				<title>Contact from'.get_bloginfo('name').'</title>
			</head>
			<body>
				<table>
					<tr>
						<td width="160">Name</td><td>'.$_REQUEST['cntctfrm_contact_name'].'</td>
					</tr>
					<tr>
						<td>Email</td><td>'.$_REQUEST['cntctfrm_contact_emai'].'</td>
					</tr>
					<tr>
						<td>Subject</td><td>'.$_REQUEST['cntctfrm_contact_subject'].'</td>
					</tr>
					<tr>
						<td>Message</td><td>'.$_REQUEST['cntctfrm_contact_message'].'</td>
					</tr>
				</table>
			</body>
			</html>
			';

			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

			// Additional headers
			$headers .= 'From: '.$_REQUEST['cntctfrm_contact_emai']. "\r\n";

			// Mail it
			return @mail($to, $subject, $message, $headers);
		}
		return false;
	}
}

function cntctfrm_plugin_action_links( $links, $file ) {
		//Static so we don't call plugin_basename on every plugin row.
	static $this_plugin;
	if ( ! $this_plugin ) $this_plugin = plugin_basename(__FILE__);

	if ( $file == $this_plugin ){
			 $settings_link = '<a href="admin.php?page=contact_form.php">' . __('Settings', 'cntctfrm_plugin') . '</a>';
			 array_unshift( $links, $settings_link );
		}
	return $links;
} // end function cntctfrm_plugin_action_links

function cntctfrm_register_plugin_links($links, $file) {
	$base = plugin_basename(__FILE__);
	if ($file == $base) {
		$links[] = '<a href="admin.php?page=contact_form.php">' . __('Settings','cntctfrm_plugin') . '</a>';
		$links[] = '<a href="http://wordpress.org/extend/plugins/contact-form-plugin/faq/" target="_blank">' . __('FAQ','cntctfrm_plugin') . '</a>';
		$links[] = '<a href="Mailto:plugin@bestwebsoft.com">' . __('Support','cntctfrm_plugin') . '</a>';
	}
	return $links;
}

// adds "Settings" link to the plugin action page
add_filter( 'plugin_action_links', 'cntctfrm_plugin_action_links',10,2);

//Additional links on the plugin page
add_filter( 'plugin_row_meta', 'cntctfrm_register_plugin_links',10,2);

add_shortcode( 'contact_form', 'cntctfrm_display_form' );
add_action( 'admin_menu', 'cntctfrm_admin_menu' );

?>