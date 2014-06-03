=== Modal Links ===

Contributors: grglaz
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=43B53PFVBN9HA
Tags: modal, modal window, modal link, link, jquery modal, jquery dialog
Requires at least: 3.0.1
Tested up to: 3.9
Stable tag: 1.3.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

With this plugin you can create a "modal" link to open post/page and even login/logout and register form in modal window.

== Description ==

<strong>We appreciate any bug report. Thank you</strong>

With this plugin you can create a "modal" link to open post/page and even login/logout and register form in modal window.<br />
Install it and activate it to see it in action.<br />
Go to Settings->Modal Links and check the options.<br />

<strong>Always use this plugin with the latest wordpress version.</strong>
<strong>Before posting an issue to the support forum make sure that: <br />
- you use a valid shortcode or html link as modal links plugin expects.
- you have checked the issue by disabling all the others plugins you have on your wordpress.</strong>

_________________________

<strong>News:</strong>

* You can now select a pre-loading image for the dialog. Select the color and the size of the image.
* SPECIAL FIX for Contact Form 7 plugin. Shortcode is rendering fine now.

_________________________

<strong>Basic Features:</strong>

* Create modal link of post/page using shortcode or plain html link.
* Use of posts/pages as modals. No need to create new content somewhere else.
* Use id or permalink to target the post/page. Id is recommended.
* Use of special category "Modals" for different mechanism behaviour.
Modal Title is hidden and posts are hidden from anywhere in the site.
* Hide or Show post's/page's title in modal window using the shortcode attribute "title".
* Open wp's Login/Logout and Register form (in beta).
* Many options to adjust the modal to your own needs.
* It is multisite ready.
* Translation ready.
* It IS flexible.
* Add extensions to expand functionality.
* Check the <a href="https://wordpress.org/plugins/modal-links/faq/">FAQ</a>.

_________________________

<strong>Options:</strong>

* Width : Choose the width of dialog. Leave empty or '0' for auto.
* Width Type : Choose between fixed and responsive type. (px/%)
* Max Height : Choose the max height of dialog. After that value dialog goes scrollable.
* Max Height Type : Choose between fixed and responsive type. (px/%)
* Draggable : Choose if the dialog will be draggable. (true/false)
* Resizable : Choose if the dialog will be resizable. (true/false)
* Title : Choose to show or hide the title, global option overrides title attribute in shortcodes or the data-title attribute in "modal" links. (true/false)
* Animate on Show : Choose if the dialog will animate on opening. (true/false)
* Animate on Hide : Choose if the dialog will animate on hiding. (true/false)
* Dialog is Modal : Choose if the dialog will behave as modal or no. (true/false)
* Close Icon : Choose false to hide close (X) icon. (true/false)
* Close on Escape : Choose if the dialog will close using esc key. (true/false)
* Loading Image : Switch off or select the pre-loading image. (off/images)
* CSS Class : Enter any additional class that you want to attach to the dialog.

_________________________

<strong>Shortcode Attributes:</strong>

* <strong>id</strong> : The post's/page's id.
* <strong>permalink</strong> : The post's/page's permalink.
* <strong>title</strong> : To force the post's/page's title hide or show in modal window.
* <strong>login</strong> : Use login="true" to show wp's login/logout or register form.
* <strong>action</strong> : Use action="register" to show wp's register form.

Notes: <br />
* id or permalink are required to open a post/page. <br />
* login="true" is required to open login/logout or register form. <br />
* action="register" is required to open registration form. <br />
* title is optional in any case. <br />
* if both id and permalink provided, id will be used.

_________________________

<strong>HTML Link Attributes:</strong>

* <strong>id</strong> : The post's/page's id.
* <strong>href</strong> : The post's/page's permalink otherwise "#".
* <strong>data-title</strong> : To force the post's/page's title hide or show in modal window.
* <strong>data-login</strong> : Use data-login="true" to show wp's login/logout or register form.
* <strong>data-action</strong> : Use data-action="register" to show wp's register form.

Notes: <br />
* always provide target="_modal". <br />
* href should be set to '#' or set the post's/page's permalink. <br />
* data-login="true" is required to open login/logout or register form. <br />
* data-action="register" is required to open registration form. <br />
* data-title is optional in any case. <br />
* if both id and href="PERMALINK" provided, id will be used.

_________________________

<strong>Extensions:</strong>

Free <br />

