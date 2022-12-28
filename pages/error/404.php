<!-- 404 Bootsrap View -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>

    <!-- Bootsraps -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- font aowsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-dark">


    <div class="vw-100 vh-100 d-flex justify-content-center align-items-center text-white">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <!-- Icon file broken -->
                    <div class="row justify-content-center">
                        <span class="material-symbols-outlined col-12 text-center" style="font-size: 200px;">
                            broken_image
                        </span>
                    </div>



                    <h1 class="text-center">
                        Oops!
                    </h1>
                    <h2 class="text-center">
                        404 Not Found!
                    </h2>
                    <hr>
                    <div class="error-details mb-3">
                        Sorry, an error has occured, Requested page not found!
                    </div>
                    <div class="row justify-content-center">
                        <div class="error-actions text-center col-8">
                            <a href="<?= BASE_URL ?>" class="btn btn-outline-light btn-sm"><span class="fa fa-home"></span>
                                Take Me Home </a>
                            <!-- <a href="<?= BASE_URL ?>/?page=contact" class="btn btn-default btn-lg">
                            <span class="glyphicon glyphicon-envelope"></span> Contact Support </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bootsrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>