<!DOCTYPE html>
<html lang="en">
<?php
require "layout/head.php";
require "include/conn.php";
?>

<body>
    <div id="app">
        <?php require "layout/sidebar.php"; ?>
        <div class="container">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>Hasil Perhitungan Weight Product</h3>
            </div>
            <div class="page-content">
                <?php
                require("controller/Kriteria.php");

                $kriteria = Index("SELECT * FROM saw_criterias");
                $alternatif = Index("SELECT * FROM saw_alternatives");
                $bobot = Index("SELECT * FROM saw_evaluations ORDER BY id_alternative, id_criteria");
                $maxkriteria = Index("SELECT SUM(weight) AS Total FROM saw_criterias");
                $test = [];
                $varV = [];
                $totalS = 0;
                ?>
                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="columns">
                                <div class="column">
                                    <div class="card animate__animated animate__zoomIn">
                                        <div class="card-header">
                                            <h4 class="card-header-title">Table penilaian</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="table-container">
                                                <table class="table is-fullwidth">
                                                    <thead class="has-background-success">
                                                        <tr>
                                                            <th class="has-text-white">No</th>
                                                            <th class="has-text-white">Alternatif</th>
                                                            <?php foreach ($kriteria as $header): ?>
                                                                <th class="has-text-white">
                                                                    <?= $header["criteria"] ?>
                                                                </th>
                                                            <?php endforeach ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $a = 1 ?>
                                                        <?php foreach ($alternatif as $row): ?>
                                                            <tr>
                                                                <th>
                                                                    <?= $a++ ?>
                                                                </th>
                                                                <td>
                                                                    <?= $row["name"] ?>
                                                                </td>
                                                                <?php foreach ($bobot as $pembobot): ?>
                                                                    <?php if ($pembobot["id_alternative"] == $row["id_alternative"]): ?>
                                                                        <td>
                                                                            <?= $pembobot["value"] ?>
                                                                        </td>
                                                                    <?php endif ?>
                                                                <?php endforeach ?>
                                                            </tr>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Mencari nilai W</h4>
                                        </div>
                                        <div class="card-content p-2">
                                            <p>Bobot Tiap Kriteria :</p>
                                            <p>W = [
                                                <?php foreach ($kriteria as $tampildoang): ?>
                                                    <?= $tampildoang["weight"] . "," ?>
                                                <?php endforeach ?>
                                                ]
                                            </p>
                                            <hr>
                                            <p>Pembobotan :</p>
                                            <?php $b = 1 ?>
                                            <?php foreach ($kriteria as $bagibobot): ?>
                                                <?php foreach ($maxkriteria as $TotalLah): ?>
                                                    <p>W
                                                        <?= $b++ ?> =
                                                        <?= $bagibobot["weight"] . "/" . $TotalLah["Total"] ?> =
                                                        <?= round($bagibobot["weight"] / $TotalLah["Total"], 3) ?>
                                                    </p>
                                                <?php endforeach ?>
                                            <?php endforeach ?>
                                            <hr>
                                            <p>Normalisasi Berdasarkan Pembobotan :</p>
                                            <?php $c = 1 ?>
                                            <?php foreach ($kriteria as $bagibobot): ?>
                                                <?php foreach ($maxkriteria as $TotalLah): ?>
                                                    <p>W
                                                        <?= $c++ ?> =
                                                        <?php if ($bagibobot["attribute"] == "cost"): ?>
                                                            <?= round($bagibobot["weight"] / $TotalLah["Total"], 3) * -1 ?>
                                                        </p>
                                                    <?php else: ?>
                                                        <?= round($bagibobot["weight"] / $TotalLah["Total"], 3) ?>
                                                        </p>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            <?php endforeach ?>
                                        </div>
                                    </div>

                                    <!-- BAGIAN 2 -->
                                    <div class="card">
                                        <div class="card-content p-3">
                                            <h4 class="subtitle">Bagian 2 : Mencari Nilai Vector (S)</h4>
                                            <p>Pembobotan :</p>
                                            <?php $d = 1 ?>
                                            <?php $e = 0 ?>
                                            <?php foreach ($alternatif as $les): ?>
                                                <?php $idalter = $les["id_alternative"] ?>
                                                <?php $bobot = Index("SELECT * FROM saw_evaluations WHERE id_alternative = $idalter ORDER BY id_alternative, id_criteria"); ?>
                                                <?php $test[$e] = 1 ?>
                                                S
                                                <?= $d++ ?> =
                                                <?php foreach ($bobot as $pembobot): ?>
                                                    <?php $idbobot = $pembobot["id_criteria"] ?>
                                                    <?php $kriteria = Index("SELECT * FROM saw_criterias WHERE id_criteria = $idbobot"); ?>
                                                    <?php foreach ($kriteria as $bagibobot): ?>
                                                        <?php $maxkriteria = Index("SELECT SUM(weight) AS Total FROM saw_criterias"); ?>
                                                        <?php foreach ($maxkriteria as $TotalLah): ?>
                                                            <?php if ($bagibobot["attribute"] == "cost"): ?>
                                                                (
                                                                <?= $pembobot["value"] . "<sup>" . round($bagibobot["weight"] / $TotalLah["Total"], 3) * -1 . "</sup>" ?>)
                                                                <?php $test[$e] = $test[$e] * pow($pembobot["value"], round($bagibobot["weight"] / $TotalLah["Total"], 3) * -1) ?>
                                                            <?php else: ?>
                                                                (
                                                                <?= $pembobot["value"] . "<sup>" . round($bagibobot["weight"] / $TotalLah["Total"], 3) . "</sup>" ?>)
                                                                <?php $test[$e] = $test[$e] * pow($pembobot["value"], round($bagibobot["weight"] / $TotalLah["Total"], 3)) ?>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    <?php endforeach ?>
                                                <?php endforeach ?>
                                                =
                                                <?= round($test[$e], 3) ?>
                                                <?php $totalS = $totalS + $test[$e] ?>
                                                <?php $e++ ?>
                                                <br>
                                            <?php endforeach ?>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card content p-3">
                                            <h4 class="subtitle">Bagian 3 : Mencari Nilai V (V)</h4>
                                            <?php $f = 1 ?>
                                            <?php $g = 0 ?>
                                            <?php foreach ($test as $row): ?>
                                                <p>V
                                                    <?= $f++ ?> =
                                                    <?= round($test[$g], 3) . "/" . round($totalS, 3) ?>
                                                    =
                                                    <?= round(round($test[$g], 3) / round($totalS, 3), 3) ?>
                                                </p>
                                                <?php $g++ ?>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-content p-3">
                                            <h4 class="subtitle">Hasil</h4>
                                            <div class="table-container">
                                                <table class="table is-fullwidth">
                                                    <thead class="has-background-success">
                                                        <tr>
                                                            <th class="has-text-white">No</th>
                                                            <th class="has-text-white">Alternatif</th>
                                                            <th class="has-text-white">Nilai</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot class="has-background-success">
                                                        <tr>
                                                            <th class="has-text-white">No</th>
                                                            <th class="has-text-white">Alternatif</th>
                                                            <th class="has-text-white">Nilai</th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php $h = 1 ?>
                                                        <?php $i = 0 ?>
                                                        <?php $j = 0 ?>
                                                        <?php foreach ($alternatif as $row): ?>
                                                            <?php $varV[$j] = 1 ?>
                                                            <?php $varV[$j] = $test[$i] / $totalS ?>
                                                            <tr>
                                                                <th>
                                                                    <?= $h++ ?>
                                                                </th>
                                                                <td>
                                                                    <?= $row["name"] ?>
                                                                </td>
                                                                <td>
                                                                    <?= round(round($test[$i], 3) / round($totalS, 3), 3) ?>
                                                                </td>
                                                            </tr>
                                                            <?php $i++ ?>
                                                            <?php $j++ ?>
                                                        <?php endforeach ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php require "layout/footer.php"; ?>
        </div>
    </div>
    <?php require "layout/js.php"; ?>
</body>


</html>