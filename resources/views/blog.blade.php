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
            <div class="row">
                <div widht='100%'>
                    <div class="card-body">
                        <h5 class="card-title">Blog Table</h5>
                        @if ($errors->has('msg'))
                        <div class="alert alert-danger">
                            {{ $errors->first('msg') }}
                        </div>
                        @endif
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Blog
                        </button>
                        <div class="search-bar">
                            <form class="search-form d-flex align-items-center" method="POST"
                                action="{{route('search')}}">
                                @csrf
                                <input type="text" name="titel" placeholder="Search" title="Enter search keyword">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                            </form>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Titel</th>
                                        <th scope="col">Auther</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $counter=1;
                                    @endphp
                                    @foreach($blog as $b)
                                    <tr>
                                        <th scope="row">{{$counter}}</th>
                                        <td><a href="{{route('view-blog' ,['id' => $b->id])}}"
                                                class="btn btn-success">{{$b->titel}}</td>
                                        <td>{{$b->written_by}}</td>
                                        <td>{{$b->content}}</td>
                                        <td>{{$b->created_at}}</td>
                                        <td>
                                            <a href="{{route('edit-blog' ,['id' => $b->id])}}" class="btn btn-primary"
                                                title="view" rel="tooltip">Edit Blog</i></a>
                                            <a href="{{route('delete-blog' ,['id' => $b->id])}}" class="btn btn-danger"
                                                title="view" rel="tooltip">Delete</i></a>
                                        </td>
                                    </tr>
                                    @php
                                    $counter++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Default Table Example -->
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Blog</h5>

                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data" id="form1"
                                    action="{{route('add-blog')}}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Titel</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="titel" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Auther</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="auther" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
                                        <div class="col-sm-10">
                                            <textarea id="message" name="message" rows="4" cols="50"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">image</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="image" name="image">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade" id="categoryEditModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Blog</h5>

                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data" id="form1"
                                    action="{{route('add-blog')}}">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Titel</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="titel" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Auther</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="auther" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
                                        <div class="col-sm-10">
                                            <textarea id="message" name="message" rows="4" cols="50"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">image</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="image" name="image">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
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
