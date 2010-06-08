<?php
require_once 'config.local.php';
require_once 'k.php';
require_once 'Ilib/ClassLoader.php';

$application = new VIES_Root();

$application->registry->registerConstructor('cms:client', create_function(
  '$className, $args, $registry',
  '$debug = false;
   return new IntrafacePublic_CMS_Client_XMLRPC(array("private_key" => $GLOBALS["intraface_private_key"], "session_id" => uniqid()), $GLOBALS["intraface_site_id"], $debug);'
));

$application->registry->registerConstructor('cache', create_function(
  '$className, $args, $registry',
  '
   $options = array(
       "cacheDir" => $GLOBALS["cache_dir"],
       "lifeTime" => 3600
   );
   return new Cache_Lite($options);'
));

$application->dispatch();
