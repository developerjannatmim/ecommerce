
<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 30px;
        }
        th{
            font-weight: bold;
            font-size: 18px;
            padding: 5px;
            background: skyblue;
        }
        table,th,td{

            border: 1px solid gray;
        }


      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

<table class="center">
        <tr>
            <th>Product Title</th>
            <th>Product Quantity</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        <?php $totalprice = 0; ?>
        @foreach ($cart as $cart)
        <tr>
            <td>{{$cart->product_title}}</td>
            <td>{{$cart->quantity}}</td>
            <td>{{$cart->price}}</td>
            <td><img src="/product/{{$cart->image}}" alt="" style="margin: auto" width="100px" height="100px"></td>
            <td><a href="{{url('/remove_cart', $cart->id)}}"
                class="btn btn-danger" onclick="return confirm('Are you sure to remove this product?')">Remove Product</a></td>
        </tr>
        <?php $totalprice = $totalprice + $cart->price ?>
        @endforeach
     </table>

     <div style=" margin: auto">
        <h1 style="font-size: 20px; padding: 40px;">Total Price : {{$totalprice}}</h1>
     </div>

     <div style="margin: auto">
        <h1 style="font-size: 25px; padding-bottom: 15px; text-align: center">Proceed to Order</h1>
        <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
        <a href="" class="btn btn-danger">Pay Using Card</a>
     </div>


      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
