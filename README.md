# Dismiss Browser Nag
[![Build Status](https://travis-ci.org/luciano-croce/dismiss-browser-nag.svg?branch=master)](https://travis-ci.org/luciano-croce/dismiss-browser-nag)

Dismiss "<strong>Browser Update</strong>" nag, dashboard widget, when is activated, or automatically, if it is in mu-plugins directory.
* WordPress automatically implements this feature with an annoying widget that is displayed on the dashboard without administrator control, even when you consciously use an out-of-date browser for the most varied reasons.
- Removing browser update widget, speeds up the loading of dashboard and yours operations on it.
* <strong>Tips</strong>: a neat trick, is to put this single file <strong>dismiss-browser-nag.php</strong> (not its parent directory) in the <strong>/wp-content/mu-plugins/</strong> directory (create it if not exists) so you won’t even have to enable it, and will be loaded by default, also, since first step installation of WordPress setup!
* <strong>Explanation</strong>: this, is <strong>different from the other similar plugins</strong>, because <strong>uses the filter hook, and not the action hook</strong>. Filters should filter information, thus receiving information/data, applying the filter and returning information/data, and then used. However, filters are still action hooks. WordPress defines add_filter/remove_filter as "hooks a function to a specific filter action", and add_action/remove_action as "hooks a function on to a specific action".
 - The code of this plugin, is not written with a php framework, but with a simple php editor, manually.
