<?php
    require_once './vendor/autoload.php';
?>

<!doctype html>
<html lang="en">

<head>
    <title>API</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="bg-secondary">
    <div class="container mt-5">
        <div class="card">
            <div class="card-hearder text-center">
                <h4>Usuários</h4>
            </div>
            <div class="card-body">
                <div class="row flex-row">
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user" id="user" aria-describedby="user" placeholder="Usuário">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" id="address" aria-describedby="address" placeholder="Endereço">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="city" id="city" aria-describedby="city" placeholder="Cidade">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="state" id="state" aria-describedby="state" placeholder="Estado">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button class="btn btn-success mr-2">POST</button>
                    <button class="btn btn-info">GET</button>
                </div>
                <hr>
                <div class="row flex-row">
                    <!-- .col-md- -->
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>