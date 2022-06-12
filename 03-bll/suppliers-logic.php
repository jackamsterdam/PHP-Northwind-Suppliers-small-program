<?php

require_once '../02-dal/dal.php';

//Add Product:
function addSupplier($supplier)
{

    //Create sql:
    $sql = "INSERT INTO Suppliers(CompanyName, ContactName, Phone, Country, City) " .  
    "VALUES('$supplier->companyName', '$supplier->contactName', '$supplier->phone', '$supplier->country', '$supplier->city')";


    //Execute:
    $id = execute($sql);

    //Set the new id:
    $supplier->id = $id;

    //Return added supplier:
    return $supplier;
}

function updateSupplier($supplier)
{
    //Create sql:
        $sql = "UPDATE Suppliers SET " .
        "CompanyName = '$supplier->companyName', ContactName = '$supplier->contactName', Phone = '$supplier->phone', Country = '$supplier->country', City = '$supplier->city' " .
        "WHERE SupplierID = $supplier->id";

    
    execute($sql);

     // Return added supplier: 
    return $supplier;
}

function deleteSupplier($id)
{
    $sql = "DELETE FROM Suppliers WHERE SupplierID = $id";

    execute($sql);
}


function getAllSuppliers()
{
    //Create sql: 
    $sql = "SELECT SupplierID AS id, CompanyName AS companyName, ContactName AS contactName, Phone AS phone, Country AS country, City AS city FROM Suppliers";

    //Get suppliers:
    $suppliers = select($sql);

    //Return suppliers array:
    return $suppliers;
}
