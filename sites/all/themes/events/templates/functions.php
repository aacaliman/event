<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function getStatistics($muzicaString, $sportString)
{
    $stringComplet = $muzicaString . $sportString;
    $categorii = array_map('trim',explode(",",$sportString));
    $categorii = array_filter($categorii, 'strlen' );
    $categorii = array_count_values($categorii);
    arsort($categorii);

    return array_splice($categorii, 0, 3);
}