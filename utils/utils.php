<?php

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

function generate_OptionsForms($arrayOpcoes, $opcaoAtual, $opcaoPadrao, $nomeForm, $cssId)
{
    $types = $arrayOpcoes;

    $type = isset($opcaoAtual) && in_array($opcaoAtual, $types, true) ? $opcaoAtual : $opcaoPadrao;

    echo '<select class="form-control" name="'.$nomeForm.'" id="'.$cssId.'">';
    foreach ($types as $option) {
        echo '<option value="'.$option.'"'.(0 === strcmp($option, $type) ? ' selected="selected"' : '').'>'.$option.'</option>';
    }
    echo '</select>';
}

function getPostos($result, $opcaoAtual, $opcaoPadrao, $nomeForm, $cssId)
{
    $type = isset($opcaoAtual) && in_array($opcaoAtual, $types, true) ? $opcaoAtual : $opcaoPadrao;

    echo '<select class="form-control" name="'.$nomeForm.'" id="'.$cssId.'">';
    // while($row=mysql_fetch_array($result, MYSQL_ASSOC)){                                                 
    while($row=mysqli_fetch_assoc($result)){                                                 
        echo "<option value='".$row['id']."'>".$row['razao_social']."</option>";
    }
    echo '</select>';
}

function verificaSessao()
{
    session_start();
    if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
        header('Location: index.php');
        exit;
    }
    echo '<center>Você está logado</center>';
}

// first line of PHP
$defaultTimeZone = 'UTC';
if (('UTC') !== $defaultTimeZone) {
    date_default_timezone_set($defaultTimeZone);
}

setlocale(LC_ALL, 'pt_BR');
// somewhere in the code
function _date($format = 'r', $timestamp = false, $timezone = false)
{
    $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime((false !== $timestamp ? date('r', (int) $timestamp) : date('r')), $gmtTimezone);
    $offset = $userTimezone->getOffset($myDateTime);

    return date($format, (false !== $timestamp ? (int) $timestamp : $myDateTime->format('U')) + $offset);
}

// Example
// echo 'System Date/Time: '.date("Y-m-d | h:i:sa").'<br>';
// echo 'New York Date/Time: '._date("Y-m-d | h:i:sa", false, 'America/New_York').'<br>';
// echo 'Belgrade Date/Time: '._date("Y-m-d | h:i:sa", false, 'Europe/Belgrade').'<br>';
// echo 'Belgrade Date/Time: '._date("Y-m-d | h:i:sa", 514640700, 'Europe/Belgrade').'<br>';

function dateToView($data)
{
    return date('d/m/Y', (int) strtotime($data));
}

function dateToDB($data)
{
    $dateTimeObj = DateTime::createFromFormat('d/m/Y', $data);

    return $dateTimeObj->format('Y-m-d');
}
