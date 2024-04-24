<?php 
    require_once('DB.php');

    class Products{
        private $con = null;

        function __construct(){
            $object = new Connection;
            $this->con = $object->connect();    
            include('header.php');
        }
        
        public function searchItems(){
            $search = $_POST['search'];
            $query = "SELECT * FROM products WHERE "; // main query hehe some algorithmic Master brain.
        
            $query_fields = Array(); // just holds an array of an expression that where uses.
        
            $sql = "SHOW COLUMNS FROM products"; // this sql command returns the column names
            $columnlist = mysqli_query($this->con, $sql) or die(mysql_error()); 

            while($arr = mysqli_fetch_array($columnlist, MYSQLI_ASSOC)){
                extract($arr);
                $query_fields[] = $Field . " like('%". $search . "%')"; // item_name like ('% $search %') ..
                    
            }
            /*
                so the $Field variable holds the column name, so he is making an array that holds the column name 
                and the like ('% . $search . %') to see if there's a pattern in the field that matches the search
            */
            $query .= implode(" OR ", $query_fields); // summing the whole query expressions of where and adding or between the array
            
            $results = mysqli_query($this->con, $query) or die(mysql_error());
            
            if(!mysqli_num_rows($results)){
                echo "<h1> No results found! </h1>";
            }
            echo "<table border=\"1\" >";
            echo "<tr>";
            
            while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                extract($row);
                echo "<td style=\"padding-right:15px;\">";
                echo "<a href=itemlist.php?itemcode=$item_code>";
                echo '<img src=' . $imagename . ' style="max-width:220px;max-height:240px;
                    width:auto;height:auto;"></img><br/>';
                echo $item_name .'<br/>';
                echo "</a>";
                echo '$'.$price .'<br/>';
                echo '<td><b>Description:</b><p>' . $description . '</p></td>';
                echo "</td>";
                echo "</tr><tr>";
            }
            echo "</table>";
            if(isset($_SESSION['name']))
            printf("<SCRIPT LANGUAGE=\"JavaScript\">updateUser('%s');
            </SCRIPT>", $_SESSION['name']); 
 
        }
        public function showDetails(){
    
            $code = $_REQUEST['itemcode']; // we created an anchor in the index.html file with an href that directs you to this php file with the name value attribute
            $query = "SELECT item_code, item_name, description, imagename, price FROM
            products " .
            "where item_code like '$code'"; //here we are picking the information of that product that we chose using the item_code that we got
            $results = mysqli_query($this->con, $query) or die(mysql_error()); 
            $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
            extract($row);
            echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"5\">";
            echo "<tr><td style=\"padding: 3px;\" rowspan=\"6\">";
            echo '<img src=' . $imagename . ' style="max-width:200px;max-height:260px;
            width:auto;height:auto;"></img></td>';
            echo "<td colspan=\"2\" align=\"center\" style=\"font-family:verdana;
            font-size:150%;\"><b>";
            echo $item_name;
            echo "</b></td></tr><tr><td colspan=\"2\">
            <table><tr><td>";
            $itemname = urlencode($item_name);
            $itemprice = $price;
            $itemdescription = $description;

            
echo <<<_END
    <tr>
        <form method="POST" action = "cart.php?action=add&icode=$item_code&iname=$itemname&iprice=$itemprice">
            <td colspan="2" style="font-family:verdana; font-size:150%;">
            Quantity: <input style = "padding: 2px;" type="text" name="quantity" value = "1" size="2">&nbsp;&nbsp;&nbsp;
            Price: $itemprice
            </td></tr>
            <tr>
            <td colspan="2"> 
                <input type="submit" name="buynow" value="Buy Now" style="font-size:150%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="addtocart" value="Add To Cart" style="font-size:150%;">
            </td>
        </form>
    </tr>
    </table>
    </table>
    <p style="font-size:140%;">Description</p>
    $itemdescription;
_END;
if(isset($_SESSION['name']))
printf("<SCRIPT LANGUAGE=\"JavaScript\">updateUser('%s');
</SCRIPT>", $_SESSION['name']); 

        }
        public function displayItems(){
                    
            $category = $_REQUEST['category'];
            $query = "SELECT item_code, item_name, description, imagename, price FROM
            products " .
            "where category like '$category' order by item_code";
            $results = mysqli_query($this->con, $query) or die(mysql_error());
            echo "<table border=\"0\">";
            echo "<tr>";
            while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
                extract($row);
                echo "<td style=\"padding-right:15px;\">";
                echo "<a href=itemlist.php?itemcode=$item_code>";
                echo '<img src=' . $imagename . ' style="max-width:220px;max-height:240px;
                width:auto;height:auto;"></img><br/>';
                echo $item_name .'<br/>';
                echo "</a>";
                echo '$'.$price .'<br/>';
                echo "</td>";
            }
            echo "</tr></table>";
            if(isset($_SESSION['name']))
            printf("<SCRIPT LANGUAGE=\"JavaScript\">updateUser('%s');
            </SCRIPT>", $_SESSION['name']); 

        }
    }
    
    
    /*// $pfquery = "SELECT feature1, feature2, feature3, feature4, feature5,
            // feature6 FROM productfeatures " .
            // "where item_code like '$code'"; 
            // $pfresults = mysqli_query($this->con, $pfquery) or die(mysql_error());
            // $pfrow = mysqli_fetch_array($pfresults, MYSQLI_ASSOC);
            // extract($pfrow);
    //         $feature1
    // </td>
    // <td>
    // $feature2
    // </td>
    // </tr>
    // <tr>
    // <td>
    // $feature3
    // </td><td>
    // $feature4
    // </td></tr><tr><td>
    // $feature5
    // </td><td>
    // $feature6
    // </td></tr> */