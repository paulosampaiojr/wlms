<?php

function converter_segundos_em_horas($segundos) {
    $horas = strlen(floor($segundos / 3600)) != 1 ? floor($segundos / 3600) : '0' . floor($segundos / 3600);
    $minutos = strlen(floor(($segundos - ($horas * 3600)) / 60)) != 1 ? floor(($segundos - ($horas * 3600)) / 60) : '0' . floor(($segundos - ($horas * 3600)) / 60);
    $segundos = strlen(floor($segundos % 60)) != 1 ? floor($segundos % 60) : '0' . floor($segundos % 60);
    return $horas .  ':' . $minutos . ':' . $segundos;
}