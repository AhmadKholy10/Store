<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>keshk const</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'><link rel="stylesheet" href="assets/css/app.css">

</head>
<body>
<!-- partial:index.partial.html -->
<section class="section-products">
		<div class="container">
				<div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header">
										<h3>welcome</h3>
										
								</div>
						</div>
				</div>
				<div class="row">
						<!-- Single Product -->

						<div class="col-md-6 col-lg-4 col-xl-3" style.left="25%" style.position = "relative">

								<div id="product-1" class="single-product" >


										<div class="part-1" onclick="window.location='/showStore';">

												
										</div>

										<div class="part-2">
												<h3 class="product-title">show all item</h3>
												
										</div>
								</div>
						</div>

						<!-- Single Product -->
						<div class="col-md-6 col-lg-4 col-xl-3" >
								<div id="product-2" class="single-product">
										<div class="part-1" onclick="window.location='/addItemProduct';">
												
										</div>
										<div class="part-2">
												<h3 class="product-title">add new product</h3>
												
										</div>
								</div>
						</div>
                        <div>
						<a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
						<form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
						</div>
						<style> 
							@media screen and (min-width: 480px) {
								.col-xl-3{
									flex: 0 0 auto;
									width: 25%;
									left:25%;
									position: relative;
								}
							}
						</style>


								</div>
						</div>
				</div>
		</div>
</section>
<!-- partial -->

</body>
</html>
