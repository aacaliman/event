<?php
/**
 * @file
 * Bartik's theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
drupal_add_js('http://code.highcharts.com/highcharts.js', 'external');
drupal_add_js('http://code.highcharts.com/modules/exporting.js', 'external');
include_once('functions.php');
global $base_url;

$muzicaString = '';
$sportString = '';

$users = isset($node->field_event_user['und']) ? $node->field_event_user['und'] : '';
$totalUseri = count($users);
if ($users) {
    foreach ($users as $userArray) {
    $field_muzica = field_get_items('user', $userArray['entity'], 'field_muzica');
    if (!empty($field_muzica)) {
        foreach ($field_muzica as $fieldArray) {
            $muzicaString .= $fieldArray['value'] . ',';
        }
    }
    $field_sport = field_get_items('user', $userArray['entity'], 'field_sport');
    if (!empty($field_sport)) {
        foreach ($field_sport as $fieldArray) {
            $sportString .= $fieldArray['value'] . ',';
        }
    }
    }
}
?>
<div class="wrapper2">
    <div class='col1'><?php print render($content['field_picture']); ?></div>
    <div class='col2'>
        <p class='bold-title'><a href="<?php print $node_url; ?>"><?php print $title; ?></a></p>
        <p class="bold-subtitle">Organizat de:<p> <p class='simpleText'><?php echo $name; ?></p>
        <p class="bold-subtitle">Data:<p> <p class='simpleText'><?php echo $content['field_event_date'][0]['#markup']; ?></p>


        <p class="bold-subtitle">Despre:</p>
        <p class='simpleText'><?php print render($content['body']); ?></p>
    </div>
    <div class='col3'>
        <?php if (!empty($users)): ?>
        <p class="bold-subtitle">Participanti</p>
            <?php foreach ($users as $user): ?>
                <?php $userName = $user['entity']->name; ?>
                <a href="<?php echo $base_url . '/users/' . $userName; ?>" title="<?php echo $userName;?>">
                    <?php if (!empty($user['entity']->field_poza)): ?>
                        <img style="height: 69px; width: auto; display: inline-block;" src="<?php print file_create_url($user['entity']->field_poza['und'][0]['uri']); ?>" />
                    <?php else: ?>
                        <img style="height: 69px; width: auto; display: inline-block;" src="<?php print $base_url;?>/sites/all/themes/events/images/default-batman.jpg" />
                    <?php endif; ?>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
        <a href='#'><div class='butonJoin'><?php print render($content['links']['flag']); ?></div></a>
        <?php $categorii = getStatistics($muzicaString, $sportString); $categoriesData = ''; $data = ''; ?>
        <?php if (!empty($categorii)): ?>
            <?php foreach ($categorii as $label => $value): ?>
            <?php $categoriesData .= "'" . $label . "'" . ', '; $data .= round($value/$totalUseri*100). ', ';  ?>
            <?php endforeach; ?>
            <div id="chartLocatie" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        <?php endif; ?>
        <p class="bold-subtitle">Locatie:<p><p class='simpleText'><?php echo $content['field_location']['#items'][0]['name']; ?></p>
        <p class="bold-subtitle"><?php print render($content['field_location']); ?></p>
    </div>
</div>
<script type="text/javascript" charset="utf-8">
jQuery('#chartLocatie').highcharts({
    chart: {
        type: 'column'
    },
    title: {
        text: 'Top interese participanti (%):'
    },
    xAxis: {
        categories: [<?php echo $categoriesData; ?>]
    },
    credits: {
        enabled: true
    },
    series: [{
            name: 'Interese',
            data: [<?php echo $data; ?>]
        }]
});
</script>
