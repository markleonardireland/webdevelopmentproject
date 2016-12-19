<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';
    $team = $_GET['team'];
    $teamsArray = array('Fnatic','Team Solomid','EnVyUs','Luminosity Gaming','Cloud9.CS','Invictus Gaming','SKT T1','Edward Gaming','Origen','ahq e-Sports Club','Team Secret','Cloud9','Team Liquid','Fnatic','Digital Chaos','G4','Shane and the Lemon Tarts','joffacakes','Da Biblical Boyz');
    if(in_array($team,$teamsArray))
        echo $team.' are competing in this tournament';
    elseif($team=='')
        echo 'Please enter a team name';
    else
        echo $team.' are not competing in this tournament';
echo '</response>';
?>