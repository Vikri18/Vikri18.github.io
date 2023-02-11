<?php
include_once 'functions.php';
?>
<!doctype html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Cek Cuaca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="cloud.png" width="60" height="60" alt="logo">
                Cek Cuaca
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item dropdown">

                    </li>
                    <li class="nav-item">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <!--Jumbotron-->
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Cek Cuaca Yuk!</h1>
            <p class="col-md-8 fs-4">disini kamu bisa melacak cuaca sesuai tempat yang kamu tentukan.</p>
        </div>
    </div>
    <!--End Jumbotron-->

    <div class="container">
        <div class="row mt-5">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="origin">Provinsi</label>
                    <select class="form-control" id="origin" name="province" required>
                        <option value="" selected disabled>--Pilih Provinsi--</option>
                        <?php
                        $allOngkir = getAllProvinceOngkir();
                        foreach ($allOngkir['rajaongkir']['results'] as $key => $value) :
                        ?>
                            <option <?php if (isset($_POST['province']) && $_POST['province'] == $value['province_id']) echo "selected='selected'" ?> value="<?php echo $value['province_id']; ?>"><?php echo $value['province']; ?></option>
                        <?php endforeach; ?>

                    </select>
                    <input type="submit" id="btnSubmit1" name="btnSubmit1" value="pilih">
                </div>
                <div class="form-group">
                    <?php if (isset($_POST['btnSubmit1'])) : ?>
                        <label for="destination">Kota </label>
                        <select class="form-control" name="city" id="city">
                            <option value="" selected disabled>--Pilih Kota--</option>
                            <?php
                            $city = getCity($_POST['province']);
                            foreach ($city['rajaongkir']['results'] as $key => $value) :
                            ?>
                                <option <?php if (isset($_POST['city']) && $_POST['city'] == $value['city_id']) echo "selected='selected'" ?> value="<?php echo $value['city_name']; ?>"><?php echo $value['city_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" id="btnSubmit2" name="btnSubmit2" value="pilih">
                    <?php endif; ?>

                </div>
            </form>
            <?php
            if (isset($_POST['btnSubmit2'])) {
                $kota   = $_POST['city'];
            ?>
                <br><br>
                <input type="text" class="form-control input-keyword" value="<?php echo $kota ?>" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                <button class="btn btn-primary" type="button" id="button-addon2">Cek Cuaca</button>

            <?php }
            ?>
        </div>
    </div>
    <div class="container">
        <div class="mt-5 result">

        </div>
    </div>

    </div>


    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <!--footer-->
    <footer class="bg-dark text-white mb-3">
        <div class="container">
            <div class="row p-3">
                <div class="col-sm-8 col-xxl-9">
                    <div class="mb-3">

                        <a class="m-3 text-white" href="#">10120207</a>
                    </div>

                    <div class="mb-3">

                    </div>

                    <div>
                        <a class="m-3 text-white">Vikri Frediansyah</a>
                    </div>
                </div>

                <div class="col-sm-4 col-xxl-3 text-end mb-3">
                    Dibuat untuk memenuhi Tugas Besar
                    Mata Kuliah Aplikasi Teknologi Online

                </div>
            </div>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022
        </div>

    </footer>
    <!--end footer-->
    <!--end footsder-->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>
