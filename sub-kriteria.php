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
        <h3>Bobot Sub Kriteria</h3>
      </div>
      <div class="page-content">
        <section class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-header">
                <h4 class="card-title">Tabel Sub Kriteria</h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <p class="card-text">Pengambil keputusan memberi bobot preferensi dari setiap kriteria dengan
                    masing-masing jenisnya (keuntungan/benefit atau biaya/cost):</p>
                </div>
                <button type="button" class="btn btn-outline-success btn-sm m-2" data-bs-toggle="modal"
                  data-bs-target="#inlineForm">
                  Tambah Sub Kriteria
                </button>
                <div class="table-responsive">
                  <table class="table table-striped mb-0">
                    <caption>
                      Tabel Kriteria C<sub>i</sub>
                    </caption>
                    <tr>
                      <th>No</th>
                      <th>Sub Kriteria</th>
                      <th colspan="2">Range</th>
                    </tr>
                    <?php
                    $sql = 'SELECT * FROM saw_sub_criterias';
                    $result = $db->query($sql);
                    $i = 0;
                    while ($row = $result->fetch_object()) {
                      echo "<tr>
        <td class='right'>" . (++$i) . "</td>
        <td class='center'>{$row->sub_criteria}</td>
        <td>{$row->range_sub}</td>
        <td>
            <a href='sub-kriteria-edit.php?id={$row->id}' class='btn btn-info btn-sm'>Edit</a>
            <a class='btn btn-danger btn-sm' href='sub-kriteria-hapus.php?id={$row->id}'>Hapus</a>
            </td>
      </tr>\n";
                    }
                    $result->free();
                    ?>
                  </table>
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

<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Login Form </h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <form action="sub-kriteria-simpan.php" method="POST">
        <div class="modal-body">
          <label>Nama Sub Kriteria: </label>
          <div class="form-group">
            <input type="text" name="name" placeholder="Nama Sub Kriteria..." class="form-control" required>
          </div>
          <label>Range: </label>
          <div class="form-group">
            <input type="text" name="range" placeholder="Range Sub Kriteria..." class="form-control" required>
          </div>
          <label>Nilai: </label>
          <div class="form-group">
            <input type="text" name="nilai" placeholder="Nilai Sub Kriteria..." class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Close</span>
          </button>
          <button type="submit" name="submit" class="btn btn-primary ml-1">
            <i class="bx bx-check d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Simpan</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

</html>