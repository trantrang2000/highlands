<title>My cart - Highlands</title>

<!-- Breadcrumbs -->
<nav aria-label="breadcrumb" class="py-4">
  <ol class="breadcrumb container mb-0">
    <li class="breadcrumb-item">
      <a href="#" class="text-decoration-none">Trang chủ</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
  </ol>
</nav>

<!-- Cart -->
<section class="container py-4">
  <div class="row">
    <div class="col-sm-9">
      <h1 class="fw-bold fs-1">Giỏ hàng</h1>
      <?php if (count($_SESSION['cart']) > 0) { ?>
        <div class="text-end mb-2">
          <a href="cart/destroy" class="btn btn-danger">Xoá tất cả</a>
        </div>
        <div class="table-responsive border border-bottom-0">
          <table class="table align-middle mb-0">
            <thead>
              <tr>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng mua</th>
                <th scope="col">Thành tiền</th>
                <th scope="col"></th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($_SESSION['cart'] as $key => $cart) { ?>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="<?php echo $cart['thumbnail'] ?? 'public/images/static/noimage.jpg' ?>" width="60" height="60" class="shadow-sm" style="object-fit: cover;" alt="">
                      <a href="product/<?php echo $cart['id'] ?>" class="ms-2 text-decoration-none text-black fw-medium">
                        <?php echo $cart['title'] ?>
                      </a>
                    </div>
                  </td>
                  <td>
                    <span class="fw-medium fs-5"><?php echo number_format($cart['price']) ?>đ</span>
                    <small class="text-decoration-line-through text-secondary">
                      <?php echo number_format($cart['original_price']) ?>đ
                    </small>
                  </td>
                  <td><?php echo $cart['quantity'] ?></td>
                  <td><?php echo number_format($cart['total']) ?>đ</td>
                  <td>
                    <a href="cart/delete/<?php echo $cart['id'] ?>" class="text-decoration-none text-danger btn bg-transparent">
                      <i class="bi bi-trash-fill"></i>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      <?php } else { ?>
        <div class="text-center">
          <img src="https://salt.tikicdn.com/desktop/img/mascot@2x.png" alt="empty cart" class="img-fluid" width="100" />
          <div class="my-3">
            Không có sản phẩm trong giỏ hàng.
          </div>
          <a href="product" class="btn btn-primary text-white">Tiếp tục mua sắm</a>
        </div>
      <?php } ?>
    </div>
    <div class="col-sm-3">
      <div class="border p-3 mb-3">
        <div class="d-flex justify-content-between align-items-center mb-1">
          <div class="fw-medium">Tạm tính</div>
          <div class="text-muted"><?php echo isset($_SESSION['totalMoney']) ? number_format($_SESSION['totalMoney']) : 0 ?>đ</div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-1">
          <div class="fw-medium">Giảm giá</div>
          <div class="text-muted">0đ</div>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-1">
          <div class="fw-medium">Thành tiền</div>
          <div class="text-warning fw-bold fs-4"><?php echo isset($_SESSION['totalMoney']) ? number_format($_SESSION['totalMoney']) : 0 ?></div>
        </div>
        <hr />
        <div class="text-center">
          <a href="checkout" class="btn btn-dark text-uppercase px-4 py-2 w-100">Tiến hành đặt hàng</a>
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
    </div>
  </div>
</section>