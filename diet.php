<?php
if(isset($_SESSION['height'])){//condition to deploy BMI calculation if height is inserted
$height_imc = $_SESSION['height']*$_SESSION['height'];
$bmi = number_format($_SESSION['weight']/$height_imc,0);// calculation of BMI

$protein_daily_min = $_SESSION['weight']*0.8; //calculation of minimum required protein based on weight
$protein_daily_max = $_SESSION['weight']*1; ////calculation of maximum required protein based on weight
$energy_goal = $_SESSION['weight']*25; // calculation of calories recomended based on weight
}

if(isset($_POST['submit'])){  // ********************************************

$id_product = $_POST['id_product'];
$wishlist = $mysqli->query("INSERT INTO wishlist(id_wishlist, id_session, id_product) VALUES ('','$id_session','$id_product')");

}
?>

<div class="container mt-60">
    <div class="col-md-7 mb-20">

        <h2>Calculate BMI</h2>

        <p class="mb-40">Calcule o seu BMI para ter acesso a informações sobre a sua alimentação e o que deve alterar</p>

        <form action="" method="POST" enctype="multipart/form-data"> <!-- Form of BMI using values of heigh and weight by session -->

            <div class="col-md-6 mb-40 p-0">
                <label>Height</label>
                <input type="text" name="height" value="<?php if(isset($_SESSION['height'])){ echo $_SESSION['height']; }; ?>">
            </div>

            <div class="col-md-6 mb-40 p-0mobile">
                <label>Weight</label>
                <input type="text" name="weight" value="<?php if(isset($_SESSION['weight'])){ echo $_SESSION['weight']; }; ?>">
            </div>

            <div class="col-md-12 mb-40 p-0">
                <input type="submit" name="bmiform" class="btn_webapp" value="Submit" style="width:50%">
            </div>

        </form>

    </div>

    <?php if(isset($_SESSION['height'])){ ?>
    <div class="col-md-4 floatrightmobile"><!-- Analysing the BMI of the person and printing it-->
        <h3>Your BMI Score</h3>
        <?php  
        // Using if condition to give the output on different BMI values and provide feedback
        if($bmi<'18.5'){ ?>
        <h6 style="color:orange">Underweight</h6>
        Your <b>BMI is <?php echo $bmi; ?></b>, you need to gain some weight to be healthier
        <?php } ?>

        <?php  
        if($bmi>=18.5 & $bmi<=27){ ?>
        <h6 style="color:green">Normal weight</h6>
        Your <b>BMI is <?php echo $bmi; ?></b>, you within the values of a healthy person.<br>Kasdask asndasd asdkasd asdkasd.<br>asdasdasdsadasd asd asd asd
        <?php } ?>

        <?php  
        if($bmi>27 & $bmi<=29){ ?>
        <h6 style="color:orange">Pre-Obesity</h6>
        Your <b>BMI is <?php echo $bmi; ?></b>, you need to lose some weight
        <?php } ?>

        <?php  
        if($bmi>29 & $bmi<=33){ ?>
        <h6 style="color:red">Obesity class l</h6>
        Your <b>BMI is <?php echo $bmi; ?></b>, you need to lose weight to be healthier
        <?php } ?>

        <?php  
        if($bmi>33 & $bmi<=36){ ?>
        <h6 style="color:red">Obesity class ll</h6>
        Your <b>BMI is <?php echo $bmi; ?></b>, you need to lose weight to be healthier
        <?php } ?>

        <?php  
        if($bmi>36){ ?>
        <h6 style="color:red">Obesity class lll</h6>
        Your <b>BMI is <?php echo $bmi; ?></b>, you need to lose weight to be healthier
        <?php } ?>
        
        <div class="col-md-12 p-0 mt-20">
            <span>Recomended :</span>
            <div class="bmi mt-10">
                <table class="col-md-12">
                    <tr>
                        <th class="text-center">18.5 - 27</th>
                    </tr>
                </table>
            </div>
        </div>
        


    </div>
    <?php } ?>

</div>

