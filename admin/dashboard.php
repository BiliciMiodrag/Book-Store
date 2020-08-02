
<?php
include ("../registration/registration-funtctions.php");
require_once "../layout/layout1.php";
include "../connection.php";

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../registration/login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}


?>
<style >
  body{
display: initial;
  }
</style>
<div class="container-fluid">
	<div id="columnchart12" style="width: 100%; height: 500px;"></div>
</div>
<div class="title">
	<p style="margin-left: 20px;">
	The main buyers</p>
	<div id="table_div"></div>
</div>
<div id="barchart_values" style="width: 900px; height: 300px; margin:20px;"></div>
<?php
require_once "../layout/layout2.php";
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = google.visualization.arrayToDataTable([['ship_city', 'quantity'],
			<?php 

			$query="SELECT * FROM orders INNER JOIN order_items ON orders.orderid=order_items.orderid GROUP BY ship_city";
			$result=mysqli_query($db, $query);
			while ($row=mysqli_fetch_array($result)){
				echo "['".$row['ship_city']."',".$row['quantity']."],";
			}
			?>
			]); 

		var options ={
			title: 'Number of books sold by each city', pieHole:0.3, pieSliceTextStyle: {color:'black',}, legend: 'true'};

			var chart = new google.visualization.ColumnChart(document.getElementById("columnchart12"));
			chart.draw(data,options);
		}

	</script>


	<script type="text/javascript">
		google.load("visualization", "1", {packages:["table"]});
		google.setOnLoadCallback(drawTable);
		function drawTable() {
			var data = google.visualization.arrayToDataTable([['First Name', 'Last Name', 'The Amount in $'],
				<?php 

				$query="SELECT orders.amount, users.fname, users.lname FROM users INNER JOIN orders ON users.id = orders.user_id ORDER BY amount DESC";
				$result=mysqli_query($db, $query);
				while ($row=mysqli_fetch_array($result)){
					echo "['".$row['fname']."','".$row['lname']."',".$row['amount']."],";
				}
				?>
				]); 

			var options ={
				showRowNumber: true, width: '100%', height: '100%', legend: 'true'};

				var table = new google.visualization.Table(document.getElementById("table_div"));
				table.draw(data,options);
			}

		</script>

		<script type="text/javascript">
			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(drawChart);
			function drawChart() {
				var data = google.visualization.arrayToDataTable([['Author', 'The quantity of books sold'],
					<?php 

					$query="SELECT books.book_author, order_items.quantity FROM books INNER JOIN order_items ON books.book_isbn=order_items.book_isbn";
					$result=mysqli_query($db, $query);
					while ($row=mysqli_fetch_array($result)){
						echo "['".$row['book_author']."',".$row['quantity']."],";
					}
					?>
					]); 

				var options ={
					title: 'Number of books sold by Author', width: 600,
					height: 400,
					bar: {groupWidth: "95%"}, legend: 'true'};

					var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
					chart.draw(data,options);
				}

			</script>