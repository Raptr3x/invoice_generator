<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="app_assets/main.css" />
    <!-- https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js -->
</head>

<body>
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row" id="invoice_parent">
            <div class="col-md-12 text-right mb-3">
                <button class="btn btn-primary" id="download"> download pdf</button>
            </div>
        </div>
    </div>
    <script src="../jquery.js"></script>
    <script src="app_assets/main.js"></script>
    <script src="app_assets/html2pdf.js"></script>
</body>
</html>