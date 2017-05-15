<?php
/**
 * Created by PhpStorm.
 * User: Aster
 * Date: 15/05/2017
 * Time: 15:04
 */
require '../Models/pieces.php';
if(isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['admin']) ) {
    creationPieces();
    header('Location: http://localhost/project/public/index.php?p=pieces');
}