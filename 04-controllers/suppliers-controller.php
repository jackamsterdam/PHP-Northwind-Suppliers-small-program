<?php 

require_once '../01-models/supplier-model.php';
require_once '../03-bll/suppliers-logic.php';

// The calling page MUST send us a form-parameter called command which tell us what to do:
$command = $_REQUEST['command'];

switch($command) {

     // Frontend wants to add product: 
    case "add":

    // Take values: 
     $companyName = $_POST['companyName'];
     $contactName = $_POST['contactName'];
     $phone = $_POST['phone'];
     $country = $_POST['country'];
     $city = $_POST['city'];

     // Create supplier model: 
     $supplier = new SupplierModel(null,$companyName, $contactName, $phone, $country, $city);

     //Send to logic:
     addSupplier($supplier);

     //Redirect
     header("location: ../pages/thanks.php");

     break;

     case 'update':

        // Take values: 
        $id = $_POST["id"];
        $companyName = $_POST['companyName'];
        $contactName = $_POST['contactName'];
        $phone = $_POST['phone'];
        $country = $_POST['country'];
        $city = $_POST['city'];

        // Create supplier model: 
        $supplier = new SupplierModel($id, $companyName, $contactName, $phone, $country, $city);

        // Send to logic:
        updateSupplier($supplier);

        //Redirect:
        header("location: ../pages/thanks.php");

        break;

    case "delete": 

        // Take values: 
        $id = $_POST["id"];

        deleteSupplier($id);

        header("location: ../pages/thanks.php");

        break;
}