<!DOCTYPE html>
<html lang="en">
    <?php require "layout/head.php";?>

    <body>
        <div id="app">
            <?php require "layout/sidebar.php";?>
            <div class="container">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
                <div class="page-heading">
                    <h3>Dashboard</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Sistem Pendukung Keputusan Rekrutmen Karyawan Metode SAW dan WP</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <p class="card-text">
                                        Metode Simple Addictive Weighting (SAW) merupakan salah satu metode yang paling banyak digunakan sebagai penunjang keputusan karena mudah digunakan. Metode Simple Addictive Weighting (SAW) adalah suatu metode dengan cara pembobotan dari rating kinerja pada setiap alternatif pada setiap atribut dari kriteria yang sudah ditentukan.
                                        </p>
                                        <hr>
                                        <p class="card-text">
                                        WP merupakan salah satu metode MADM (Multi Atribut Decission Making) yang digunsksn dalam sistem pendukung keputusan. Metode WP mengevaluasi beberapa alternative terhadap sekumpulan atribut atau kriteria, dimanasetiap atribut tidak saling bergantung satu dengan yang lainnya
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <?php require "layout/footer.php";?>
            </div>
        </div>
        <?php require "layout/js.php";?>
    </body>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
</html>