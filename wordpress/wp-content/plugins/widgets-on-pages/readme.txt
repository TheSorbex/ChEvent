=== Widgets on Pages ===
Contributors: toddhalfpenny
Donate link: https://datamad.co.uk/donate/
Tags: widgets, widgets in page, widgets in post, sidebar, pages, post, shortcode, inline, widgetise, widgetize
Requires at least: 2.8
Tested up to: 4.7.4
Stable tag: 1.0.4

The easiest and highest rated way to Add Widgets or Sidebars to Posts and Pages using shortcodes or template tags.

== Description ==

The easiest, and highest rated way to Add Widgets to Posts and/or Pages. Create unlimited dynamic sidebars (widget areas) and insert these into a WordPress post or page.

There is one default widget area that can be used or you can add more from the settings menu. You can have an unlimited number of sidebars, and these can be used multiple times.

Each sidebar can be called indepentenly by a shortcode and you can call more than one per post/page.

Sidebars can be included in the post/page by using a shortcode like the following, where `x` is the name of the sidebar.

`[widgets_on_pages id=x]`

The sidebars can also be added to any theme, using template tags. This is an ace way to add widgets to a theme's header and footer.


== Installation ==

1. Install the plugin from within the Dashboard or upload the directory `widgets-on-pages` and all its contents to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Add the widgets you want to the `Widgets on Pages` widget area in the admin screens
1. Add the shortcut `[widgets_on_pages id=x]` to the page or post in the place where you'd like your widgets to appear (where 'x' = the id of the sidebar to use (or the name if you have named it such as `[widgets_on_pages id=TagCloud]`). If using only the default sidebar then no 'id' argument is needed (i.e. `[widgets_on_pages]`).
1. To add a sidebar into a theme you can add the following type of code to the relevant PHP theme file. `<?php widgets_on_template("wop_1"); ?>`
1. If you see bullet points/images next to the widget titles when using this plugin use the 'Enable Styling' setting in the options page
1. For further info check out these ace videos put together by Jessica Barnard
[youtube http://www.youtube.com/watch?v=h957U96SFYE]

== Frequently Asked Questions ==

= How can I remove the bullet points which appear next to each widget? =

Simply select the 'Enable Styling' setting in the Widgets on Pages options page.

= I did the above but the bullets still show, what now =

Your theme's CSS is probably overriding your setting... you could try using your browsers *inspect element" function to see what part of the CSS is setting the list-style.

= Can I have more than one defined sidebar area =

Yes... you can have an unlimited number of sidebars defined. The number available can be administered via the settings menu.

= What widgets are supported? =

All of them. Yup, We've not come across a single non-working one yet.

Yes... you can have an unlimited number of sidebars defined. The number available can be administered via the settings menu.

== Screenshots ==

1. Setting up the sidebars.

2. Widgets on Pages 'Turbo Sidebars' page.


== Changelog ==

= 1.0.3 =
1. Fixed [issue](https://wordpress.org/support/topic/settings-button-in-all-of-the-plugins/#post-8980118) with "Settings" link appearing next to each plugin.
1. Added link to the Turbo Sidebars from the old Settings page, as per [this forum post](https://wordpress.org/support/topic/all-widgets-gone-cant-create-new-ones/), great idea.


= 1.0.2 =
1. Fixed issue headers being sent from template tag function.


= 1.0.1 =
1. Fixed issue with php warning when styling checkbox was unchecked.


= 1.0.0 =

1. Re-written to use OO approach and best practices, using the [WordPress Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate) project and [WordPress Coding Standards](https://codex.wordpress.org/WordPress_Coding_Standards)
1. Fixed [Undefined Index: enable_css issue](https://wordpress.org/support/topic/undefined-index-enable_css/) from the support forum
1. Added suggestion [Enqueue the CSS](https://wordpress.org/support/topic/enqueue-the-css/) from the support forum
1. Moved admin menu to *Appearance*
1. Use of Turbo Sidebars as our special widget areas. Better management through CPT


= 0.0.12 =

1. Updated intermals to "re-hide" options screen from non Administrators (thanks to fran klin for spotting this)
1. Removed some potential name conflicts

= 0.0.11 =

1. Replaced all short PHP tags with long ones to ensure the plugin worked as expected even on sites where PHP short tags were disabled. Props to drdanchaz over at the WordPress.org forums for the tip-off.
1. Added more specific selectors to the wop.css to target ul>li as well as ul.

= 0.0.10 =

1. Added option to add CSS file to auto remove bullets... this has been the biggest cause of support mails/forum posts.

= 0.0.9 =

1. Corrected shortcode tags show in Widget admin page.

= 0.0.8 =

1. Resolve potential conflicts with other plugins (contextual help callback).
1. Fixed bug so that Widgets settings are not lost when switching themes. Credit to wesleong over at WordPress.org forums for getting this fix on the right track!
1. Add settings link on main dashboard plugins page


= 0.0.7 =

1. Resolve conflict with YouTube Lyte plugin (thanks to Massa P for the tip off)
1. Can now add sidebars via template tags so extra sidebars can be added to themes very quickly.
1. Added contextual help.

= 0.0.6 =

Sidebars can now be named via the options page. These names can be used in place of the numerical id used in older versions. Note that if you change the name you will need to manually update any shortcodes where this is being used.

= 0.0.5 =

Fix for activation errors. Looks like it might've been the use of php short open tags or line ending chars.

= 0.0.4 =

There is now no longer a limit on the number of sidebars that can be defined. Each sidebar can be called independently.

= 0.0.3 =

The number of sidebars can now be defined via the settings menu. There can be up to 5 defined. Each sidebar can be called independently.

= 0.0.2 =

Minor update so that the functions.php code is not needed anymore... makes like easier.

= 0.0.1 =

1st release - only supports one defined in-post/page widget area


== Upgrade Notice ==

= 1.0.0 =

* Minor bug-fixes, but major re-write
* Moved admin menu to Top Level
* Widget areas are now powered by Turbo Sidebars. Even though this has been thoroughly tested, it is highly recommended to check you Widgets are still working as expected post-install. If things are not correct the plugin should not have deleted any of the existing config and so a rollback to 0.0.12 should fix issues. If you do run into issues please post details on the support board.
* Existing Widgets on Pages Sidebar config should be migrated automatically