* <strong>Read More V0.0.5</strong>
(uses the post's/page's read more link to open the complete post/page in modal window) <br />
<a href="http://georgelazarou.info/modalLinksExtensions/readmore">download</a>

* <strong>Meta Widget Login Register V0.0.2</strong>
(uses the meta widget and opens Login/Logout and Register links in modal window) <br />
<a href="http://georgelazarou.info/modalLinksExtensions/metawidgetloginregister">download</a>

* <strong>Validation V0.0.1</strong>
(checks if your modal links shortcodes in posts/pages are valid or no) <br />
<a href="http://georgelazarou.info/modalLinksExtensions/validation">download</a>

Paid <br />

* <strong>Shortcode GUI V0.0.4.1</strong>
(adds a GUI way to insert the shortcode into the wp editor. No need to know or remember anything) <br />
<a href="http://georgelazarou.info/modalLinksExtensions/shortcodegui/0.0.4">download</a> | <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HZ96FEXBA8NKA">donate</a> <br />

* <strong>Auto Open V0.0.2.1</strong></a>
(opens a post/page in modal window automatically. Selectable option for every post/page and front page) <br />
<a href="http://georgelazarou.info/modalLinksExtensions/autoopen/0.0.2">download</a> | <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8FPXMMF7LJDVC"> donate </a> <br />

* <strong>Menu Item V0.0.1</strong></a>
(adds modal links to navigation menus) <br />
<a href="http://georgelazarou.info/modalLinksExtensions/menuitem/0.0.1">download</a> | <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=C7ZGVUDTDEWU2"> donate </a> <br />

For the PAID extensions in order to access the download page, you have to make a small donation first. <br />
We think that these extensions diserve a small reward for usefulness and the time we have spent on them. <br />
You decide the amount of the donation. <br />
After the donation we get the transaction details and we email your credentials.

Check some screenshots for these extensions in <a href="https://wordpress.org/plugins/modal-links/screenshots/">Screenshots</a>.

_________________________

<strong>Learn by example:</strong>

Playing with the link name <br />

* Normal usage of link name. <br />
<strong>Shortcode:</strong> <code>[modalLinks id=“1”]link[/modalLinks]</code> <br />
<strong>HTML:</strong> <code><a target="_modal" href=“#” id=“1”>link</a></code>

* If you leave empty the link name in the shortcode dont worry, id/permalink or login/register form name will get in place. <br />
<strong>Shortcode:</strong> <code>[modalLinks id=“1”][/modalLinks]</code> <br />
<strong>Result:</strong> <code><a target="_modal" href=“#” id=“1”>1</a></code>

* You can use unclosed shortcode, again we take care the link name. <br />
<strong>Shortcode:</strong> <code>[modalLinks id=“1” /]</code> <br />
<strong>Result:</strong> <code><a target="_modal" href=“#” id=“1”>1</a></code>

Referring to the post/page by id or permalink <br />

* Open post/page with id ‘1’. <br />
<strong>Shortcode:</strong> <code>[modalLinks id=“1”]...</code> <br />
<strong>HTML:</strong> <code><a target="_modal" href=“#” id=“1”>...</code>

* Open post/page with permalink ‘?p=1’. <br />
<strong>Shortcode:</strong> <code>[modalLinks permalink=“?p=1”]...</code> <br />
<strong>HTML:</strong> <code><a target="_modal" href=“?p=1”>...</code>

* If you provide both id and permalink in the shortcode, id will be used. <br />
<strong>Shortcode:</strong> <code>[modalLinks id=“1” permalink=“?p=2”]...</code> <br />
<strong>RESULT:</strong> <code><a target="_modal" href=“#” id=“1”>...</code>

Showing or hiding the title of post/page <br />

* Title is NOT showing for post/page with id ‘1’. <br />
<strong>Shortcode:</strong> <code>[modalLinks id=“1” title=“false”]...</code> <br />
<strong>HTML:</strong> <code><a target="_modal" href=“#” id=“1” data-title=“false”>...</code>

* Title is showing for post with id ‘2’ which is in ‘Modal’ category. <br />
<strong>Shortcode:</strong> <code>[modalLinks id=“2” title=“true”]...</code> <br />
<strong>HMTL:</strong> <code><a target="_modal" href=“#” id=“2” data-title=“true”>...</code>

Open wordpress’s Login/Logout or Register form. <br />

* Opens login or logout according of user’s state. <br />
<strong>Shortcode:</strong> <code>[modalLinks login=“true”]...</code> <br />
<strong>HTML:</strong> <code><a target="_modal" href=“#” data-login=“login”>...</code>

