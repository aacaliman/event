<?php

function mytheme_js_alter(&$javascript) {
  //We define the path of our new jquery core file
  //assuming we are using the minified version 1.9.1
  $jquery_path = drupal_get_path('theme','mytheme') . '/js/jquery.min.js';

  //We duplicate the important information from the Drupal one
  $javascript[$jquery_path] = $javascript['misc/jquery.js'];

  //..and we update the information that we care about
  $javascript[$jquery_path]['version'] = '1.7.1';
  $javascript[$jquery_path]['data'] = $jquery_path;

  //Then we remove the Drupal core version
  unset($javascript['misc/jquery.js']);
}

?>
