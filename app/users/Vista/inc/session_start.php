<?php
    session_name(APP_SESSION_NAME);
    session_start();


    ob_end_flush(); // Envía el contenido del búfer de salida y apaga el almacenamiento en búfer de la salida