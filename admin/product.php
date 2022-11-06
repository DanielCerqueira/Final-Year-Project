<?php
if(!isset($_GET['id_product'])){ ?> <!-- if id_product doesn't exist then it is an insert -->

<!--populer-products start -->
<section id="banner" class="background-cover2">
    <div class="opacity_layer"></div>
    <div class="container p-0"> 
        
        <div class="banner_align">
                <div class="col-md-12 p-0">
                <h1 class="text-white z-index2">Single Product</h1>
                <h4 class="fw-200 mt-20 text-white z-index2"><a href="home" style="color:white"> Home</a> * <a href="products"style="color:white"> Products</a> 
                </h4>
            </div>
    
        </div>
    </div>
</section>

<section class="p-100">
    <div class="container">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="col-md-4 bloco_input">
                    <label>Product name</label>
                    <input type="text" name="product_name">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Type</label>
                    <select name="type">
                        <?php
                        $types = $mysqli->query("select * from types");
                        while($ln_types=mysqli_fetch_array($types)){ ?>
                        <option value="<?php echo $ln_types['id_type']; ?>"><?php echo $ln_types['type']; ?></option>
                        <?php } ?> 
                    </select>
                </div>

                <div class="col-md-2 bloco_input">
                    <label>Health Grade</label>
                    <input type="text" name="health_grade">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>QR Code</label>
                    <input type="text" name="qr_code">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Energy</label>
                    <input type="text" name="energy">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Carbs</label>
                    <input type="text" name="carbs">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Protein</label>
                    <input type="text" name="protein">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Fat</label>
                    <input type="text" name="fat">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Fiber</label>
                    <input type="text" name="fiber">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Sodium</label>
                    <input type="text" name="sodium">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Sugar</label>
                    <input type="text" name="sugar">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Lifespan</label>
                    <input type="text" name="lifespan">
                </div>

                <div class="col-md-12 bloco_input">
                    <label>Description</label>
                    <textarea name="description" rows="5"></textarea>
                </div>

                <div class="col-md-4 bloco_input">
                    <label>Image</label>
                    <input type="file" name="fileToUpload">
                </div>

                <div class="col-md-12 bloco_input">
                    <input type="submit" name="submit" class="btn_webapp" value="Submit">
                </div>

            </form>

            
        
    </div>
</section>

<?php
if(isset($_POST['submit'])){

$product_name = $_POST['product_name'];
$type = $_POST['type'];
$health_grade = $_POST['health_grade'];
$qr_code = $_POST['qr_code'];
$energy = $_POST['energy'];
$carbs = $_POST['carbs'];
$protein = $_POST['protein'];
$fat = $_POST['fat'];
$fiber = $_POST['fiber'];
$sodium = $_POST['sodium'];
$sugar = $_POST['sugar'];
$lifespan = $_POST['lifespan'];
$description = $_POST['description'];

$target_dir = "img_products/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
//Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$image = $_FILES["fileToUpload"]["name"];

$product = $mysqli->query("INSERT INTO products (id_product, name, id_type, description, image, energy, carbs, protein, fat, fiber, sugar, lifespan, health_grade, qr_code) VALUES('', '$product_name', '$type', '$description', '$image', '$energy', '$carbs', '$protein', '$fat', '$fiber', '$sugar', '$lifespan', '$health_grade', '$qr_code')");

print "<meta http-equiv=refresh content='0; url=products'>";exit;

}

}

