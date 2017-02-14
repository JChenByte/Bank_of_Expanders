<?php

$path = $_SERVER['PATH_INFO'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));

$account_num = ($request[0]);
$amount = ($request[1]);



	
	
	$url = "https://daemon17.jchenbyte.com/api.php/withdraw/" . $amount ;

	
	
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER,
			array("Content-type: application/json"));
	curl_setopt($curl, CURLOPT_POST, true);

	$json_response = curl_exec($curl);

	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	
	curl_close($curl);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bank of Expanders</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="https://daemon17.jchenbyte.com/QR/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://daemon17.jchenbyte.com/QR/css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron" align="center">
				<h2>
					Bank of Expanders </h2><br> <h3>Withdrawal Confirmation
				</h3>
				<div>
					You have successfully withdrawn.
				</div>
				
				<p>
					Account Number: <?php echo $account_num ?>
				</p>
				<p>
					Name: John Smith
				</p>
				<p>
					Withdraw Amount: $<?php echo $amount ?>
				</p>
				<p>
					Date: 01/29/2017
				</p>
				
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			</div>
		</div>
	</div>
</div>

    <script src="https://daemon17.jchenbyte.com/QR/js/jquery.min.js"></script>
    <script src="https://daemon17.jchenbyte.com/QR/js/bootstrap.min.js"></script>
    <script src="https://daemon17.jchenbyte.com/QR/js/scripts.js"></script>
  </body>
</html>