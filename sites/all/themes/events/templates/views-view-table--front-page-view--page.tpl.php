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
    <?php } else {
    ?>
    <div class="wrapper">  
        <div class="background-img"></div>
        <div class="overlayHome">
            <div class="row1"><p class="logoText">Urban Adventure</p></div>
            <div class="row2"><p>Iesi din casa, vino cu noi la evenimente si propune-ne 
                    ceva nou. Plimbari cu bicicleta, iesiri la picnic si multe
                    altele. Lasa-ti grijile, lasa-ti calculatorul si nervii si vino 
                    in natura! Say yas to a new adventure!!  </p>
            </div>
            <div class="row3">
                <form class="go-right">

                    <div>
                        <input type="text" required="" name="name" id="name">
                        <label for="name">Numele tau</label>
                    </div>
                    <div>
                        <input type="tel" required="" name="phone" id="phone">
                        <label for="phone">Adresa email</label>
                    </div>
                </form>
                <a class="butonCont" href="#"><img src="<?php  print base_path() . path_to_theme();?>/images/buton2.png"></a>
            </div>
        </div>
    </div>
    <?php
}
?>

