<?php
include('functions.php');
$muzicaString = '';
$sportString = '';
// pentru testare, scurtam array-ul la 10 elemente
$users = array_slice($rows, 0, 10); ?>

<h3>Participanti</h3>

<div class="poze-participanti">
    <?php
    foreach ($users as $user) :
        $muzicaString .= ',' . $user['field_muzica'];
        $sportString .= ',' . $user['field_sport'];
        ?>
        <div class="poza-user">
            <?php echo $user['field_poza']; ?>
        </div>
    <?php endforeach; ?>

</div>

<div class="interese-comune">
    <h3>Interese Comune</h3>
    <?php // $statistics = getStatistics($muzicaString, $sportString); ?>
    <table>
        <tr>
            <td>80%</td><td>Muzica Rock</td>
        </tr>
        <tr>
            <td>60%</td><td>Ciclism</td>
        </tr>
        <tr>
            <td>35%</td><td>Sah</td>
        </tr>
    </table>
</div>