<?php
$wishlist = $mysqli->query("select * from wishlist  inner join products on products.id_product=wishlist.id_product
where id_session='$id_session'"); //selecting all products that were added to wishlist 
?>
<div class="container mt-0 margin-top-mobile">
        <div class="col-md-12 bloco_tabela_nutricional mb-60 ">

            <h2 class="mb-10">Diet list</h2>
            <?php if(mysqli_num_rows($wishlist)==0){ ?> <!-- condition to deploy a message if there are no products on wishlist-->
                <span>Add the products to your diet so we can help you!</span>
            <?php } ?>

            <div class="responsive_table mt-40">
            <table id="nutritional_table">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Protein</th>
                <th>Carbs</th>
                <th>Energy Kcal</th>
                <th>Health Grade</th>
            </tr>

            <?php
            if(mysqli_num_rows($wishlist)>0){ //If there is products added to wishlist then all the fields are shown
                //and feedback is provided
            while($ln_wishlist=mysqli_fetch_array($wishlist)){
            ?>
            <tr>
                <td>Energy</td>
                <td><?php echo $ln_wishlist['name']?></td>
                <td><?php echo $ln_wishlist['protein']?></td>
                <td><?php echo $ln_wishlist['carbs']?></td>
                <td><?php echo $ln_wishlist['energy']?></td>
                <td><?php echo $ln_wishlist['health_grade']?></td>
            </tr>
            <?php } ?>

            <?php
            // summing from products, health_grade, protein,carbs, and energy from wishlist by session id
            $sqlmean = $mysqli->query("SELECT SUM(products.health_grade) as total, SUM(products.protein) as protein
            , SUM(products.carbs) as carbs, SUM(products.energy) as energy from wishlist 
            inner join products on products.id_product=wishlist.id_product
            where id_session='$id_session'"); 
            $count = mysqli_num_rows($wishlist);
            while($ln_mean=mysqli_fetch_array($sqlmean)){
            $value_mean = number_format($ln_mean['total']/$count,1); // defining health_grade mean
            $protein_total = number_format($ln_mean['protein'],1);// defining protein total
            $carbs_total = number_format($ln_mean['carbs'],1);// defining carbs total
            $energy_total = number_format($ln_mean['energy'],1);// defining energy total
            ?>
            <tr>
                <td>Total</td>
                <td></td>
                <td><b><?php echo $protein_total; ?></b></td><!-- printing protein total count-->
                <td><b><?php echo $carbs_total; ?></b></td><!-- printing carbs total count-->
                <td><b><?php echo $energy_total; ?></b></td><!-- printing energy total count-->
                <td><b><?php echo $value_mean; ?></b></td><!-- printing health_grade mean-->
            </tr>
            <?php } ?>

            <?php } ?>

            <?php
            if(isset($_SESSION['height'])){ ?> <!-- recomended nutritional values intake-->
            <tr>
                <td>Goal</td>
                <td></td>
                <td><b>Between <?php echo $protein_daily_min; ?> and <?php echo $protein_daily_max; ?></b></td>
                <td><b>50% of Kcal</b></td>
                <td><b><?php echo $energy_goal; ?></b></td>
                <td><b>>7.5</b></td>
            </tr>
            <?php } ?>
           
            </table>
            </div>

        </div>
    </div> 

    <?php 
    if(isset($_SESSION['height']) and mysqli_num_rows($wishlist)>0){ 
    if($protein_total<$protein_daily_min){ ?> <!-- Depending on total results on table user is adviced to consume more or less of each nutritonal values-->
    <div class="container mt-0">
        <div class="col-md-12  mb-20 mt-40">

            <h5 style="color:#e99c2e">Ingest more Protein</h5>

            <span><h7>You need to ingest more protein to maintain a healthy lifestyle.</h7>
            <Br><br> <h6> Here are some suggestions to improve your diet :</h6>

        </div>

        <?php 
        $products = $mysqli->query("select * from products where id_type=1 limit 4"); 
        while($ln_products=mysqli_fetch_array($products)){
        // above I select some products if the protein is low then high protein products are shown to add
        ?>
        <div class="col-md-3 mt-20">
               
            <div class="single-populer-products no-background">
                <div class="single-populer-product-img mt40">
                    <a href="product?id_product=<?php echo $ln_products['id_product']; ?>">
                        <img alt="products images" src="admin/img_products/<?php echo $ln_products['image']; ?>" style="max-height:160px">
                        <!-- printing image of the products that are connected to DB-->
                    </a>
                </div>
                <h2>
                    <a href="product?id_product=<?php echo $ln_products['id_product']; ?>"><?php echo $ln_products['name']; ?></a>
                </h2>
            </div>
        </div>   
        <?php } ?>
    </div>
        <?php } ?>

    <?php if($energy_total<$energy_goal){ ?><!-- Depending on total results on table user is adviced to consume more or less of each nutritonal values-->
    
    <div class="container mt-0">
        <div class="col-md-12  mb-20 mt-40 ">

            <h5 style="color:#e99c2e">Ingest more Calories</h5>

            <h7>Unless you are targeting to lose weight, you need more Kcal, please be responsible and drop the calories gradually.</h7>
            <Br><br> 
            <h6> Here are some suggestions to improve your diet :</h6>

        </div>


        <?php 
        $products = $mysqli->query("select * from products where energy>90 limit 4"); 
        while($ln_products=mysqli_fetch_array($products)){
             // above I select 4 products where energy is higher than 90
        ?>
            <div class="col-md-3 mt-20">
               
                <div class="single-populer-products no-background">
                    <div class="single-populer-product-img ">
                     <a href="product?id_product=<?php echo $ln_products['id_product']; ?>">
                        <img alt="products images" src="admin/img_products/<?php echo $ln_products['image']; ?>" style="max-height:160px">
                    </div>
                     </a>
                    <h2>
                        <a href="product?id_product=<?php echo $ln_products['id_product']; ?>"><?php echo $ln_products['name']; ?></a>
                    </h2>
                </div>
            </div>
    <?php } ?>
    </div>
    <?php } ?>




    <?php if($protein_total>$protein_daily_max){ ?>
    <div class="container mt-0">
        <div class="col-md-12 bloco_tabela_nutricional mb-60 ">

        <h5 style="color:#e99c2e">You exceeded the recomended protein values</h5>

            <span><h7>Try to cut some of your proteins to keep a healthy diet</h7>

        </div>
    </div> 
    <?php } ?>

    <?php if($energy_goal<$energy_total){ ?>
    <div class="container mt-0">
        <div class="col-md-12 bloco_tabela_nutricional mb-20 ">

        <h5 style="color:#e99c2e">You are consuming too many calories, please reduce it for a healthy diet!</h5>

            <span><h7>Consuming too many calories can be a threat to your health, it is normal to do it a few times but don't do it constantly</h7>

        </div>
    </div> 
    <?php } } ?>

   

<?php
if(isset($_POST['height'])){ //defining height and weight by session

    $_SESSION['height'] = $_POST['height'];
    $_SESSION['weight'] = $_POST['weight'];
    print "<meta http-equiv=refresh content='0; url=diet'>";exit;

}
?>
