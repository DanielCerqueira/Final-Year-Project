<?php
if(isset($_GET['del'])){

    $delproducts = $mysqli->query("select * from products where id_product='".$_GET['del']."'");
    while($ln_delproducts=mysqli_fetch_array($delproducts)){
        unlink('img_products/'.$ln_delproducts['image']);
    }

    $delete = $mysqli->query("delete from products where id_product='".$_GET['del']."'");

    print "<meta http-equiv=refresh content='0; url=products'>";exit;

}
?>

<!--populer-products start -->
<section id="banner" class="background-cover2">
    <div class="opacity_layer"></div>
    <div class="container p-0"> 
        
        <div class="banner_align">
                <div class="col-md-12 p-0">
                <h2 class="text-white z-index2">Products</h2>
                <h5 class="fw-200 mt-20 text-white z-index2"><a href="home" style="color:white"> Home</a> * <a href="products"style="color:white"> Products</a> 
            </div>
    
        </div>
    </div>
</section>


<section class="p-100">
    <div class="container">

        <table id="nutritional_table">
            <tr>
                <th>#ID</th>
                <th>Product name</th>
                <th>Type</th>
                <th>Health Grade</th>
                <th> <a href="product" class="text-white">Insert new product </a> </th>
            </tr>

            <?php
            $products = $mysqli->query("select * from products
            left join types on types.id_type=products.id_type");
            while($ln_products=mysqli_fetch_array($products)){
            ?>
            <tr>
                <td><?php echo $ln_products['id_product']; ?></td>
                <td><?php echo $ln_products['name']; ?></td>
                <td><?php echo $ln_products['type']; ?></td>
                <td><?php echo $ln_products['health_grade']; ?></td>
                <td><a href="product?id_product=<?php echo $ln_products['id_product']; ?>">Edit</a> &nbsp;&nbsp;<a href="products?del=<?php echo $ln_products['id_product']; ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </table>

    </div>
</section>