* Opens registration form no matter of user’s state. <br />
<strong>Shortcode:</strong> <code>[modalLinks login=“true” action=“register”]...</code> <br />
<strong>HTML:</strong> <code><a target="_modal" href=“#” data-login=“login” data-action=“register”>...</code>

== Installation ==

1. Upload the folder "modal-links" to the "/wp-content/plugins/" directory or install it through WordPress directly.
2. Activate the "Modal Links" plugin through the 'Plugins' menu in WordPress.
3. Go to Settings->Modal Links and check the options.

== Frequently Asked Questions ==

= How do i create a modal link? =

Use the shortcode <br /><strong>[modalLinks]LINK_NAME[/modalLinks]</strong><br /> in a post or page.<br />

<strong>Shortcode Attributes:</strong>

* <strong>id</strong> : The post's/page's id.
* <strong>permalink</strong> : The post's/page's permalink.
* <strong>title</strong> : To force the post's/page's title hide or show in modal window.
* <strong>login</strong> : Use it without id or permalink attributes to show wp's login/logout form.
* <strong>action</strong> : Use action="register" with 'login' attribute provided to show wp's register form.

<strong>Notes:</strong> <br />
* id or permalink are required to open a post/page. <br />
* login is required to open login/logout form. <br />
* action="register" is required to open registration form. <br />
* title is optional in any case. <br />
* if both id and permalink provided, id will be used.

= What if i have shortcodes in my post or page? =

Shortcodes should render fine in the modal.
Alhough some seems that not responding.

= Does this plugin works for both posts and pages? =

Yes.

= Does this plugin works for any permalink setting? =

Yes, except of custom permalinks if you refer to a post/page by permalink.

= Which library do you use for the modal? =

Wordpress's built in jQuery Dialog.

= Where can i find extensions? =

In <a href="https://wordpress.org/plugins/modal-links/">Description</a>.

== Screenshots ==

1. screenshot-1.png The menu in settings
2. screenshot-2.png The plugin's settings
3. screenshot-3.png The shorthand
4. screenshot-4.png The link
5. screenshot-5.png The modal in action
6. screenshot-6.png
7. screenshot-7.png Read More extension
8. screenshot-8.png Meta Widget Login Register extension
9. screenshot-9.png Validation extension
10. screenshot-10.png Shortcode GUI extension
11. screenshot-11.png Auto Open extension (for Post/Page)
12. screenshot-12.png Auto Open extension (for Front Page)
13. screenshot-13.png Auto Open extension (Options)

== Changelog ==

= 1.3.8 =
Bug fixed.

= 1.3.7 =
New option added. Bug fixed.

= 1.3.6 =
Bug fixed.

= 1.3.5 =
Better shortcode rendering.

= 1.3.1 =
Bugs fixed.

= 1.3.0 =
New option added, Bugs fixed.

= 1.2.0 =
New option added, Bugs fixed.

= 1.1.0 =
Animation options added in the settings page.

= 1.0.0 =
First stable version

= 0.0.9 =
bugs fix, faster code...

= 0.0.8 =
login/logout and register form improved css...

= 0.0.7 =
bugs fix, lots of new things

= 0.0.6 =
modal window width can now be setup

= 0.0.5 =
many fixes

= 0.0.4 =
now you can hide post's or page's title

= 0.0.3 =
now you can use permalink instead id in shortcode

= 0.0.2 =
Bugs fix

= 0.0.1 =
First version

== Upgrade Notice ==

= 1.3.8 =
Bug fixed.

= 1.3.7 =
New option added. Bug fixed.

= 1.3.6 =
Bug fixed.

= 1.3.5 =
Better shortcode rendering.

= 1.3.1 =
Bugs fixed.

= 1.3.0 =
New option added, Bugs fixed.

= 1.2.0 =
New option added, Bugs fixed.

= 1.1.0 =
Animation options added in the settings page.

= 1.0.0 =
First stable version

= 0.0.9 =
bugs fix, faster code...

= 0.0.8 =
login/logout and register form improved css...

= 0.0.7 =
bugs fix, lots of new things

= 0.0.6 =
modal window width can now be setup

= 0.0.5 =
many fixes

= 0.0.4 =
now you can hide post's or page's title

= 0.0.3 =
now you can use permalink instead id in shortcode

= 0.0.2 =
Bugs fix

= 0.0.1 =
This is the first version