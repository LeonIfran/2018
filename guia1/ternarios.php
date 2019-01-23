<?php 
    $valid = true;
    $lang = 'french';
    $x = $valid ? ($lang === 'french' ? 'oui' : 'yes') : ($lang === 'french' ? 'non' : 'no');
    echo $x; // outputs 'oui'
?>