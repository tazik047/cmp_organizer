<?php
/**
 * Created by PhpStorm.
 * User: Tazik
 * Date: 29.11.2015
 * Time: 0:01
 */
function get_events_json(){
    $json = array();

    // Query that retrieves events
    $requete = "SELECT * FROM evenement ORDER BY id";

    // connection to the database
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=fullcalendar', 'root', 'root');
    } catch(Exception $e) {
        exit('Unable to connect to database.');
    }
    // Execute the query
    $resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));

    // sending the encoded result to success page
    echo json_encode($resultat->fetchAll(PDO::FETCH_ASSOC));
}