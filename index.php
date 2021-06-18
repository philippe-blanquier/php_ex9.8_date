<?php
    declare(strict_types = 1);
    /*  Afficher la date du jour - 22 jours.
    */
    setlocale( LC_TIME, 'fr-FR');
    $currentDate= new DateTime();
    // https://www.php.net/manual/en/dateinterval.format.php
    $futurDay1= date_add( $currentDate, date_interval_create_from_date_string('-22 days')); // days, weeks
    var_dump($futurDay1);
    $timeStamp= date_timestamp_get($futurDay1);
    $futurDayFr1= strftime('%A %d %B %G', $timeStamp);
    /*  ISO 8601 is the international standard that defines how to use, store, and transfer date, time, and duration information.
        The specific string to define durations is an easy-to-remember pattern:
            PYMDTHMS
                P: period
                Y: years
                M: months 1..12 !
                D: days
                T: time
                H: hours
                M: minutes
                S: seconds
        'PT10H30S' = Post Time 10 Hours 10 Seconds
        'P7Y5M4DT4H3M2S' = Post 7 Years 5 Months 4 Days Time 4 Hours 3 Minutes 2 Seconds
    */
    $futurDay2= new DateTime();
    // fonction add(), sub(), diff()
    $futurDay2->sub(new DateInterval('P22D'));
    $timeStamp2= date_timestamp_get($futurDay2);
    $futurDayFr2= strftime('%A %d %B %G', $timeStamp2);
    // methode 3
    $futurDay3= new DateTime();
    $timeStamp3= strtotime('-22 day', date_timestamp_get($futurDay3));
    $futurDayFr3= strftime('%A %d %B %G', $timeStamp3);
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>PHP ex 9.8 Date</title>
    </head>
    <body >
        <p>la date du jour -22 jours {methode 1: date_timestamp_get()}: <?= $futurDayFr1 ?></p>
        <p>la date du jour -22 jours {methode 2:} sub: <?= $futurDayFr2 ?></p>
        <p>la date du jour -22 jours {methode 3: strtotime()}: <?= $futurDayFr3 ?></p>
    </body>
</html>