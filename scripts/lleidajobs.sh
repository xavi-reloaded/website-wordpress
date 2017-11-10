#!/usr/bin/env bash
chmod 777 -R /var/www/html/

wp db reset --yes
wp core install --url="http://localhost"  --title="LleidaJobs" --admin_user="admin" --admin_password="admin" --admin_email="xavi.hidalgo.fernandez@gmail.com"
wp core update

wp core language install es_ES
wp core language activate es_ES
wp plugin update --all

wp plugin activate wp-job-manager
wp plugin activate wp-job-manager-companies
wp plugin activate wp-job-manager-colors
wp plugin activate wp-job-manager-locations
wp plugin activate wp-job-manager-contact-listing
wp plugin activate woocommerce
wp plugin activate woocommerce-simple-registration
wp plugin activate testimonials-by-woothemes
wp plugin activate ninja-forms
wp plugin activate if-menu
wp plugin activate all-in-one-wp-migration



#wp theme activate jobify
#wp ai1wm restore localhost-20171105-052146-763.wpress

