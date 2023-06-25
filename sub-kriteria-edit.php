<?php
require "include/conn.php";
$id = $_GET['id'];
$sql = "SELECT * FROM saw_sub_criterias WHERE id = '$id' ";
$result = $db->query($sql);
$row = $result->fetch_array();
?>
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
                    <h3>Bobot Edit</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Data</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form action="sub-kriteria-edit-act.php" method="POST">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Sub Kriteria</label>
                                        <input type="text" class="form-control" name="id" value="<?=$row['id'];?>" hidden>
                                        <input type="text" class="form-control" name="sub_criteria" value="<?=$row['sub_criteria'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Range</label>
                                        <input type="text" class="form-control" name="range" value="<?=$row['range_sub'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Value</label>
                                        <input type="text" class="form-control" name="value" value="<?=$row['value'];?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-info btn-sm">
                                    </div>
                                    </form>
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

</html>