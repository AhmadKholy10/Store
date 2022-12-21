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
<header class="header-areax header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
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
            
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  
    <div class="container py-5">
        <div class="row">
            <div class="col-8">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>quantity</th>
                                <th>stored_at</th>
                                <th>created_at</th>
                                <th>updated_at </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getboxes as $box)
                            <form action="edit/{{$box->id}}" method="get">
                            <tr id="{{$box->id}}">
                                <td>{{$box->id}}</td>
                                <td>{{$box->name}}</td>
                                <td id="quantity_value">{{$box->quantity}} </td>
                                <td>{{$box->stored_at}}</td>
                                <td>{{$box->created_at}}</td>
                                <td>{{$box->updated_at}}</td>
                                <td><button class="remove" data-product="{{$box->id}}" type="button" id="remove">remove</button></td>
                                <td><button type="submit" id="edit">edit</button></td>
                                <td><input data-quantity="{{$box->quantity}}" value="{{0}}" class="quantity" min="0" type="number" id="quantity" step=1></td>
                                <td><button type="button" id="add_to_box">add to box</button></td>
                            </tr>
                            </form>
                            @endforeach
           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>quantity</th>
                                <th>stored_at</th>
                                <th>created_at</th>
                                <th>updated_at </th>
                                <th>action</th>
                            </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!--<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/app.js"></script>-->
<script>
        function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("example");	
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
        }
        $(document).ready(function(){
        $('.remove').click(function (event) {
          //var type=1;
          
          var productId =$(this).data('product');
          $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            async:'false',
            type:'Post',
            url:"{{ route('remove') }}",
            data:{ productId:productId,"_token": "{{ csrf_token() }}"},
            success:function(data){
              
              document.getElementById(productId).remove();
              
            }
          });


        });
      });

      $(function() {
  $("#add_to_box").on("click",function() {
    
    var quantity = parseInt($("#quantity").val());
    var current_quantity = parseInt($('#quantity_value').text());
    $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
            async:'false',
            type:'Post',
            url:"{{ route('add_to_box') }}",
            data:{ current_quantity:current_quantity, quantity:quantity,"_token": "{{ csrf_token() }}"},
            success:function(data){
              
              $("#quantity_value").text(current_quantity + quantity);
              
            }
          });
    
});
});
</script>
  

</body>
</html>
