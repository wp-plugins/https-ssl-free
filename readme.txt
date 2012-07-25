=== Https SSL Free ===
Contributors: mediusproject
Donate link: http://mediusproject.org/
Tags: privacy, security, https, ssl
Requires at least: 1.0.1
Tested up to: 1.0.1
Stable tag: 1.0.1
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

This plugin allows you to log into your wordpress using the free https service from medius project inc.


== Description ==

This plugin allows you to log into your wordpress using the free https service from medius project inc.

= How does work it? =

This plugin convert your admin address to a subdomain of 1.com.ar, filtering the login and logout URLs that WordPress uses to generate its internal links. 

For example, if your admin address is http://www.wordpress.org/wp-admin this plugin convert it to https://www_wordpress_org.1.com.ar/wp-admin

= What is the advantage of this? =

The service we provide through www.1.com.ar gives you the ability to access your secure site without buying a certificate. Simply enter the web
address of your site and will automatically be redirected to a subdomain where you can surf safely and all data you exchange travel in encrypted form.

If you need to use some application or have the need to access your site securely without going through our 1.com.ar can do so by entering the url of 
your site so https://www_mesi_com_ar.1.com.ar (we take the www.mesi.com.ar site) where you replace "." (points) with "_" (underscore) and added to the 
final "1.com.ar".

= Why do i need a https site? =

For data traveling from your computer to your website and from your website to your computer do not plain text but do it safely or "encrypted",
you must purchase a certificate from a certificate authority (verisign, godaddy, GeoTrust, etc.) and install on your server (usually requires a
unique IP configurations that can be annoying sometimes).

Once these settings by sending a username and password or any other data, they travel encrypted and can not be decoded without the person that you
want to address need for encryption keys. This is what it does, in a very brief, the SSL protocol.

The goal of intosecure inc is provide this service for free.

For more information you can visite <http://mediusproject.org> and <http://intosecure.com/info-det.html>


Thanks to Mika Epstein for your help.

== Installation ==

1. Upload https_ssl_free.php to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress.


== Screenshots ==

1. Admin screen with the plugin activate (you can see the address)


== Changelog ==

= 1.0.1 =
* Improvement convert function
* Fixed stylesheet url
* Fixed pingback url
* Fixed stylesheet directory
* Remove admin and home filter url
* Added capacity to work with subdirectories

= 1.0.0 =
* Initial release