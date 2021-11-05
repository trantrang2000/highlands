<!DOCTYPE html>
<html lang="en">

<head>
  <?php global $APP_URL; ?>
  <base href="<?php echo $APP_URL ?>/">
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="public/js/main.js"></script>
  <script src="public/js/client.js" defer></script>
</head>
<?php
include_once "app/models/CategoryModel.php";
$categoryModel = new CategoryModel();

$categoriesProduct = $categoryModel->getListCategory("where type = 1");
$categoriesNews = $categoryModel->getListCategory("where type = 2");
?>

<body class="d-flex flex-column min-vh-100 layout-client">
  <!-- Top header -->
  <section class="bg-white py-2 border-bottom d-none d-lg-block">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="text-primary">
        Giao hàng miễn phí dưới 5 km
      </div>
      <?php if (!isset($_SESSION['user'])) { ?>
        <div>
          <a class="text-secondary" href="sign-in">Đăng nhập</a>
          <a class="text-secondary ms-4" href="sign-up">Đăng ký</a>
        </div>
      <?php } else { ?>
        <div class="dropdown">
          <button class="btn btn-btn-outline-light btn-lg rounded-circle dropdown-toggle p-0" type="button" id="user-action" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i>
          </button>
          <ul class="dropdown-menu border-0 shadow-sm" aria-labelledby="user-action" style="z-index: 1200">
            <?php if ($_SESSION['user']->role == 2) { ?>
              <li><a class="dropdown-item" href="admin">Admin</a></li>
            <?php } ?>
            <li><a class="dropdown-item" href="my/orders" ?>Đơn hàng đã đặt</a></li>
            <li>
              <hr class="dropdown-divider bg-secondary" />
            </li>
            <li><a class="dropdown-item" href="admin/logout" ?>Đăng xuất</a></li>
          </ul>
        </div>
      <?php } ?>
    </div>
  </section>

  <!-- Nav -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow sticky-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo $APP_URL ?>">
        <img src="public/images/static/logo.jpg" width="100" alt="logo" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav fw-medium w-100 align-items-lg-center">
          <li class="nav-item d-block d-lg-none">
            <?php if (!isset($_SESSION['user'])) { ?>
              <div>
                <a class="btn bg-transparent" href="sign-in">Đăng nhập</a>
                <a class="btn bg-transparent" href="sign-up">Đăng ký</a>
              </div>
            <?php } else { ?>
              <div class="dropdown">
                <button class="btn btn-btn-outline-light btn-lg rounded-circle dropdown-toggle px-0" type="button" id="user-action" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-circle"></i>
                </button>
                <ul class="dropdown-menu border-0 shadow-sm" aria-labelledby="user-action">
                  <?php if ($_SESSION['user']->role == 2) { ?>
                    <li><a class="dropdown-item" href="admin">Admin</a></li>
                  <?php } ?>
                  <li><a class="dropdown-item" href="my/orders" ?>Đơn hàng đã đặt</a></li>
                  <li>
                    <hr class="dropdown-divider bg-secondary" />
                  </li>
                  <li><a class="dropdown-item" href="admin/logout" ?>Logout</a></li>
                </ul>
              </div>
            <?php } ?>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase" aria-current="page" href="<?php echo $APP_URL ?>/">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase px-lg-4" href="<?php echo $APP_URL ?>/about">Giới thiệu</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdownMenuLinkProduct" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Sản phẩm
            </a>
            <ul class="dropdown-menu border-0 shadow-sm rounded-0" aria-labelledby="navbarDropdownMenuLinkProduct">
              <?php foreach ($categoriesProduct as $item) { ?>
                <li>
                  <a class="dropdown-item text-capitalize" href="<?php echo $APP_URL ?>/category-product/<?php echo $item->id ?>">
                    <?php echo $item->title ?>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdownMenuLinkNews" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Tin tức
            </a>
            <ul class="dropdown-menu border-0 shadow-sm rounded-0" aria-labelledby="navbarDropdownMenuLinkNews">
              <?php foreach ($categoriesNews as $item) { ?>
                <li>
                  <a class="dropdown-item text-capitalize" href="<?php echo $APP_URL ?>/category-news/<?php echo $item->id ?>">
                    <?php echo $item->title ?>
                  </a>
                </li>
              <?php } ?>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link text-uppercase px-lg-4" href="#">Liên hệ</a>
          </li>
          <li class="nav-item ms-auto d-flex">
            <div class="position-relative">
              <button class="btn bg-transparent fs-4 mx-3" id="toggle-form-search"><i class="bi bi-search"></i></button>
              <form action="search" method="POST" id="form-search" class="d-none shadow-sm">
                <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" name="keyword" />
              </form>
            </div>
            <a href="cart" class="btn btn-primary fs-4 text-white">
              <i class="bi bi-basket3"></i>
              <span><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <main class="flex-grow-1 mb-4">
    <?php
    echo $this->content;
    ?>
  </main>

  <!-- Footer -->
  <footer>
    <div class="bg-primary py-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-sm-8 d-flex align-items-center mb-3 mb-lg-0">
            <h2 class="fs-2 text-white mb-0 me-5">Đăng ký nhận bản tin</h2>
            <form action="" class="w-100">
              <input type="text" class="form-control rounded-pill w-100" placeholder="Địa chỉ email của bạn">
            </form>
          </div>
          <div class="col-12 col-sm-4 text-center text-lg-end">
            <a href="#" class="text-white fs-3 me-3"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-white fs-3 me-3"><i class="bi bi-youtube"></i></a>
            <a href="#" class="text-white fs-3 me-3"><i class="bi bi-twitter"></i></a>
            <a href="#" class="text-white fs-3"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row pb-3 pt-4">
        <div class="col-sm-6 col-lg-3">
          <div class="py-3">
            <h5 class="text-uppercase mb-4 ff-kausan fw-bold">Highland</h5>
            <p class="fst-italic text-secondary">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab
              expedita amet quo quidem maiores nobis, officiis voluptate cum,
              rem at vel rerum earum autem accusamus ipsam nam aspernatur
              molestias quasi?
            </p>
            <div class="mb-1">46 An Dương, Yên Phụ, Tây Hồ, Hà Nội
            </div>
            <div class="mb-1">demo@demo.com</div>
            <div class="mb-1">0123. 456. 789</div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="py-3">
            <h5 class="text-uppercase mb-4 fw-bold">Hỗ trợ khách hàng</h5>
            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="#" class="text-black text-decoration-none">Hướng dẫn mua hàng</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-black text-decoration-none">Chính sách vận chuyển</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-black text-decoration-none">Hướng dẫn thanh toán</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-black text-decoration-none">Chính sách bảo mật</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="py-3">
            <h5 class="text-uppercase mb-4 fw-bold">Thông tin</h5>
            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="#" class="text-black text-decoration-none">Tin khuyến mãi</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-black text-decoration-none">Về chúng tôi</a>
              </li>
              <li class="mb-2">
                <a href="#" class="text-black text-decoration-none">Liên hệ</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="py-3">
            <h5 class="text-uppercase mb-4 fw-bold">Hỗ trợ</h5>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center py-2 bg-light">&copy; Copyright Highland</div>
  </footer>
</body>

</html>