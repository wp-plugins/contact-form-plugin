=== Contact Form ===
Contributors: bestwebsoft
Donate link: http://bestwebsoft.com/
Tags: Contact Form, text, contact, form, contacts, contakt form, request, contact me, feedback form, feedback, contact button, contact form plugin, contacts form plugin, attachment, send, copy, atachment, send copy
Requires at least: 2.9
Tested up to: 3.3
Stable tag: 3.05

Add Contact Form to your WordPress website.

== Description ==

Contact Form allows you to add a feedback form easilly and simply to a post or a page.

<a href="http://wordpress.org/extend/plugins/contact-form-plugin/faq/" target="_blank">FAQ</a>
<a href="http://bestwebsoft.com/plugin/contact-form/" target="_blank">Support</a>

= Features =

* Actions: There is ability to choose to send email messages - any site user email or any other email.
* Actions: Ability to add a field to attach a file in the contact form.
* Actions: Ability to add a field to send a copy of the letter to the user who fills out a contact form to email, specified by filling the contact form.
* Label: There is a possibility to change the label when display fields on the form.

= Translate =

* Brazilian Portuguese (pt_BR) (thanks Breno Jacinto)
* German (de_DE) (thanks Hartung Thomas)
* Italian (it_IT) (thanks <a href="mailto:ilian@ultra-violet.it">Ilian Gagliardi</a>)
* Russian (ru_RU)
* Turkish (tr_TR) (thanks <a herf="mailto:d-bulent@hotmail.com ">Devrim Bulent Ibis</a>, www.devrimhoca.com)

If you create your own language pack or update the existing one, you can send <a href="http://codex.wordpress.org/Translating_WordPress" target="_blank">the text of PO and MO files</a> for <a href="http://bestwebsoft.com/" target="_blank">BWS</a> and we'll add it to the plugin. You can download the latest version of the program for work with PO and MO files  <a href="http://www.poedit.net/download.php" target="_blank">Poedit</a>.

== Installation ==

1. Upload `Contact Form` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in your WordPress admin panel.
3. You can adjust necessary settings through your WordPress admin panel in "Settings" > "Contact Form".
4. Create a page or a post and insert shortcode [contact_form] to the text.

== Frequently Asked Questions ==

= Where I can find settings to adjust work of the plugin after activation? =

1. In the 'Plugin' menu you can find a link to the settings page.

= After plugin installation I haven't adjust the settings. What is default email address which will be used for a contact via the form? =

1. Default address which was specified during WordPress installation will be used for the Contact Form plugin as default email address.

= How can I add Contact Form to my website? =

1. You need to put a [contact_form] shortcode into your page or some post.

= After user choosen via plugin settings page I got this error: "Please input correct email. Settings are not saved." =

1. It means that you have made a syntactical error.

= How to use the other language files with the Contact Form? = 

Here is an example for German language files.

1. In order to use another language for WordPress it is necessary to set the WP version on the required language and in the configurational wp file - `wp-config.php` in the line `define('WPLANG', '');` write `define('WPLANG', 'de_DE');`. If everything is done properly the admin panel will be in German.

2. Make sure that there are files `de_DE.po` and `de_DE.mo` in the plugin (the folder languages in the root of the plugin).

3. If there are no these files it will be necessary to copy other files from this folder (for example, for Russian or Italian language) and rename them (you should write `de_DE` instead of `ru_RU` in the both files).

4. The files are edited with the help of the program Poedit - http://www.poedit.net/download.php - please load this program, install it, open the file with the help of this program (the required language file) and for each line in English you should write the translation in German.

5. If everything is done properly all lines will be in German in the admin panel and on frontend.

== Screenshots ==

1. Contact Form dislaying.
2. Plugin settings in the WordPress admin panel.
3. Contact Form dislaying with additional fields.
4. Plugin settings in the WordPress admin panel with additional fields.

== Changelog ==

= V3.05 - 09.01.2012 =
* Bugfix : The bug sends email to admin user even if different user is specified when setting plugin to use "use email of wordpress user" was fixed.
* Bugfix : The bug with sending a blank attachment field of the form was fixed.

