=== Https SSL Free ===
Contributors: mediusproject
Donate link: http://mediusproject.org/donate-2/
Tags: privacy, security, https, ssl
Requires at least: 1.0.1
Tested up to: 1.0.1
Stable tag: 1.0.1
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

This plugin allows you to log into your wordpress using the free https service from intosecure inc.


== Description ==

This plugin allows you to log into your wordpress using the free https service from intosecure inc.

= How does work it? =

This plugin converts your admin address to a subdomain of 1.com.ar, filtering the login and logout URLs that WordPress uses to generate its internal links. 

For example, if your admin address is http://www.wordpress.org/wp-admin this plugin converts it to https://www_wordpress_org.1.com.ar/wp-admin

= What is the benefit of using our plug-in? =

The service we provide through www.1.com.ar gives you the ability to access your secure site without buying a certificate. Simply enter the web
address of your site and will automatically be redirected to a subdomain where you can surf safely and all data you exchange will travel encrypted.

If you need to use some application or have the need to access your site securely without going through our 1.com.ar can do so by entering the url of 
your site so https://www_mesi_com_ar.1.com.ar where "." (dots) are replace by "_" (underscores) on the main domain and adding "1.com.ar" at then url.

= Why do i need a https site? =

If you would like data traveling from your computer to your website and from your website to your computer to be safely "encrypted" you must purchase a certificate 
from a certificate authority (verisign, godaddy, GeoTrust, etc.) and must install it on your server (which usually requires a unique IP configurations that can be  
sometimes inconvenient).

We provide a safe internet connection to any server. Connections are seen in the address bar as https://.  Not only to make users to trust the connection and its information
exchange through this proxy, but also allows sites to provide the https:// URLS in order to fulfill some websites requirements.

Medius Project’s goal is to provide this service for free.

For more information please visit http://mediusproject.org and http://intosecure.com/info-det.html

Donate to this plugin http://mediusproject.org/donate-2/ 

Special thanks to Mika Epstein for all the help.


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