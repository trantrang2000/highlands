<title><?php echo $title ?></title>

<form action="<?php echo $formAction ?>" id="form" method="POST" enctype="multipart/form-data">
  <div class="shadow-sm py-2 bg-white sticky-top mb-4">
    <div class="layout-edit d-flex justify-content-between">
      <a href="admin/<?php echo $pathList ?>/1" class="btn bg-transparent">
        <i class="bi bi-arrow-left pe-1"></i> Quay lại
      </a>
      <button class="btn bg-info text-white" type="submit">Lưu thay đổi</button>
    </div>
  </div>

  <?php
  $status = null;
  switch ($order->status) {
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

  <div class="layout-edit">
    <div class="card border-0 shadow-sm mb-4">
      <div class="card-body">
        <h4>Thông tin đơn hàng</h4>
        <hr />
        <div class="form-custom">
          <label for="status" class="form-label">Cập nhật trạng thái</label>
          <select class="form-select" id="status" name="status" <?php if ($order->status == 3 || $order->status == 4) { ?> disabled <?php } ?>>
            <option value="1" <?php if ($order->status == 1) { ?> selected <?php } ?>>Đang xử lý</option>
            <option value="2" <?php if ($order->status == 2) { ?> selected <?php } ?>>Đang giao hàng</option>
            <option value="3" <?php if ($order->status == 3) { ?> selected <?php } ?>>Đã giao hàng</option>
            <option value="4" <?php if ($order->status == 4) { ?> selected <?php } ?>>Huỷ đơn hàng</option>
          </select>
        </div>
        <div class="row">
          <div class="col-3">Mã đơn hàng</div>
          <div class="col-9"><?php echo $order->id ?></div>
        </div>
        <div class="row">
          <div class="col-3">Ngày đặt hàng</div>
          <div class="col-9"><?php echo $order->created_at ?></div>
        </div>
        <div class="row">
          <div class="col-3">Tổng tiền</div>
          <div class="col-9"><?php echo number_format($order->total_money) ?>đ</div>
        </div>
        <div class="row">
          <div class="col-3">Phương thức thanh toán</div>
          <div class="col-9"><?php echo $paymentMethod->title ?></div>
        </div>
        <div class="row">
          <div class="col-3">Phương thức vận chuyển</div>
          <div class="col-9"><?php echo $shippingMethod->title ?> - <?php echo number_format($shippingMethod->price) ?>đ</div>
        </div>
        <div class="row">
          <div class="col-3">Trạng thái</div>
          <div class="col-9"><?php echo $status ?></div>
        </div>
      </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
      <div class="card-body">
        <h4>Thông tin khách hàng</h4>
        <hr />
        <div class="row">
          <div class="col-3">Họ</div>
          <div class="col-9"><?php echo $user->first_name ?></div>
        </div>
        <div class="row">
          <div class="col-3">Tên</div>
          <div class="col-9"><?php echo $user->last_name ?></div>
        </div>
        <div class="row">
          <div class="col-3">Email</div>
          <div class="col-9"><?php echo $user->email ?></div>
        </div>
        <div class="row">
          <div class="col-3">Số điện thoại</div>
          <div class="col-9"><?php echo $user->phone ?></div>
        </div>
        <div class="row">
          <div class="col-3">Địa chỉ</div>
          <div class="col-9"><?php echo $user->address ?></div>
        </div>
      </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
      <div class="card-body">
        <h4>Thông tin chi tiết đơn hàng</h4>
        <hr />
        <div class="table-responsive border border-bottom-0">
          <table class="table align-middle mb-0">
            <thead>
              <tr>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng mua</th>
                <th scope="col">Thành tiền</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($orderDetails as $item) { ?>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="<?php echo $item->thumbnail ?? 'public/images/static/noimage.jpg' ?>" width="60" height="60" class="shadow-sm" style="object-fit: cover;" alt="">
                      <div class="ms-2 text-decoration-none text-black fw-medium">
                        <?php echo $item->title ?>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="fw-medium fs-5"><?php echo number_format($item->order_detail_price) ?>đ</span>
                  </td>
                  <td><?php echo $item->order_detail_quantity ?></td>
                  <td>
                    <span class="fw-medium fs-5">
                      <?php echo number_format($item->order_detail_quantity * $item->order_detail_price) ?>đ
                    </span>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</form>