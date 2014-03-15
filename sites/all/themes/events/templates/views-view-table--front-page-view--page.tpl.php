<?php
/**
 * @file
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $caption: The caption for this table. May be empty.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 * @ingroup views_templates
 */
?>


<?php
global $user;
if ($user->uid) {
    ?>
    <?php foreach ($rows as $row_count => $row): ?>

        <?php if ($row_count % 2 == 0) { ?>
            <div class='row'>
                <div class="event">
                    <?php print render($row['field_picture']); ?>
                    <p class="bold"><?php print render($row['title']); ?></p>
                    <div class="small"><?php print render($row['body']); ?></div>
                </div>
            <?php } else { ?>
                <div class="event">
                    <?php print render($row['field_picture']); ?>
                    <p class="bold"><?php print render($row['title']); ?></p>
                    <div class="small"><?php print render($row['body']); ?></div>
                </div>
            </div>

        <?php } ?>
    <?php endforeach; ?>
    <?php
} else {
    
}
?>