else{ // else it means that is an update
$product = $mysqli->query("select * from products where id_product='".$_GET['id_product']."'"); //get products by product_id
while($ln_product=mysqli_fetch_array($product)){
?>

<!--populer-products start -->
<section id="banner" class="background-cover2">
    <div class="opacity_layer"></div>
    <div class="container p-0"> 
        
    <div class="banner_align">
                <div class="col-md-12 p-0">
                <h2 class="text-white z-index2">Single Product</h2>
                <h4 class="fw-200 mt-20 text-white z-index2"><a href="home" style="color:white"> Home</a> * <a href="products"style="color:white"> Products</a> 
                </h4>
            </div>
    
        </div>
    </div>
</section>

<section class="p-100">
    <div class="container">

            <form action="" method="POST" enctype="multipart/form-data">

                <div class="col-md-4 bloco_input">
                    <label>Product name</label>
                    <input type="text" name="product_name" value="<?php echo $ln_product['name']; ?>">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Type</label>
                    <select name="type">
                        <?php
                        $types = $mysqli->query("select * from types");
                        while($ln_types=mysqli_fetch_array($types)){ ?>
                        <option value="<?php echo $ln_types['id_type']; ?>" <?php if($ln_types['id_type']==$ln_product['id_type']){ echo 'selected'; } ?>><?php echo $ln_types['type']; ?></option>
                        <?php } ?> <!-- get the current type (veg or protein etc...) of this product to be selected --> 
                    </select>
                </div>

                <div class="col-md-2 bloco_input">
                    <label>Health Grade</label>
                    <input type="text" name="health_grade" value="<?php echo $ln_product['health_grade']; ?>">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>QR Code</label>
                    <input type="text" name="qr_code" value="<?php echo $ln_product['qr_code']; ?>">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Energy</label>
                    <input type="text" name="energy" value="<?php echo $ln_product['energy']; ?>">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Carbs</label>
                    <input type="text" name="carbs" value="<?php echo $ln_product['carbs']; ?>">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Protein</label>
                    <input type="text" name="protein" value="<?php echo $ln_product['protein']; ?>">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Fat</label>
                    <input type="text" name="fat" value="<?php echo $ln_product['fat']; ?>">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Fiber</label>
                    <input type="text" name="fiber" value="<?php echo $ln_product['fiber']; ?>">
                </div>


                <div class="col-md-3 bloco_input">
                    <label>Sugar</label>
                    <input type="text" name="sugar" value="<?php echo $ln_product['sugar']; ?>">
                </div>

                <div class="col-md-3 bloco_input">
                    <label>Lifespan</label>
                    <input type="text" name="lifespan" value="<?php echo $ln_product['lifespan']; ?>">
                </div>

                <div class="col-md-12 bloco_input">
                    <label>Description</label>
                    <textarea name="description" rows="5"><?php echo $ln_product['description']; ?></textarea>
                </div>

                <input type="hidden" name="id_product" value="<?php echo $ln_product['id_product']; ?>">
                <input type="hidden" name="old_image" value="<?php echo $ln_product['image']; ?>">

                <div class="col-md-4 bloco_input">
                    <label>Image</label>
                    <input type="file" name="fileToUpload">
                </div>

                <div class="col-md-12 bloco_input">
                    <input type="submit" name="submit" class="btn_webapp" value="Submit">
                </div>

            </form>

        
    </div>
</section>

<?php
if(isset($_POST['submit'])){

$product_name = $_POST['product_name'];
$type = $_POST['type'];
$health_grade = $_POST['health_grade'];
$qr_code = $_POST['qr_code'];
$energy = $_POST['energy'];
$carbs = $_POST['carbs'];
$protein = $_POST['protein'];
$fat = $_POST['fat'];
$fiber = $_POST['fiber'];
$sugar = $_POST['sugar'];
$lifespan = $_POST['lifespan'];
$description = $_POST['description'];
$id_product = $_POST['id_product'];
$old_image = $_POST['old_image'];

$target_dir = "img_products/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }
}
if($uploadOk==1){ unlink("img_products/".$_POST['old_image']); $image = $_FILES["fileToUpload"]["name"];  } 
else{ $image = $_POST['old_image']; }

$mysqli->query("UPDATE products set name='$product_name', id_type='$type', description='$description', image='$image', energy='$energy', carbs='$carbs', protein='$protein', fat='$fat', fiber='$fiber', sugar='$sugar', lifespan='$lifespan', health_grade='$health_grade', qr_code='$qr_code', image='$image' where id_product='$id_product'");

print "<meta http-equiv=refresh content='0; url=products'>";exit;

}

}

}