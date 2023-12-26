<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Management System</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
    }

    h1 {
        text-align: center;
        color: #007bff;
    }

    form {
        margin-bottom: 20px;
    }

    .mb-3 {
        margin-bottom: 15px;
    }

    #progress-container {
        margin-top: 20px;
    }

    #progress-bar {
        height: 20px;
        border-radius: 4px;
        text-align: center;
        line-height: 20px;
        color: #fff;
    }

    .bg-info {
        background-color: #17a2b8 !important;
    }

    .bg-danger {
        background-color: #dc3545 !important;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .modal-content {
        border-radius: 8px;
    }

    .modal-header {
        background-color: #007bff;
        color: #fff;
        border-bottom: 1px solid #dee2e6;
        padding: 15px;
        border-radius: 8px 8px 0 0;
    }

    .modal-title {
        font-size: 1.5rem;
    }

    .modal-body {
        padding: 20px;
    }

    .modal-footer {
        border-top: 1px solid #dee2e6;
        padding: 15px;
        border-radius: 0 0 8px 8px;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #545b62;
        border-color: #4e555b;
    }
</style>

</head>

<body>
@include('layout.header')
@yield('main')


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <script>
   $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>

</html>
