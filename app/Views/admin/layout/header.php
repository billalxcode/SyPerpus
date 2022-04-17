<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>">
    
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/perfect-scrollbar/perfect-scrollbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/bootstrap-icons/bootstrap-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('images/favicon.svg') ?>" type="image/x-icon">

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        table.dataTable td{
            padding: 15px 8px;
        }
        .fontawesome-icons .the-icon svg {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <script src="<?= base_url('vendors/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('vendors/jquery-datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js') ?>"></script>
    <div id="app" class="min-vh-100">
