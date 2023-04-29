<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.css')

    <style>
        .title_deg {
            text-align: center;
            font-size: 30px;
            padding: 20px;
        }

        .table_deg {
            border: 2px solid white;
            width: 100%;
            margin: auto;
            padding-top: 50px;
            text-align: center;
        }

        .one {
            background: rgb(255, 246, 122);

        }

        .tr {
            border: 2px solid white;
        }

        .img_size {
            width: 80px;
            height: 80px;
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

                <h1 class="title_deg">All Orders</h1>

                <div style="text-align: center; padding-bottom: 30px">
                    <form action="{{url('search')}}" method="get">

                        <input style="color: black" type="text" name="search" placeholder="Search for something">
                        <input type="submit" value="Search" class="btn btn-primary">

                    </form>
                </div>

                <table class="table_deg">
                    <tr class="one">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Delivered</th>
                        <th>Print PDF</th>
                        <th>Send Email</th>
                    </tr>

                    @forelse ($order as $allorder)
                        <tr class="tr">
                            <td>{{ $allorder->name }}</td>
                            <td>{{ $allorder->email }}</td>
                            <td>{{ $allorder->address }}</td>
                            <td>{{ $allorder->phone }}</td>
                            <td>{{ $allorder->product_title }}</td>
                            <td>{{ $allorder->quantity }}</td>
                            <td>{{ $allorder->price }}</td>
                            <td>{{ $allorder->payment_status }}</td>
                            <td>{{ $allorder->delivery_status }}</td>
                            <td>
                                <img class="img_size" src="/product/{{ $allorder->image }}" alt="">
                            </td>

                            <td>
                                @if ($allorder->delivery_status == 'processing')
                                    <a href="{{ url('delivered', $allorder->id) }}"
                                        class="btn btn-primary" onclick="return confirm('Are you sure this product is delivered !!!')">Delivered</a>
                                        @else
                                        <p>Delivered</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('print_pdf',$allorder->id)}}" class="btn btn-secondary">Print PDF</a>
                            </td>
                            <td>
                                <a href="{{url('send_email',$allorder->id)}}" class="btn btn-secondary">Send Email</a>
                            </td>
                        </tr>

                        @empty

                        <tr>
                            <td colspan="16">
                                No Data Found
                            </td>
                        </tr>

                    @endforelse
                </table>
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
