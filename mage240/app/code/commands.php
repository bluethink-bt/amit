
check RAM : sudo lshw -c memory
Elastic search Enable: sudo systemctl restart elasticsearch
GET status of Elastic search : sudo systemctl status elasticsearch 

	sudo php bin/magento setup:upgrade
	sudo php  bin/magento setup:di:compile
	sudo php bin/magento setup:static-content:deploy -f
	sudo php bin/magento c:c
	sudo php bin/magento c:f
	sudo chmod -R 777 var/ generated/ pub/ app/
	Permission to all : sudo chmod -R 777 ./ 

Register a module :
check status: sudo php bin/magento module: status
enable module: sudo php bin/magento module: enable Vendorname_Modulename
To verify module is enable: sudo php bin/magento module:status Mageprince_Faq

git password token: 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


To Clear composer cache: $composer clear-cache
To Import Third party module
composer require prince/module-faq -vvv
or

composer require <component-name>:<version>

composer require prince/module-faq:v2.0.11



update composer magento 2 : composer self-update -2 
update composer magento 1 : composer self-update --1

If error not showing and only key is showing (not able to get error on browser)
sudo php bin/magento deploy:mode:show

To Change the mode to from default to developer.
sudo php bin/magento deploy:mode:set developer



you can enable or disable Template path hints via Command Line Go to Magento 2 root folder 
and run the following command:
Enable
php bin/magento dev:template-hints:enable 
Disable
php bin/magento dev:template-hints:disable 


enable/disable cache 
php bin/magento cache:enable
php bin/magento cache:disable


Re: 'Whoops our bad' error on main store page every day
1) sudo php bin/magento indexer:reindex
2) sudo rm -Rf var/cache var/generation var/pagecache var/di
3) sudo php bin/magento setup:di:compile
4) sudo php bin/magento cache:clean
5) sudo php bin/magento cache:flush
6) sudo chmod -R 777 var/ pub/ generated/


Warning: is_file() expects parameter 1 to be a valid path, string given in /var/www/html/mage240/vendor/colinmollenhour/cache-backend-file/File.php on line 543
if this error comes run following command - 

rm -rf var/cache var/log var/page_cache var/view_preprocessed


