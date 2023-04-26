<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.css')

    <style type="text/css">
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }

        .font_size
        {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .title
        {
            color: black;
            padding-bottom: 20px;
        }
        label
        {
            display: inline-block;
            width: 200px;
        }
        .div_design
        {
            padding-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates,
                                and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->

        @include('admin.header')
        <!-- partial -->
        <div class="main-panel col-12">
            <div class="content-wrapper">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                        {{ session()->get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                    </div>
                @endif

                <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="div_center">
                    <h1 class="font_size">Update Product</h1>
                    <div class="div_design">
                        <label for="">Product Title :</label>
                        <input class="title" type="text" value="{{$product->title}}" name="title" placeholder="Write a title" required />
                    </div>

                    <div class="div_design">
                        <label for="">Product Description :</label>
                        <input class="title" type="text" value="{{$product->description}}" name="des_pro" placeholder="Write a description" required />
                    </div>

                    <div class="div_design">
                        <label for="">Product Price :</label>
                        <input class="title" type="number" value="{{$product->price}}" name="pri_pro" placeholder="Write a price" required />
                    </div>

                    <div class="div_design">
                        <label for="">Discount Price :</label>
                        <input class="title" type="number" value="{{$product->discount_price}}" name="disc_pro" placeholder="Write a discount price" />
                    </div>

                    <div class="div_design">
                        <label for="">Product Quantity :</label>
                        <input class="title" type="text" min="0" value="{{$product->quantity}}" name="quan_pro" placeholder="Write a quantity" required />
                    </div>

                    <div class="div_design">
                        <label for="">Product Category :</label>
                        <select name="category" class="title" required>
                            <option value="{{$product->category}}" selected>{{$product->category}}</option>
                            @foreach ($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="div_design">
                        <div class="div_design">
                            <label for="">Current Product Image :</label>
                            <img style="margin: auto;" width="100" height="80" src="/product/{{$product->image}}" alt="">
                        </div>

                        <label for="">Update Product Image :</label>
                        <input type="file" name="image" />
                    </div>

                    <div class="div_design">
                        <input type="submit" value="udate Product" class="btn btn-primary"/>
                    </div>

                </div>
            </form>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
