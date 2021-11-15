<title><?php echo $title ?></title>

<div class="text-white my-5">
  <h1 class="fs-2 text-uppercase"><?php echo $title ?></h1>
  <!-- Breadcrumbs -->
  <nav aria-label="breadcrumb" class="py-2">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item">
        <a href="#" class="text-decoration-none text-white-50">Dashboard</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        <?php echo $title ?>
      </li>
    </ol>
  </nav>
</div>

<!-- Search -->
<div class="card border-0 shadow-sm mb-4">
  <div class="card-header py-3 bg-white">
    <h5 class="card-title mb-0">Tìm kiếm</h5>
  </div>
  <div class="card-body">
    <form action="" method="POST">
      <div class="row">
        <div class="col-sm-4">
          <div class="mb-3">
            <label for="orderId" class="form-label">Mã đơn hàng</label>
            <input class="form-control" id="orderId" placeholder="example" name="orderId" value="<?php echo isset($orderId) ? $orderId : '' ?>" />
          </div>
          <div class="mb-3">
            <label for="userId" class="form-label">Mã khách hàng</label>
            <input class="form-control" id="userId" placeholder="example" name="userId" value="<?php echo isset($userId) ? $userId : '' ?>" />
          </div>
        </div>
      </div>
      <button class="btn btn-secondary">Tìm kiếm</button>
    </form>
  </div>
</div>

<!-- Table -->
<div class="card border-0 shadow-sm">
  <?php if (count($orders) > 0) { ?>
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th style="width: 15%; min-width: 80px">Mã đơn hàng</th>
            <th style="width: 15%; min-width: 80px">Mã khách hàng</th>
            <th style="width: 15%; min-width: 80px">Tổng tiền</th>
            <th style="width: 15%; min-width: 80px">Tổng số lượng</th>
            <th style="width: 15%; min-width: 80px">Trạng thái</th>
            <th style="width: 15%; min-width: 80px">Ngày tạo đơn</th>
            <th style="width: 10%; min-width: 50px"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($orders as $item) { ?>
            <?php
            $status = null;
            switch ($item->status) {
              case 4:
                $status = "Đã huỷ đơn";
                break;
              case 2:
                $status = "Đang giao hàng";
                break;
              case 3:
                $status = "Đã giao hàng";
                break;

              default:
                $status = "Đang xử lý";
                break;
            }
            ?>
            <tr>
              <td><?php echo $item->id ?></td>
              <td><?php echo $item->user_id ?></td>
              <td><?php echo number_format($item->total_money) ?>đ</td>
              <td><?php echo $item->total_quantity ?></td>
              <td><?php echo $status ?></td>
              <td><?php echo $item->created_at ?></td>
              <td>
                <a href="admin/<?php echo $pathForm ?>/view/<?php echo $item->id ?>" class="text-decoration-none text-info me-2">
                  <i class="bi bi-eye-fill"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

      <div class="d-flex align-items-center justify-content-between px-2">
        <div class="text-secondary">Hiển thị <?php echo $start + 1 ?> đến <?php echo $end ?> trên tổng số <?php echo $totalRecord ?> bản ghi.</div>
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-end">
            <?php if ($page > 1 && $totalPage > 1) { ?>
              <li class="page-item">
                <a class="page-link text-info" href="admin/<?php echo $pathList ?>/<?php echo ($page - 1) ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
            <?php } ?>

            <?php for ($i = 0; $i < $totalPage; $i++) { ?>
              <li class="page-item">
                <a class="page-link text-info" href="admin/<?php echo $pathList ?>/<?php echo ($i + 1) ?>"><?php echo $i + 1 ?></a>
              </li>
            <?php } ?>

            <?php if ($page < $totalPage && $totalPage > 1) { ?>
              <li class="page-item">
                <a class="page-link text-info" href="admin/<?php echo $pathList ?>/<?php echo ($page + 1) ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            <?php } ?>
          </ul>
        </nav>
      </div>
    </div>
  <?php } else { ?>
    <div class="p-3 text-center">Không có bản ghi.</div>
  <?php } ?>
</div>