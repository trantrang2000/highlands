<title>Đơn hàng đã đặt</title>

<!-- Breadcrumbs -->
<nav aria-label="breadcrumb" class="py-4">
  <ol class="breadcrumb container mb-0">
    <li class="breadcrumb-item">
      <a href="#" class="text-decoration-none">Trang chủ</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Đơn hàng đã đặt</li>
  </ol>
</nav>

<section class="py-4">
  <div class="container">
    <h4>Đơn hàng đã đặt</h4>
    <div class="card border-0 shadow-sm rounded-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead>
            <tr>
              <th style="width: 15%; min-width: 80px">Mã đơn hàng</th>
              <th style="width: 15%; min-width: 80px">Tổng tiền</th>
              <th style="width: 15%; min-width: 80px">Tổng số lượng</th>
              <th style="width: 15%; min-width: 80px">Trạng thái</th>
              <th style="width: 15%; min-width: 80px">Ngày tạo đơn</th>
              <th style="width: 10%; min-width: 50px"></th>
            </tr>
          </thead>

          <tbody>
            <?php if (count($orders) > 0) { ?>
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
                  <td><?php echo number_format($item->total_money) ?>đ</td>
                  <td><?php echo $item->total_quantity ?></td>
                  <td><?php echo $status ?></td>
                  <td><?php echo $item->created_at ?></td>
                  <td>
                    <?php if ($item->status == 1) { ?>
                      <form action="my/order/cancel_order/<?php echo $item->id ?>">
                        <input type="hidden" value="4" name="status">
                        <button class="btn btn-danger btn-sm" type="submit">Huỷ đơn</button>
                      </form>
                    <?php } ?>
                  </td>
                </tr>
              <?php } ?>
            <?php } else { ?>
              <tr class="text-center">
                <td colspan="6">Không có đơn hàng nào đã đặt.</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>