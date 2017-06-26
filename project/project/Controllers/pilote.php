<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 25/06/2017
 * Time: 16:16
 */
require '../Models/pilote.php';
if(isset($_POST['allume'])){
pilote($_POST['capteur_choisi'],1);

}else{
    pilote($_POST['capteur_choisi'],0);
}
header('Location:../public/index.php?p=pilote');
exit();