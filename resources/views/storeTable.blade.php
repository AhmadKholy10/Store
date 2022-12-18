<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link herf="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-plot-listing.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    
    
    <link herf="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Document</title>
    
    

</head>
<body>
    <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index.html">Home</a></li>
              <li><a href="category.html">Category</a></li>
              <li><a href="listing.html">Listing</a></li>
              <li><a href="contact.html" class="active">Contact Us</a></li> 
              <li><div class="main-white-button"><a href="#"><i class="fa fa-plus"></i> Add Your Listing</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h6>Keep in touch with us</h6>
            <h2>Feel free to send us a message about your business needs</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Header Area End ***** -->
    <div class="container py-5">
        <div class="row">
            <div class="col-8">
                <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>quantity</th>
                                <th>stored_at</th>
                                <th>created_at</th>
                                <th>updated_at </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getboxes as $box)
                            <tr>
                                <td>{{$box->name}}</td>
                                <td>{{$box->quantity}}</td>
                                <td>{{$box->stored_at}}</td>
                                <td>{{$box->created_at}}</td>
                                <td>{{$box->updated_at}}</td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>quantity</th>
                                <th>stored_at</th>
                                <th>created_at</th>
                                <th>updated_at </th>
                            </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/app.js"></script>
    <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>

</body>
</html>
