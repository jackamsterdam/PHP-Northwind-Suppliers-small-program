<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>PHP site</title>
</head>
<body>
    
  <form action="../04-controllers/suppliers-controller.php" method="POST">

    <h2>Add Supplier</h2>

    <label>Company Name:</label>
    <input type="text" name="companyName">

    <label>Contact Name:</label>
    <input type="text" name="contactName">

    <label>Phone:</label>
    <input type="tel" name="phone">

    <label>Country:</label>
    <input type="text" name="country">

    <label>City:</label>
    <input type="text" name="city">

    <input type="hidden" name="command" value="add">


    <button>Add</button>

  </form>

  <form action="../04-controllers/suppliers-controller.php" method="POST">

    <h2>Edit Supplier</h2>

    <label>Supplier to Update:</label>
    <select name="id">
        <option selected disabled>Select Supplier Name...</option>

    <?php 
     require_once '../03-bll/suppliers-logic.php';

     $suppliers = getAllSuppliers();
     foreach($suppliers as $s) {
         echo "<option value='$s->id'>$s->companyName</option>";
     }
    ?>

    </select>

    <label>Company Name:</label>
    <input type="text" name="companyName">

     <label>Contact Name:</label>
    <input type="text" name="contactName">

    <label>Phone:</label>
    <input type="tel" name="phone">

    <label>Country:</label>
    <input type="text" name="country">

    <label>City:</label>
    <input type="text" name="city"> 

    <input type="hidden" name="command" value="update">

     <button>Update</button>

  </form>

  
  <form action="../04-controllers/suppliers-controller.php"  method="POST"> 

      <h2>Delete Product</h2>

      <label>Supplier to delete:</label>
      <select name="id">
      <option selected disabled>Select Supplier Name...</option>

      <?php 
        require_once '../03-bll/suppliers-logic.php';

         $suppliers = getAllSuppliers();
        foreach($suppliers as $s) {
         echo "<option value='$s->id'>$s->companyName</option>";
        }
      ?>

      </select>

      <input type="hidden" name="command" value="delete">

      <button>Delete</button>
      
    </form>

    <hr>

    <table>
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Contact Name</th>
                <th>Phone</th>
                <th>Country</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            <?php
               require_once '../03-bll/suppliers-logic.php';
               $suppliers = getAllSuppliers();

               foreach($suppliers as $s) {
                   echo "<tr>" . 
                      "<td>$s->companyName</td>" .
                      "<td>$s->contactName</td>" .
                      "<td>$s->phone</td>" .
                      "<td>$s->country</td>" .
                      "<td>$s->city</td>" .
                   "</tr>";
               }
            ?>
        </tbody>
    </table>

</body>
</html>