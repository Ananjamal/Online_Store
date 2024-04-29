<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assetsDash/img/zay.png')}}" rel="icon" sizes="192x192">
    <link href="{{asset('assetsDash/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assetsDash/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assetsDash/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assetsDash/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assetsDash/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assetsDash/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assetsDash/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assetsDash/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assetsDash/css/style.css')}}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <style>
        /* Custom CSS to change modal background color */
        .modal-content {
            background-color: #f8f9fa;
            border: 1px solid rgb(138, 135, 135); /* Add a 2px solid black border */

            /* Change this to the desired gray color */
        }
    </style>
    @livewireStyles
</head>

<body>


    {{ $slot }}
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assetsDash/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assetsDash/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assetsDash/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('assetsDash/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assetsDash/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('assetsDash/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assetsDash/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assetsDash/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assetsDash/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @livewireScripts
</body>

</html>
