<!--populer-products start -->
<section id="banner" class="background-cover2">
    <div class="opacity_layer"></div>
    <div class="container p-0"> 
        
        <div class="banner_align">
                <div class="col-md-12 p-0">
                <h1 class="text-white z-index2">Product</h1>
                <h4 class="fw-200 mt-20 text-white z-index2"><a href="home" style="color:white"> Home</a> * <a href="products"style="color:white"> Products</a> 
                <a href=""style="color:white">*  Product</a></h4>
            </div>
    
        </div>
    </div>
</section>

<?php 
$products = $mysqli->query("select * from products where id_product='".$_GET['id_product']."'"); 
$ln_products=mysqli_fetch_array($products) //select the product by unique id
?>
<section class="p-100 pb-0">
    <div class="container">

        <div class="col-md-6 img_product_detail">
        <img alt="products images" src="admin/img_products/<?php echo $ln_products['image']; ?>">
        </div>
        <!-- Here I pulled fields from DB as much as possible instead of typing for every single product-->
        <div class="col-md-6 desc_product margin-top-mobile" style="text-align:center">
            <h4 class="mb-20"><?php echo $ln_products ['name'] ?></h4>
            
            <h6>Some benefits of <?php echo $ln_products ['name'] ?> :</h6>


            <p><?php echo $ln_products ['description'] ?> </p>
              
            <br>
                <div class="health_level mt-20">
                <p> Health grade: <?php echo $ln_products ['health_grade'] ?></p>
                </div>

                <div class="mt-40">
                <form action="diet" method="POST"> 
                        <input type="hidden" name="id_product" value="<?php echo $ln_products['id_product'];?>">
                        <input type="submit" name="submit" class="btn_webapp" value="Add to my Diet" >
                </form>

                </div>
        </div>


        </section>
    </div>
    <div class="container mt-60 mb-40">
        <div class="col-md-6 bloco_tabela_nutricional mb-40 ">

            <table id="nutritional_table">
                <!-- Nutritional table values also pulled from database-->
            <tr>
                <th>Nutritional Table</th>
                <th>Per portion</th>
                
            </tr>
            <tr>
                <td>Energy</td>
                <td><?php echo $ln_products['energy']?> Kcal</td>
            </tr>
            <tr>
                <td>Fat</td>
                <td><?php echo $ln_products['fat']?> g</td>
            </tr>
            <tr>
                <td>Carbs</td>
                <td><?php echo $ln_products['carbs']?> g</td>
            </tr>
            <tr>
                <td>Sugar</td>
                <td><?php echo $ln_products['sugar']?> g</td>
            </tr>
            <tr>
                <td>Fiber</td>
                <td><?php echo $ln_products['fiber']?> g</td>
            </tr>
            <tr>
                <td>Protein</td>
                <td><?php echo $ln_products['protein']?> g</td>
            </tr>
            <tr>
                <td>Life Span</td>
                <td><?php echo $ln_products['lifespan']?></td>
            </tr>
           
            </table>

        </div>
        <div class="col-md-6 qr_block">
            <h6>Scan the QR code to find this product</h6>
           
            <a href="<?php echo $ln_products['qr_code']?>" target="_blank">
            <!-- code used to create a image by the URL inserted on the DB-->
           <img style="display: block;-webkit-user-select: none;margin: auto;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;" 
           src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&amp;data=<?php echo $ln_products['qr_code']; ?> &amp;fbclid=IwAR2Gt-ZfuDkH9JVtDRB-FvoJCdNtsgxdzrxhR4w9ZXcgGwx4KFcTx0_ZV3g">
            </a>
            
            <div class="edit_txt mt-10 fw-600">
                <p>Helping you choose the best!<p>
            </div>
         

        </div>
    </div>    
    <div class="container mt-60 mb-40 text-center">
        <h4 class="mb-60">Related Products</h4>

        <?php
        $related = $mysqli->query("select * from products where id_type='".$ln_products['id_type']."' and id_product!='".$ln_products['id_product']."' limit 3");
        while($ln_related=mysqli_fetch_array($related)){ ?>
        <div class="col-md-4 bloco_produtos">
            <div class="single-populer-products no-background">
                <div class="single-populer-product-img mt40">
                    <img alt="products images" src="admin/img_products/<?php echo $ln_related['image']; ?>">
                </div>
                <h6><?php echo $ln_related['name']; ?></h2>
                <a class="btn_webapp btn-100 mt-20" href="product?id_product=<?php echo $ln_related['id_product']; ?>">
                    View Product
                </a>
            </div>
        </div>
        <?php } ?>
        
    </div>
        
