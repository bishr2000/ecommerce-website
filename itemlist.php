
<?php
    require_once('Products.php');
    $object = new Products;
    if(isset($_REQUEST['category']))
        $object->displayItems();
    if(isset($_REQUEST['itemcode']))
        $object->showDetails();
    if(isset($_REQUEST['search']))
        $object->searchItems();
?>
