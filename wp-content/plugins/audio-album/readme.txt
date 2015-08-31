=== Audio Album ===
Contributors: numeeja
Donate link: http://cubecolour.co.uk/wp
Tags: audio, album, playlist, music, mp3, ogg, m4a, wma, wav, media
Requires at least: 3.7
Tested up to: 3.9
Stable tag: 1.0.4
License: GPLv2

Displays a collection of audio tracks as an audio album on your site.

Makes use of the native WordPress Audio features.

== Description ==

The plugin was originally created for [Dave Draper's](http://davedrapercreations.co.uk/ "Dave Draper") website where the it is used on the music pages. For an example, please see the page for the [Wild Bunch album](http://davedrapercreations.co.uk/music/the-wild-bunch/ "The Wild Bunch").

Audio Album uses the default audio capabilities of mediaelement.js included with core WordPress files and enables you to style a group of audio files (MP3 etc) as single block formatted as an album. A basic stylesheet is included, however this is intended to be used as a starting point with custom css being created appropriate to the theme on the WordPress site.

*Note:* This plugin does not transform a group of tracks into a playlist. If you need that, this is probably not the most appropriate plugin for your project.

You can display as many Audio Albums on your site as you need, with multiple albums on each page.

= Usage: =

There are two shortcodes that should both be used `[audioalbum]` and `[audiotrack]`

`[audioalbum]`
This shortcode should be used once as a header before the `[audiotrack]` shortcodes. The following attributes are optional. You should always include an [audioalbum] shortcode before any single or group of [audiotrack] shortcodes.

* title
* detail
* date

`[audiotrack]`
These attributes are specific to this plugin:

* title
* width
* height
* songwriter
* buttontext
* buttonlink
		
The following attributes can also be used in the `[audiotrack]` shortcode in the same way in which they are used in the default WordPress audio shortcode:

* src
* mp3
* ogg
* wma
* m4a
* wav
* loop
* autoplay
* preload

= Example =

`
[audioalbum title="The Album Title" detail="Some other Details" date="2013"]
[audiotrack title="Song One" songwriter="credit" mp3="http://domain.com/wp-content/uploads/audiofile1.mp3"]
[audiotrack title="Song Two" songwriter="credit" mp3="http://domain.com/wp-content/uploads/audiofile2.mp3"]
`

= Lyrics / other info in a popup window =
There are some additional parameters which can be added to the [audioalbum] shortcode to optionally add a button to allow a visitor to open a link on each audio track to open a page in your site within a popup window.

You need to first create the page, post, or custom post type post and make a note of the post/page id.

The attributes to add to the [audiotrack] shortcode to make the popup link

* buttonlink
* buttontext
* width
* height

Enter the page/post id of the target page as the value for the buttonlink attribute. No button will be shown unless a value is set for  this.

The buttontext attribute is optional, if no value is specified, the default label of 'lyrics' will be shown on the button.

The dimensions of the popup window can also be specified using optional width and height attributes. If no values are given, default values of 520px (width) and 400px (height) will be used.

If your site is using a Genesis child theme, as a little bonus, your popup page will use a landing-page template without a masthead, menus, sidebars or other distractions.


= Example with default 'lyrics' button =
`[audiotrack title="Song One" songwriter="credit" mp3="http://domain.com/wp-content/uploads/audiofile1.mp3" buttonlink="808"]`

= Example with custom button and custom popup window dimensions =
`[audiotrack title="Song Two" songwriter="credit" mp3="http://domain.com/wp-content/uploads/audiofile2.mp3" buttonlink="909" buttontext="linklabel" width="300" height="500"]`

The parameters used with the standard native WordPress audio shortcode outlined in the codex: [Audio Shortcode](https://codex.wordpress.org/Audio_Shortcode "Audio Shortcode") page can also be used in the `[audiotrack]` shortcode.

== Installation ==

1. Upload the plugin folder to your '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Where is the plugin's admin page? =

There isn't one. This is a lightweight plugin with no options, so there is no need for an admin page.

= Is it responsive? =

Yes - it should work with any responsive theme. It defaults to 100% of the width of the enclosing element. It works well with column shortcodes if you are using a theme or plugin that provides these.

= How can I change the colours? =

You can copy the css rules from the plugin's stylesheet into your child theme's stylesheet and then customise the colours or use a plugin to add in the css. The css rules should be fairly straighforward to work out.

= OK I've done that, now how do I stop the default styles from loading? =

You can prevent the built-in styles from loading by adding the following line to your child theme's functions.php or a custom functionality plugin:

`<?php remove_action('wp_print_styles', 'cc_audioalbum_css', 30); ?>`

= Can I display multiple albums on a single page? =

Yes you can. As many as you like.

= Can you create for me a customised stylesheet to fit in with the colours of my website? =

I'd love to, but my time is limited and this is beyond of the scope of the free support that I can give on the forums, I can offer this as a paid service. Please send me details of your requirements via the [cubecolour contact form](http://cubecolour.co.uk/contact/ "cubecolour contact form").

= Why do you spell the word 'colour' incorrectly? =

I don't, I'm from England.

= I am using the plugin and love it, how can I show my appreciation? =

You can donate via [my donation page](http://cubecolour.co.uk/wp/ "cubecolour donation page")

If you find the plugin useful I would also appreciate a glowing five star review on the [plugin review page](http://wordpress.org/support/view/plugin-reviews/audio-album/ "audio album plugin reviews")

If it isn't working for you, please read the documentation carefully. If it doesn't address your issue, post a question on the [plugin support forum](http://wordpress.org/support/plugin/audio-album/ "audio album plugin support forum") so we can have an opportunity to try to get it working before you leave a review.

== Screenshots ==

1. Using the default css in the plugin gives a flat monochrome appearance which should fit most site designs.
2. The appearance can be customised to fit your site's colour scheme using a few CSS rules in your child theme's stylesheet.

== Changelog ==

= 1.0.4 =

* Improved function to audio players with default style briefly showing as the page loads
* Uses Dashicons in plugin page links
* Minor CSS tweaks

= 1.0.3 =

* Fixes incorrect path to svg file in stylesheet

= 1.0.2 =

* Prevent unstyled players being flashed until the page has fully loaded
* Flat Player buttons to replace default gradient filled buttons

= 1.0.1 =

* Fixes function name collision which occurred when another cubecolour plugin is installed

= 1.0.0 =

* Initial Version

== Upgrade Notice ==

= 1.0.1 =

* Fixes function name collision if another cubecolour plugin is installed

= 1.0.0 =
* Initial Version