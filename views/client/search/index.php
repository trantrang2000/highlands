<title>Tìm kiếm</title>

<!-- Breadcrumbs -->
<nav aria-label="breadcrumb" class="py-4">
  <ol class="breadcrumb container mb-0">
    <li class="breadcrumb-item">
      <a href="#" class="text-decoration-none">Trang chủ</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
  </ol>
</nav>

<section class="container py-4 bg-white rounded">
  <h3>Từ khoá: <?php echo $keyword ?></h3>
  <h4><?php if (count($products) > 0) { ?>Có <?php echo count($products) ?> sản phẩm<?php } else { ?>Không có sản phẩm nào phù hợp<?php } ?></h4>

  <div class="row my-4">
    <?php foreach ($products as $item) { ?>
      <div class="col-sm-12 col-md-6 col-lg-3 mb-3">
        <div class="x-product">
          <div class="x-product-image">
            <img src="<?php echo $item->thumbnail ?? 'public/images/static/noimage.jpg' ?>" alt="" />
            <div class="x-product-include">
              <?php echo $item->include ?>
            </div>
          </div>
          <a href="product/<?php echo $item->id ?>">
            <h5 class="x-product-title text-truncate">
              <?php echo $item->title ?>
            </h5>
          </a>
          <div class="text-end">
            <?php if (isset($item->original_price)) { ?>
              <span class="x-product-original-price">
                <?php echo number_format($item->original_price) ?>đ
              </span>
            <?php } ?>
            <?php if (isset($item->price)) { ?>
              <span class="x-product-price"><?php echo number_format($item->price) ?>đ</span>
            <?php } else { ?>
              <span class="text-primary">Liên hệ</span>
            <?php } ?>
          </div>
          <form action="cart/add" method="POST">
            <input type="text" hidden value="<?php echo $item->id ?>" name="id">
            <input type="text" hidden value="1" name="quantity">
            <div class="x-product-add">
              <button type="submit" class="btn btn-light">Thêm vào giỏ hàng</button>
            </div>
          </form>
        </div>
      </div>
    <?php } ?>
  </div>
</section>