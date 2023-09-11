<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Blog page</title>


    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('simple-datatables/style.css')}}" rel="stylesheet">

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Template Main CSS File -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">


    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <main id="main" class="main">


        <section class="section">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Horizontal Form</h5>

                    <!-- Horizontal Form -->
                    <form method="post" enctype="multipart/form-data" id="form1" action="{{route('update-blog')}}">
                        @csrf
                        <input type="hidden" name="id" class="form-control" id="inputText" value="{{$data->id}}">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Titel</label>
                            <div class="col-sm-10">
                                <input type="text" name="titel" class="form-control" id="inputText"
                                    value="{{$data->titel}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Auther</label>
                            <div class="col-sm-10">
                                <input type="text" name="auther" class="form-control" id="inputEmail"
                                    value="{{$data->written_by}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea id="message" name="message" rows="4" cols="50">{{$data->content}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">image</label>
                            <div class="col-sm-10">
                                <input type="file" id="image" name="image">
                            </div>
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
                    </form>
                    <!-- End Horizontal Form -->

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Blog</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>






</html>
