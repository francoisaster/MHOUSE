<?php
function belongTo($id_utilisateur,$n){
    $bdd=connexionBdd();
    $req = $bdd->prepare("SELECT * FROM capteurs WHERE id_capteur=:n and id_utilisateur=:id_utilisateur");
    $req->execute(array('n'=>$n,'id_utilisateur'=>$id_utilisateur));
    $count=$req->rowCount();
    if($count==0){
        return false;
    }
    return true;
}

function update($id_utilisateur){

    $bdd=connexionBdd();
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=009E");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    $data_tab = str_split($data,33);

    $newDateTab=array();
    for($i=0, $size=count($data_tab); $i<$size; $i++){
        $trame = $data_tab[$i];

            list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
                sscanf($trame, '%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s');
            $date2 = $year . "-" . $month . "-" . $day . " " . $hour . ":" . $min . ":" . $sec;
            $date= date_create( $year . "-" . $month . "-" . $day . " " . $hour . ":" . $min . ":" . $sec);



        $req = $bdd->prepare("SELECT * FROM capteurs INNER JOIN valeurs_capteur ON capteurs.id_capteur=valeurs_capteur.id_capteur WHERE capteurs.id_utilisateur=:id_utilisateur and valeurs_capteur.id_capteur=:n order by valeurs_capteur.date_mesure");
        $req->execute(array('id_utilisateur'=>$id_utilisateur,'n'=>$n));
        $newDate=0;
        while($dateAttente=$req->fetch()){

            $datetest=date_create($dateAttente['date_mesure']);
            $datetest=date_timestamp_get($datetest);

            if($newDate<$datetest){
                $newDate=$datetest;
            }
        }




        if(!isset($newDateTab["$n"])){
            $newDateTab["$n"]=$newDate;
        }
        $date=date_timestamp_get($date);
        if($newDateTab["$n"]<$date and $v!=null and $date!=null and $n!=null and belongTo($id_utilisateur,$n)){

            $req2=$bdd->prepare('INSERT INTO valeurs_capteur (valeur, date_mesure, id_capteur) VALUES(:valeur,:date_mesure,:id_capteur)');
            $req2->bindParam(':valeur',$v);
            $req2->bindParam(':date_mesure',$date2);
            $req2->bindParam(':id_capteur',$n);
            $req2->execute();

        }

    }




}