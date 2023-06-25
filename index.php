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
                                    <h4>Selamat Datang, di Sistem Pengambilan Keputusan</h4>
                                </div>
                                <div class="card-content">
                                <img src="https://unsplash.com/photos/MYbhN8KaaEc/download?ixid=M3wxMjA3fDB8MXxhbGx8fHx8fHx8fHwxNjg3Njc5NzcyfA&force=true&w=1920" class="img-fluid" alt="...">
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