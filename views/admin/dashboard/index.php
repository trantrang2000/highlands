<title>Dashboard</title>

<div class="text-white my-5">
  <h1 class="fs-2">Highland!</h1>
  <p>Bạn có 25 tin nhắn và 5 thông báo.</p>
</div>

<div class="row">
  <div class="col-12 col-md-6">
    <div class="card border-0 shadow-sm mb-4">
      <div class="card-body">
        <h4>Báo cáo thống kê</h4>
        <form action="" method="GET">
          <div class="d-flex">
            <div class="form-custom" style="min-width: 100px">
              <label for="year" class="form-label">Năm</label>
              <select class="form-select" id="year" name="year">
                <?php
                $currentYear = date("Y");
                $selectedYear = $_GET['year'] ?? date("Y");
                ?>
                <?php for ($i = $currentYear; $i >= $currentYear - 10; $i--) { ?>
                  <option value="<?php echo $i ?>" <?php if ($selectedYear == $i) { ?>selected<?php } ?>><?php echo $i ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-custom ms-2" style="min-width: 100px">
              <label for="month" class="form-label">Tháng</label>
              <?php $currentMonth = $_GET['month'] ?? date("m"); ?>
              <select class="form-select" id="month" name="month">
                <?php for ($i = 1; $i <= 12; $i++) { ?>
                  <option value="<?php echo $i ?>" <?php if ($currentMonth == $i) { ?>selected<?php } ?>><?php echo $i ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <button class="btn btn-info" type="submit">Thống kê</button>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="row">
  <div class="col-sm-6 col-xl-3 mb-2">
    <div class="card border-0 shadow-sm">
      <div class="card-body">
        <div class="row">
          <div class="col mt-0">
            <h5 class="card-title">Tài khoản</h5>
          </div>

          <div class="col-auto">
            <div class="avatar-title rounded-circle bg-info">
              <i class="bi bi-person-lines-fill"></i>
            </div>
          </div>
        </div>
        <h1 class="display-5 mt-1"><?php echo $totalUser ?></h1>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3 mb-2">
    <div class="card border-0 shadow-sm">
      <div class="card-body">
        <div class="row">
          <div class="col mt-0">
            <h5 class="card-title">Đơn hàng</h5>
          </div>

          <div class="col-auto">
            <div class="avatar-title rounded-circle bg-danger">
              <i class="bi bi-basket3-fill"></i>
            </div>
          </div>
        </div>
        <h1 class="display-5 mt-1"><?php echo $totalOrder ?></h1>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3 mb-2">
    <div class="card border-0 shadow-sm">
      <div class="card-body">
        <div class="row">
          <div class="col mt-0">
            <h5 class="card-title">Doanh thu</h5>
          </div>

          <div class="col-auto">
            <div class="avatar-title rounded-circle bg-warning">
              <i class="bi bi-coin"></i>
            </div>
          </div>
        </div>
        <h1 class="display-5 mt-1"><?php echo number_format($totalMoneyOrder) ?>đ</h1>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3 mb-2">
    <div class="card border-0 shadow-sm">
      <div class="card-body">
        <div class="row">
          <div class="col mt-0">
            <h5 class="card-title">Số sản phẩm</h5>
          </div>

          <div class="col-auto">
            <div class="avatar-title rounded-circle bg-success">
              <i class="bi bi-brightness-high"></i>
            </div>
          </div>
        </div>
        <h1 class="display-5 mt-1"><?php echo $totalQuantityOrder ?></h1>
      </div>
    </div>
  </div>
</div>