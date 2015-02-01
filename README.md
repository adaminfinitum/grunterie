#Grunterie - Working with Foundation 5.4.3

This is a customized fork of Grunterie is a WordPress theme based on [Reverie](http://themefortress.com/reverie/), a "versatile HTML5 responsive WordPress framework based on [ZURB's Foundation](http://foundation.zurb.com/)." Reverie is set up to use the Compass gem to compile SCSS. With this version of Grunterie you still use Compass but the compilation and watching is handled via Grunt (or Compass).

> **NOTE:**
> Disregard the instructions below the double lines (2 horizontal rules).
> After trying to use this theme following those instructions, it failed.
> As such, I added all the Node and Bower dependencies to this repo.
> Instead of installing anything:
> - fork this repo 'as-is'
> - make sure you have the exact specified versions of Sass/Compass installed
> - make it rain

It seems Foundation did not aniticipate anyone not wanting to use libsass but wanting to use Grunt...it's taken me _dozens of hours to get a fully working copy_; consider that a word of warning before you type `bower update`.

You can always use Sass with a Compass project but not the other way around. Plus, there's some pretty slick stuff that Compass does and that "plays nice" with it like: the SCSS syntax snippets that the Colorzilla CSS3 gradient generator spits out and [Effeckt.css](http://h5bp.github.io/Effeckt.css/).

I'm creating this for [my own website](http://www.adaminfinitum.com/) (so you can probably see it in action there) and as a starting point for client projects.

Uses [Grunt](http://gruntjs.com/) for task automation and quality assurance but my primary concerns are actually performance (very few HTTP requests compared to the average WordPress site due to concatenation and minification of files).
 * Built with Foundation 5.4.3 (minor changes to size of layout, color scheme and typography rules. all are readily apparent when viewing `settings.scss`)
 * Includes all the great features in Reverie (Really, I didn't change much)
 * Ready out-of-the-box if you don't want to bother with SASS
 * Built using the instructions in the [Foundation docs](http://foundation.zurb.com/docs/sass.html)
 * Takes full advantage of Grunt (more to come, I'm just glad it's working)
 * Update Foundation any time with ```foundation update``` (Requires Foundation gem--be careful before you do this)
 * Built to compile SCSS with Compass by default
 * Uses my favorite parts of the fantastic [Roots Theme](http://roots.io/) (relative URLs included but not working)
 * Automatically downloads my favorite WordPress plugins
 * Includes WAI-Aria role attributes (helps accessiblity)
 * Added [Schema.org](http://schema.org/) semantic web markup
 * Internationalized quote marks inserted via CSS
 * Built with web performance and security considerations (no version number query strings)
 * Includes SVG social media icons for a few of the most popular services

**Some things that a developer might expect to be dynamic (charset, language, some assets) are hard-coded to cut down on database queries an improve performance.**

While I build sites with international users and accessibility in mind, I have never worked on a non-English site and I always encode in UTF-8 so I added those attributes to the source code rather than as database queries.

***
***

## ~~Requirements~~ (see note above)

Should be ready to use but that being said, if you want to customize the theme with SASS using lib-sass or Compass instead of writing vanilla css, ~~you'll still need to follow the directions below.~~

You'll need to have the following items installed before continuing.

  * [Node.js](http://nodejs.org): Use the installer provided on the NodeJS website.
  * [Grunt](http://gruntjs.com/): Run `[sudo] npm install -g grunt-cli`
  * [Bower](http://bower.io): Run `[sudo] npm install -g bower`

## ~~Quickstart~~

```bash
git clone https://github.com/ThoughtwireMedia/thoughtwm.git
cd grunterie
[sudo] npm install
bower install
```

Dec 2014: If you use [Homebrew](http://brew.sh) be advised that there is a new recommended way of installing (and updating) [Node via Homebrew](https://github.com/Homebrew/homebrew/pull/28075).

While you're working on the project, run:

`grunt`

As noted above, I had a heck of a time getting it to work right...not entirely sure why but based on some discussions in support forums (and some notes on the project page for `grunt-contrib-compass`) I ended up uninstalling and re-installing Compass and Sass.

***

Sept. 15 2014 - It's working for me with Sass 3.4.0 and Compass 1.0.1...I've read that `npm install` shouldn't require  `sudo` but it always does for me, `bower install` doesn't (modified, see update from Dec 2014, *supra*).

***

## Directory Structure

  * `scss/_settings.scss`: Foundation configuration settings go in here
  * `scss/app.scss`: Application styles go here (Probably no need to mess with this.)
  * `scss/app.scss` pulls the styles from `bower_components/foundation/scss` including a file I added for custom styles (named `custom.scss`), theme styles go here

#Using Compass

Grunterie uses the [grunt-compass-contrib](https://github.com/gruntjs/grunt-contrib-compass) plugin.

To use Compass, you'll need to make sure the compass gem is installed (```gem install compass```).

After that, just run `grunt`

Production sites should have the `compass` task settings in `Gruntfile.js` toggled accordingly. One of the required plugins, Piklist, does something weird to menus (it wraps the 'title' attributes of the links in `span`s which then become visible and look ridiculous) so I always go into the plugin itself `/wp-content/plugins/piklist/includes/class-piklist-menu.php` and comment out a few lines towards the end of the file, currently lines 75-82.
