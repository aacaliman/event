<?php
/**
 * @file
 * features_view_node.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function features_view_node_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'participants';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'participants';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'participants';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'name' => 'name',
    'delta' => 'delta',
    'delta_1' => 'delta_1',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'name' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'delta' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'delta_1' => array(
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  /* Relationship: Content: Author */
  $handler->display->display_options['relationships']['uid']['id'] = 'uid';
  $handler->display->display_options['relationships']['uid']['table'] = 'node';
  $handler->display->display_options['relationships']['uid']['field'] = 'uid';
  /* Field: User: Name */
  $handler->display->display_options['fields']['name']['id'] = 'name';
  $handler->display->display_options['fields']['name']['table'] = 'users';
  $handler->display->display_options['fields']['name']['field'] = 'name';
  $handler->display->display_options['fields']['name']['relationship'] = 'uid';
  /* Field: User: Muzica */
  $handler->display->display_options['fields']['field_muzica']['id'] = 'field_muzica';
  $handler->display->display_options['fields']['field_muzica']['table'] = 'field_data_field_muzica';
  $handler->display->display_options['fields']['field_muzica']['field'] = 'field_muzica';
  $handler->display->display_options['fields']['field_muzica']['relationship'] = 'uid';
  $handler->display->display_options['fields']['field_muzica']['type'] = 'list_key';
  $handler->display->display_options['fields']['field_muzica']['delta_offset'] = '0';
  /* Field: User: Sport */
  $handler->display->display_options['fields']['field_sport']['id'] = 'field_sport';
  $handler->display->display_options['fields']['field_sport']['table'] = 'field_data_field_sport';
  $handler->display->display_options['fields']['field_sport']['field'] = 'field_sport';
  $handler->display->display_options['fields']['field_sport']['relationship'] = 'uid';
  $handler->display->display_options['fields']['field_sport']['type'] = 'list_key';
  $handler->display->display_options['fields']['field_sport']['delta_offset'] = '0';
  /* Field: User: Poza */
  $handler->display->display_options['fields']['field_poza']['id'] = 'field_poza';
  $handler->display->display_options['fields']['field_poza']['table'] = 'field_data_field_poza';
  $handler->display->display_options['fields']['field_poza']['field'] = 'field_poza';
  $handler->display->display_options['fields']['field_poza']['relationship'] = 'uid';
  $handler->display->display_options['fields']['field_poza']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_poza']['settings'] = array(
    'image_style' => 'thumbnail',
    'image_link' => '',
  );
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: User: Active */
  $handler->display->display_options['filters']['status_1']['id'] = 'status_1';
  $handler->display->display_options['filters']['status_1']['table'] = 'users';
  $handler->display->display_options['filters']['status_1']['field'] = 'status';
  $handler->display->display_options['filters']['status_1']['relationship'] = 'uid';
  $handler->display->display_options['filters']['status_1']['value'] = '1';

  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block');
  $export['participants'] = $view;

  return $export;
}
