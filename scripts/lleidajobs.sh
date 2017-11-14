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

#delete sample post
wp post delete 1 --force
#delete sample page
wp post delete 2 --force

#copy language traduction from wp-job-manager folder to wordpress language plugin folder
cp -rf /var/www/html/wp-content/plugins/wp-job-manager/languages/es.po /var/www/html/wp-content/languages/plugins/wp-job-manager-es_ES.po
cp -rf /var/www/html/wp-content/plugins/wp-job-manager/languages/es.mo /var/www/html/wp-content/languages/plugins/wp-job-manager-es_ES.mo


#create backup and restore if exists previous backup
file="/var/www/html/scripts/backup/backup.sql"
if [ -f $file ]; then
   wp db import $file
else
   wp db export $file
fi

#wp theme activate jobify
#wp ai1wm restore localhost-20171105-052146-763.wpress