= V3.04 - 05.01.2012 =
* NEW : Added Brazilian Portuguese and Turkish language files for plugin.

= V3.03 - 04.01.2012 =
* NEW : Added German language files for plugin.
* Bugfix : The bug which is related with the resending of the email when updating of the page was fixed.

= V3.02 - 02.01.2012 =
* NEW : Added Italian language files for plugin.
* NEW : Added possibility to change the label when display fields on the form.
* Changed : Display the names of the files types that user can attach to the mail.

= V3.01 - 28.12.2011 =
* NEW : We added the 'Attachment' and 'Send me a copy' block in the contact form. 
* NEW : Added language files for plugin.

= V2.08 - 12.11.2011 =
*We fixed the slashes bug in email and added server info to email.

= V2.07 - 10.11.2011 =
*We fixed the bug of complex form validation when captcha not used in the contact form. Upgrade immediately.

= V2.06 - 16.09.2011 =
*We fixed the bug of complex email validation when filling in the contact form.

= V2.05 - 23.08.2011 =
*BWS Plugins sections was fixed and right now it is consisted with 3 parts: activated, installed and recommended plugins. The bug of position in the admin menu is fixed. Translation ommissions are corrected. Now there is a link to see the site where the email comes from.

= V2.04 - 14.07.2011 =
*BWS Plugins sections was fixed and right now it is consisted with 2 parts: installed and recommended plugins. Icons displaying is fixed.

= V2.03 - 13.07.2011 =
*The bug of the use custom email is fixed in this version. Please upgrade the plugin immediately. Thank you

= V2.02 =
*The bug of the setting page link is fixed in this version. Please upgrade the plugin immediately. Thank you

= V2.01 =
*Usability at the settings page of plugin was improved.

= V1.03 =
*Contact form email adress bug is fixed.

= V1.02 =
*Display "thanks" message bug is fixed. Radio buttons automatic switching added (for settings page) after setting mouse cursor (clicking) into a text field.

= V1.01 =
*Contact form position bug is fixed.

= V1.00 =
*Ability to add Contact Form into a post. Ability to display form via shortcode.

== Upgrade Notice ==

= V3.05 =
The bug sends email to admin user even if different user is specified when setting plugin to use "use email of wordpress user" was fixed. The bug with sending a blank attachment field of the form was fixed. Upgrade immediately.

= V3.04 =
Added Brazilian Portuguese and Turkish language files for plugin.

= V3.03 =
Added German language files for plugin. The bug which is related with the resending of the email when updating of the page was fixed. Upgrade immediately.

= V3.02 =
Added Italian language files for plugin. Added possibility to change the label when display fields on the form. Display the names of the files types that user can attach to the mail.

= V3.01 =
We added the 'Attachment' and 'Send me a copy' block in the contact form. Added language files for plugin.

= V2.08 =
We fixed the slashes bug in email and added server info to email.

= v2.07 =
We fixed the bug of complex form validation when captcha not used in the contact form. Upgrade immediately.

= V2.06 =
We fixed the bug of complex email validation when filling in the contact form.

= V2.05 =
BWS Plugins sections was fixed and right now it is consisted with 3 parts: activated, installed and recommended plugins. The bug of position in the admin menu is fixed. Translation ommissions are corrected. Now there is a link to see the site where the email comes from.

= V2.04 =
BWS Plugins sections was fixed and right now it is consisted with 2 parts: installed and recommended plugins. Icons displaying is fixed.

= V2.03 = 
The bug of the use custom email is fixed in this version. Please upgrade the plugin immediately. Thank you

= V2.02 =
The bug of the setting page link is fixed in this version. Please upgrade the plugin immediately. Thank you

= V2.01 =
Usability at the settings page of plugin was improved.

= V1.03 =
Contact form email adress bug is fixed. Upgrade immediately.

= V1.02 =
Display "thanks" message bug is fixed. Radio buttons automatic switching added (for settings page) after setting mouse cursor (clicking) into a text field. Upgrade immediately.

= V1.01 =
Contact form position bug is fixed. Upgrade immediately.

= V1.00 =
Upgrade immediately.