<!DOCTYPE html>
<html lang="en">
  <?php
require "layout/head.php";
require "include/conn.php";
?>

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
          <h3>Matrik</h3>
        </div>
        <div class="page-content">
          <section class="row">
            <div class="col-12">
              <div class="card">

                <div class="card-header">
                  <h4 class="card-title">Pengisian Matrik Keputusan</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                  </div>
                  <button type="button" class="btn btn-outline-success btn-sm m-2" data-bs-toggle="modal"
                                        data-bs-target="#inlineForm">
                                        Isi Nilai Alternatif
                                    </button>
                  <div class="table-responsive">
                  <table class="table table-striped mb-0">
    <tr>
        <th rowspan='2'>Alternatif</th>
        <th colspan='6'>Kriteria</th>
    </tr>
    <tr>
        <th>C1</th>
        <th>C2</th>
        <th>C3</th>
        <th>C4</th>
        <th colspan="2">C5</th>
    </tr>
    <?php
$sql = "SELECT
          a.id_alternative,
          b.name,
          SUM(IF(a.id_criteria=1,a.value,0)) AS C1,
          SUM(IF(a.id_criteria=2,a.value,0)) AS C2,
          SUM(IF(a.id_criteria=3,a.value,0)) AS C3,
          SUM(IF(a.id_criteria=4,a.value,0)) AS C4,
          SUM(IF(a.id_criteria=5,a.value,0)) AS C5
        FROM
          saw_evaluations a
          JOIN saw_alternatives b USING(id_alternative)
        GROUP BY a.id_alternative
        ORDER BY a.id_alternative";
$result = $db->query($sql);
$X = array(1 => array(), 2 => array(), 3 => array(), 4 => array(), 5 => array());
while ($row = $result->fetch_object()) {
    array_push($X[1], round($row->C1, 2));
    array_push($X[2], round($row->C2, 2));
    array_push($X[3], round($row->C3, 2));
    array_push($X[4], round($row->C4, 2));
    array_push($X[5], round($row->C5, 2));
    echo "<tr class='center'>
            <th>{$row->name}</th>
            <td>" . round($row->C1, 2) . "</td>
            <td>" . round($row->C2, 2) . "</td>
            <td>" . round($row->C3, 2) . "</td>
            <td>" . round($row->C4, 2) . "</td>
            <td>" . round($row->C5, 2) . "</td>
            <td>
            <a href='keputusan-hapus.php?id={$row->id_alternative}' class='btn btn-danger btn-sm'>Hapus</a>
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
      </div>
    </div>

    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Isi Nilai Kandidat </h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="matrik-simpan.php" method="POST">
                        <div class="modal-body">
                            <label>Name: </label>
                            <div class="form-group">
                            <select class="form-control form-select" name="id_alternative">
                            <?php
                              $sql = 'SELECT id_alternative,name FROM saw_alternatives';
                              $result = $db->query($sql);
                              $i = 0;
                              while ($row = $result->fetch_object()) {
                                echo '<option value="' . $row->id_alternative . '">' . $row->name . '</option>';
                              }
                              $result->free();
                              ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <label>Criteria: </label>
                            <div class="form-group">
                            <select class="form-control form-select" name="id_criteria">
                            <?php
                                  $sql = 'SELECT * FROM saw_criterias';
                                  $result = $db->query($sql);
                                  $i = 0;
                                  while ($row = $result->fetch_object()) {
                                      echo '<option value="' . $row->id_criteria . '">' . $row->criteria . '</option>';
                                  }
                                  $result->free();
                                  ?>
                            </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <label>Value: </label>
                            <div class="form-group">
                            <select class="form-control form-select" name="value">
                            <?php
                                  $sql = 'SELECT * FROM saw_sub_criterias';
                                  $result = $db->query($sql);
                                  $i = 0;
                                  while ($row = $result->fetch_object()) {
                                      echo '<option value="' . $row->value . '">' . $row->sub_criteria . '</option>';
                                  }
                                  $result->free();
                                  ?>
                            </select>
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

    <?php require "layout/js.php";?>
  </body>

</html>