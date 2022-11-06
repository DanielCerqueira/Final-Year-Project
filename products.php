<!--populer-products start -->
<section id="banner" class="background-cover2">
    <div class="opacity_layer"></div>
    <div class="container p-0"> 
        
        <div class="banner_align">
                <div class="col-md-12 p-0">
                <h1 class="text-white z-index2">Products</h1>
                <h4 class="fw-200 mt-20 text-white z-index2"><a href="home" style="color:white"> Home</a> * <a href="products"style="color:white"> Products</a></h4>
            </div>
    
        </div>
    </div>
</section>
       
<section class="p-60">
    <div class="container">
    
        <div class="col-md-3">
        
            <form action="" class="form_filtros_products" method="POST">

                <h6 style="color:#e99c2e">Types</h6>
                <?php
                $products = $mysqli->query("select * from types");
                while($ln_products=mysqli_fetch_array($products)){ //Using DB to show all the types of products on filters
                ?>
                
                <input type="radio" id="<?php echo $ln_products['id_type']; ?>" name="types" value="<?php echo $ln_products['id_type']; ?>">
                <label for="<?php echo $ln_products['id_type']; ?>"> <?php echo $ln_products['type']; ?></label><br>
                <?php } ?>
                
                 <div class="mt-40">       
                <h6 style="color:#e99c2e">Nutrition Values</h6>
                <input type="checkbox" id="vehicle1" name="protein" value="protein">
                <label for="vehicle1"> Hight in Protein</label><br>

                <input type="checkbox" id="vehicle2" name="sugar" value="sugar">
                <label for="vehicle2"> Low in Sugar</label><br>

                <input type="checkbox" id="vehicle3" name="fat" value="fat">
                <label for="vehicle3"> Low in Fat</label><br>

                <input type="checkbox" id="vehicle4" name="carbs" value="fat">
                <label for="vehicle4"> High in Carbs</label><br>

                <input type="checkbox" id="vehicle5" name="energy" value="energy">
                <label for="vehicle5"> High in Energy</label><br>

                <input type="checkbox" id="vehicle6" name="health_grade" value="health_grade">
                <label for="vehicle6">High Health Grade</label><br>

                <button class="btn_webapp mt-30" >
                    Apply filters
                </button>
                </div>
            </form>
        </div>

                

        <div class="col-md-9">

            <?php // if nutritional value meet the condition and is selected, this is connected with input name=""
            if(isset($_POST['types'])){
                $type = $_POST['types'];
                $type_sql = "and products.id_type=".$type;
            }
            else{
                $type_sql = "";
            }

            if(isset($_POST['protein'])){
                $protein_sql = "and products.protein>10";
            }
            else{
                $protein_sql = "";
            }

            if(isset($_POST['sugar'])){
                $sugar_sql = "and products.sugar<1";
            }
            else{
                $sugar_sql = "";
            }

            if(isset($_POST['fat'])){
                $fat_sql = "and products.fat<3";
            }
            else{
                $fat_sql = "";
            }

            if(isset($_POST['carbs'])){
                $carbs_sql = "and products.carbs>10";
            }
            else{
                $carbs_sql = "";
            }

            if(isset($_POST['energy'])){
                $energy_sql = "and products.energy>100";
            }
            else{
                $energy_sql = "";
            }

            if(isset($_POST['health_grade'])){
                $health_grade_sql = "and products.health_grade>6";
            }
            else{
                $health_grade_sql = "";
            }

            $products = $mysqli->query("select * from products
            left join types on types.id_type=products.id_type 
            where 1=1 $type_sql $protein_sql $fat_sql $carbs_sql $energy_sql  $health_grade_sql");
            //left join used to connect products and types table
            
            $count_products = mysqli_num_rows($products);// counts how many rows (products)
            ?>

            <h6 style="color:#e99c2e" class="margin-top-mobile">We have found <?php echo $count_products; ?> products</h6>
        
            <?php
            while($ln_products=mysqli_fetch_array($products)){ //while cycle used to pull all products from DB
            ?>
            <div class="col-md-4 bloco_produtos">
                <div class="single-populer-products no-background">
                    <div class="single-populer-product-img mt40">
                        <img alt="products images" src="admin/img_products/<?php echo $ln_products['image']; ?>">
                    </div>
                    <h6><?php echo $ln_products['name']; ?></h2>
                    <a class="btn_webapp btn-100 mt-20" href="product?id_product=<?php echo $ln_products['id_product']; ?>">
                        View Product
                    </a>
                </div>
            </div>
            <?php } ?>
            
        </div>

    </div>
</section>
