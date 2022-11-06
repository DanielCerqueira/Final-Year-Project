<?php
$total_products = $mysqli->query("select * from products");

$grade_1 = $mysqli->query("select * from products where health_grade='1'");
$grade_2 = $mysqli->query("select * from products where health_grade='2'");
$grade_3 = $mysqli->query("select * from products where health_grade='3'");
$grade_4 = $mysqli->query("select * from products where health_grade='4'");
$grade_5 = $mysqli->query("select * from products where health_grade='5'");
$grade_6 = $mysqli->query("select * from products where health_grade='6'");
$grade_7 = $mysqli->query("select * from products where health_grade='7'");
$grade_8 = $mysqli->query("select * from products where health_grade='8'");
$grade_9 = $mysqli->query("select * from products where health_grade='9'");
$grade_10 = $mysqli->query("select * from products where health_grade='10'");
?>

<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
        <?php
        $types = $mysqli->query("select * from types");
        while($ln_types=mysqli_fetch_array($types)){
            $nr_product = $mysqli->query("select * from products where id_type='".$ln_types['id_type']."'");
        ?>
        ['<?php echo $ln_types['type']; ?>', <?php echo mysqli_num_rows($nr_product); ?>],
        <?php } ?>
    ]);

    // Set chart options
    var options = {'title':'',
                    'width':700,
                    'height':300,
                    colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6']};

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
    }
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Health Grade', 'Number of products'],
        ['1', <?php echo mysqli_num_rows($grade_1); ?>],
        ['2', <?php echo mysqli_num_rows($grade_2); ?>],
        ['3', <?php echo mysqli_num_rows($grade_3); ?>],
        ['4', <?php echo mysqli_num_rows($grade_4); ?>],
        ['5', <?php echo mysqli_num_rows($grade_5); ?>],
        ['6', <?php echo mysqli_num_rows($grade_6); ?>],
        ['7', <?php echo mysqli_num_rows($grade_7); ?>],
        ['8', <?php echo mysqli_num_rows($grade_8); ?>],
        ['9', <?php echo mysqli_num_rows($grade_9); ?>],
        ['10', <?php echo mysqli_num_rows($grade_10); ?>],
    ]);

    var options = {
        chart: {
        title: 'Health Grade',
        },
        bars: 'horizontal' // Required for Material Bar Charts.
    };

    var chart = new google.charts.Bar(document.getElementById('barchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

    var data = google.visualization.arrayToDataTable([
        ['Name', 'Wishlist', 'Visits'],
        <?php
        $products = $mysqli->query("select * from products order by views desc limit 10");
        while($ln_products=mysqli_fetch_array($products)){
        $count_wishlist = $mysqli->query("select * from wishlist where id_product='".$ln_products['id_product']."'");
        ?>
        ['<?php echo $ln_products['name']; ?>',  <?php echo mysqli_num_rows($count_wishlist); ?>, <?php echo $ln_products['views']; ?>],
        <?php } ?>
    ]);

      var options = {
        title: '',
        vAxis: {
          title: 'Top 10 views'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div2'));

      chart.draw(data, options);
    }
</script>


<section class="p-100 bloco_texto" style="background:#e99c2e">
    <div class="container">
        <div class="col-md-5 p-0" style="color:#e99c2e">
            <h2 class="text-white">Welcome<br>to your <br>Dashboard</h2>
        </div>

        <div class="col-md-7 mt-20">
            <p class="mb-20 text-white">Health grade is a feature implemented by the company in order to keep track of your diet, we have created a &nbsp 
                &nbsp &nbsp &nbsp &nbsp  &nbsp "health grade" for each product
                and with that we are able to assist you in your diet and ultimately advise you to make better choices.</p>
            
        </div>
    </div>
</section>


<section>

    <div class="container p-100 pb-0">
        <div class="row text-center">

        <h5 class="mb-80">Last products inserted</h5>

        <?php
        $products = $mysqli->query("select * from products order by id_product desc limit 4");
        while($ln_products=mysqli_fetch_array($products)){ ?>
            <div class="col-md-3 bloco_produtos">
                <div class="single-populer-products no-background">
                    <div class="single-populer-product-img mt40">
                        <img alt="products images" src="img_products/<?php echo $ln_products['image']; ?>">
                    </div>
                    <h6><?php echo $ln_products['name']; ?></h2>
                    <a class="btn_webapp btn-100 mt-20" href="produto?id_product=<?php echo $ln_products['id_product']; ?>">
                        Edit Product
                    </a>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

</section>

<section class="p-100">
    <div class="container text-center">
        
        <div class="col-md-12">
            <h5 class="mb-0">Top 10 most visited products</h5>
            <div id="chart_div2" style="width: 100%; height: 500px;"></div>
        </div>

    </div>
</section>

<section>
    <div class="container text-center">			
        
        <div class="row">

            <div class="col-md-5 text-left">
                <h3 class="mb-40">Products by category</h3>
                <span>This pie chart shows how many products exist from each category, proteins, vegetables/fruits, fats and carbs.</span>
            </div>   

            <div class="col-md-6">
                <div id="chart_div"></div>
            </div>
        
        </div>

        <div class="container p-60 text-left">

            <?php
            $cat_vegetables = $mysqli->query("select * from products where id_type='2'");
            $cat_protein = $mysqli->query("select * from products where id_type='1'");
            $cat_carbo = $mysqli->query("select * from products where id_type='4'");
            $cat_fat = $mysqli->query("select * from products where id_type='3'");
            ?>
				<div class="col-md-3 bloco_categorias">
					<span style="float:left"><img src="images/icon.svg"></span>
					<h1 style="float:right" class="fw-200"><?php echo mysqli_num_rows($cat_vegetables); ?></h1>

					<div class="w-100">
						<h6>Vegetables</h6>
					</div>
				</div>
				<div class="col-md-3 bloco_categorias">
					<span style="float:left"><img src="images/icon2.svg"></span>
					<h1 style="float:right" class="fw-200"><?php echo mysqli_num_rows($cat_protein); ?></h1>

					<div class="w-100">
						<h6>Protein</h6>
					</div>
				</div>
				<div class="col-md-3 bloco_categorias">
					<span style="float:left"><img src="images/icon3.svg"></span>
					<h1 style="float:right" class="fw-200"><?php echo mysqli_num_rows($cat_carbo); ?></h1>

					<div class="w-100">
						<h6>Carbohydrate</h6>
					</div>
				</div>
				<div class="col-md-3 bloco_categorias">
					<span style="float:left"><img src="images/icon4.svg"></span>
					<h1 style="float:right" class="fw-200"><?php echo mysqli_num_rows($cat_fat); ?></h1>

					<div class="w-100">
						<h6>Fats</h6>
					</div>
				</div>

			</div>

    </div>
</section>

<section>
    <div class="container text-center p-100">
        
        <div class="col-md-12">
            <h5 class="mb-0">Products by health grade</h5>
            <div id="barchart_material" style="width: 100%; height: 500px;"></div>
        </div>

    </div>
</section>