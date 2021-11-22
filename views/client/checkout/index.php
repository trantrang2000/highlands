<title>Xác nhận đơn hàng</title>

<!-- Breadcrumbs -->
<nav aria-label="breadcrumb" class="py-4">
  <ol class="breadcrumb container mb-0">
    <li class="breadcrumb-item">
      <a href="#" class="text-decoration-none">Trang chủ</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
  </ol>
</nav>

<!-- Checkout -->
<section class="container py-4">
  <form class="accordion accordion-flush" id="accordionCheckout" method="POST">
    <div class="row">
      <div class="col-sm-9">
        <div class="border mb-3">

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed text-uppercase fs-5 fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePersonal" aria-expanded="false" aria-controls="collapsePersonal">
                1. Thông tin người nhận hàng
              </button>
            </h2>
            <div id="collapsePersonal" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionCheckout">
              <div class="accordion-body">
                <?php if (!isset($_SESSION['user'])) { ?>
                  <p class="text-muted">Nếu bạn muốn lưu trữ thông tin đơn hàng, vui lòng <a href="sign-in">đăng nhập</a>.</p>
                  <div class="mb-3 row">
                    <label for="firstName" class="col-sm-2 col-form-label">Họ <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <input class="form-control" id="firstName" placeholder="example" name="firstName">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="lastName" class="col-sm-2 col-form-label">Tên <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <input class="form-control" id="lastName" placeholder="example" name="lastName">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="phoneNumber" class="col-sm-2 col-form-label">Số điện thoại <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <input class="form-control" id="phoneNumber" placeholder="097xxxxxxx" name="phoneNumber">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <input class="form-control" id="email" placeholder="email@example.com" name="email">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="address" class="col-sm-2 col-form-label">Địa chỉ <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                      <textarea placeholder="Your address here..." class="form-control" id="address" name="address"></textarea>
                    </div>
                  </div>
                <?php } else { ?>
                  <div>
                    <div class="mb-2 row">
                      <div class="col-sm-2">Họ: </div>
                      <div class="col-sm-10 fw-medium"><?php echo $_SESSION['user']->first_name ?></div>
                    </div>
                    <div class="mb-2 row">
                      <div class="col-sm-2">Tên: </div>
                      <div class="col-sm-10 fw-medium"><?php echo $_SESSION['user']->last_name ?></div>
                    </div>
                    <div class="mb-2 row">
                      <div class="col-sm-2">Số điện thoại: </div>
                      <div class="col-sm-10 fw-medium"><?php echo $_SESSION['user']->phone ?></div>
                    </div>
                    <div class="mb-2 row">
                      <div class="col-sm-2">Email: </div>
                      <div class="col-sm-10 fw-medium"><?php echo $_SESSION['user']->email ?></div>
                    </div>
                    <div class="mb-2 row">
                      <div class="col-sm-2">Địa chỉ: </div>
                      <div class="col-sm-10 fw-medium"><?php echo $_SESSION['user']->address ?></div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed fw-medium text-uppercase fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseShippingMethod" aria-expanded="false" aria-controls="collapseShippingMethod">
                2. Phương thức vận chuyển
              </button>
            </h2>
            <div id="collapseShippingMethod" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionCheckout">
              <div class="accordion-body">
                <?php foreach ($shippingMethods as $item) { ?>
                  <div class="mb-2 bg-light p-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="shippingMethod" id="shippingMethod-<?php echo $item->id ?>" <?php if ($item->id == 1) { ?> checked <?php } ?> value="<?php echo $item->id ?>">
                      <label class="form-check-label row" for="shippingMethod-<?php echo $item->id ?>">
                        <span class="col-6"><?php echo $item->title ?></span>
                        <span class="col-6"><?php echo number_format($item->price) ?>đ</span>
                      </label>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed fw-medium text-uppercase fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePayment" aria-expanded="false" aria-controls="collapsePayment">
                3. Phương thức thanh toán
              </button>
            </h2>
            <div id="collapsePayment" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionCheckout">
              <div class="accordion-body">
                <?php foreach ($paymentMethods as $item) { ?>
                  <div class="mb-2 bg-light p-2">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="paymentMethod" id="payment-<?php echo $item->id ?>" <?php if ($item->id == 1) { ?> checked <?php } ?> value="<?php echo $item->id ?>">
                      <label class="form-check-label" for="payment-<?php echo $item->id ?>">
                        <?php echo $item->title ?>
                      </label>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="border p-3 mb-3">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <div class="fw-medium">Tạm tính</div>
            <div class="text-muted"><?php echo isset($_SESSION['totalMoney']) ? number_format($_SESSION['totalMoney']) : 0 ?>đ</div>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="fw-medium">Phí giao hàng</div>
            <div class="text-muted">30.000đ</div>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-1">
            <div class="fw-medium">Giảm giá</div>
            <div class="text-muted">0đ</div>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-1">
            <div class="fw-medium">Thành tiền</div>
            <div class="text-warning fw-bold fs-4"><?php echo isset($_SESSION['totalMoney']) ? number_format($_SESSION['totalMoney']) : 0 ?>đ</div>
          </div>
        </div>
        <div class="border">
          <div class="p-3 border-bottom">
            <i class="bi bi-award me-2"></i>
            <span>Chính sách bảo mật</span>
          </div>
          <div class="p-3 border-bottom">
            <i class="bi bi-piggy-bank-fill me-2"></i>
            <span>Chính sách giao hàng</span>
          </div>
          <div class="p-3">
            <i class="bi bi-arrow-return-left me-2"></i>
            <span>Chính sách hoàn trả</span>
          </div>
        </div>
        <div class="text-center mt-3">
          <button type="submit" class="btn btn-dark text-uppercase w-100">Xác nhận đơn hàng</button>
        </div>
      </div>
    </div>
  </form>
</section>