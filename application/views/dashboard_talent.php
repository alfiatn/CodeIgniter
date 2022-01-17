<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TSM ent.</title>
  </head>
  <body>
    <div class="panel-header panel-header-lg">
    </div>
    <div class="content">
      <div class="row">
        <div class="col-lg-4">
          <div class="card card-chart">
            <div class="card-header">
              <!-- <h5 class="card-category">Global Sales</h5> -->
              <h4 class="card-title">Data Talent</h4>
              <div class="dropdown">
                <button type="button" class="btn btn-round btn-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                  <i class="now-ui-icons loader_gear"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="<?php echo base_url() ?>index.php/Talent/index">Tabel Data Talent</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="chart-area">
                <canvas id="lineChartExample"></canvas>
              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card card-chart">
            <div class="card-header">
              <h4 class="card-title">Data Transaksi</h4>
              <div class="dropdown">
                <button type="button" class="btn btn-round btn-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                  <i class="now-ui-icons loader_gear"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="<?php echo base_url() ?>index.php/Transaksi/index">Tabel Data Transaksi</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="chart-area">
                <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
              </div>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card card-chart">
            <div class="card-header">
              <h4 class="card-title">Data User</h4>
              <div class="dropdown">
              <button type="button" class="btn btn-round btn-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                <i class="now-ui-icons loader_gear"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="<?php echo base_url() ?>index.php/User_talent/index">Tabel Data User</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
