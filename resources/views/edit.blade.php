<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link herf="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo-plot-listing.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.css')}}">
    
    
    <link herf="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <title>Document</title>
    
    

</head>
<body>
<header class="header-areax header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="/" class="logo">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
            <li><a href="/">Home</a></li>
              <li><a href="/addItemProduct">add product</a></li>
              <li><a href="/showStore">show all item</a></li>
              
            </ul>        
            
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="contact-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-lg-6">
                <div id="map">
                  
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
                <form id="contact" action="/edit/{{$box->id}}" method="post">
                @csrf
                  <div class="row">
                  <!--<div class="form-group">
														<label for="exampleInputFile">صورة المنتج</label>
														<input name="image" type="file" id="exampleInputFile">
									</div> -->
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="name" name="name" value="{{$box->name}}" id="name" placeholder="Name" autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="surname" name="quantity" value="{{$box->quantity}}" id="quantity" placeholder="quantity"  required>
                      </fieldset>
                    </div>
                     <div class="col-lg-12">
                      <fieldset>
                        <input type="text" name="stored_at" value="{{$box->stored_at}}" id="stored_at" placeholder="stored_at" required>
                      </fieldset>
                    </div> 
                    
                    <!--<div class="col-lg-12">
                      <fieldset>
                        <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                      </fieldset> -->
                    </div>
                    <div class="col-lg-10"> 
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button "><i class="fa fa-paper-plane"></i>submit</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Scripts -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/assets/js/owl-carousel.js')}}"></script>
  <script src="{{asset('/assets/js/animation.js')}}"></script>
  <script src="{{asset('/assets/js/imagesloaded.js')}}"></script>
  <script src="{{asset('/assets/js/custom.js')}}"></script>

</body>

</html>
