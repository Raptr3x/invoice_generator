<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">    <link rel="stylesheet" href="app_assets/main.css" />
    <!-- https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />

    <style>
      .gradient {
        background: linear-gradient(50deg, #bd3de1 0%, #2d85d2 100%);
      }
    </style>
</head>

<body>
    <?php require_once("app_templates/nav.php") ?>
    <div class="container mt-50 mb-50"> 
        <div id="invoice_parent">

            <label class="form-label h5">Filename:</label>

            <div class="row">
                <div class="mb-3 col-lg-4 col-xl-4">
                    <div class="input-group">
                        <input id="filename" type="text" class="form-control" placeholder="Username" value="invoice-2612">
                        <span class="input-group-text" id="basic-addon2">.pdf</span>
                    </div>
                </div>
                
                <div class="mb-3 col-2">
                    <button class="btn btn-primary" id="download"> download pdf</button>
                </div>

                <div class="col-lg-4 col-xl-4 mb-3">
                    <select class="form-select" id="select_template">
                        <option value="default.html">Template 1</option>
                        <option value="invoice-01.html">Template 2</option>
                    </select>
                </div>
            </div>

            <p>Select a template and click on text to edit it</p>
            <hr style="max-width: 1050px !important;">
            <div id="invoice" style="max-width: 1050px !important;"></div>
        </div>
    </div>
    <script src="../jquery.js"></script>
    <script src="app_assets/main.js"></script>
    <script src="app_assets/html2pdf.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>