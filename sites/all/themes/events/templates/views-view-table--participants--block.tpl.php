<?php
include_once('functions.php');
$muzicaString = '';
$sportString = '';
// pentru testare, scurtam array-ul la 10 elemente
$users = array_slice($rows, 0, 10); ?>

<h3>Participanti</h3>

<div class="poze-participanti">
    <?php
    foreach ($users as $user) :
        $muzicaString .= $user['field_muzica'] . ',';
        $sportString .= $user['field_sport'] . ',';
        ?>
        <div class="poza-user">
            <?php echo $user['field_poza']; ?>
        </div>
    <?php endforeach; ?>

</div>

<div class="interese-comune">
    <h3>Interese Comune</h3>
    <?php $categorii = getStatistics($muzicaString, $sportString); ?>
    <p>Din <?php echo count($users); ?> persoane care participa:</p>
    <table>
        <?php foreach ($categorii as $label => $value): ?>
        <tr>
            <td><strong><?php echo $value; ?></strong> sunt interesati de <strong><?php echo $label; ?></strong></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>


