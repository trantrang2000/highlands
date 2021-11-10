<title>Trang chủ</title>
<script src="public/js/home.js" defer></script>

<!-- Banner -->
<section class="swiper" id="banner">
  <div class="swiper-wrapper">
    <?php foreach ($banners as $item) { ?>
      <a class="swiper-slide d-block position-relative" href="<?php echo isset($item->link) ? $item->link : "#" ?>" target="<?php echo $item->is_external === 1 ? "_blank" : "_self" ?>">
        <img src="<?php echo $item->thumbnail ?>" class="img-fluid" alt="<?php echo $item->title ?>" />
        <div class="text-white fs-1 fw-bold position-absolute top-50 start-50 translate-middle ff-kausan">
          <?php echo $item->title ?>
        </div>
      </a>
    <?php } ?>
  </div>
</section>

<!-- Main categories -->
<section class="my-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="text-center fs-1">Bộ sưu tập</h2>
      <p class="text-secondary">Lorem Ipsum is simply dummy text of the printing and typesettin</p>
    </div>
    <div class="row">
      <?php foreach ($collections as $collection) { ?>
        <a href="#" class="col-sm-6 mb-3">
          <div class="main-category-2 position-relative overflow-hidden">
            <img src="<?php echo $collection->thumbnail ?? 'public/images/static/noimage.jpg' ?>" class="img-fluid w-100 shadow" alt="..." />
            <div class="position-absolute top-50 start-50 translate-middle w-75 h-75 border border-white d-flex justify-content-center align-items-center flex-column">
              <h3 class="fs-1 text-white fw-bold mb-3"><?php echo $collection->title ?></h3>
              <button class="btn btn-dark">
                <i class="bi bi-hand-thumbs-up pe-2"></i>Xem thêm
              </button>
            </div>
          </div>
        </a>
      <?php } ?>
    </div>
  </div>
</section>

<!-- About us -->
<section class="mb-5">
  <div class="bg-about-us bg-cover d-none d-lg-block" style="background-image: url(public/images/static/bg-about-us.jpg);">
  </div>
  <div class="container translate-middle-y content-about-us">
    <div class="text-center">
      <h2 class="fs-1">Về chúng tôi</h2>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
    </div>
    <div class="shadow bg-white">
      <div class="row g-0">
        <div class="col-sm-6">
          <img src="public/images/static/homepage1_03.jpg" class="img-fluid w-100" alt="">
        </div>
        <div class="col-sm-6">
          <div class="p-5">
            <h4 class="text-uppercase mb-3">Cảm nhận về chúng tôi</h4>
            <p class="text-secondary mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
            </p>
            <button class="btn btn-outline-dark fw-normal btn-lg text-uppercase fs-6 px-4">Xem thêm</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Hot products -->
<section class="mb-5" id="hot-deals">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="text-center fs-1">Sản phẩm nổi bật</h2>
      <p class="text-secondary">Lorem Ipsum is simply dummy text of the printing and typesettin</p>
    </div>
    <div class="row">
      <?php if (count($hotProducts) > 0) { ?>
        <?php $firstHotProduct = $hotProducts[0] ?>
        <div class="col-sm-6">
          <div class="x-product">
            <div class="x-product-image">
              <img src="<?php echo $firstHotProduct->thumbnail ?? 'public/images/static/noimage.jpg' ?>" alt="" />
              <div class="x-product-include">
                <?php echo $firstHotProduct->include ?>
              </div>
            </div>
            <a href="product/<?php echo $firstHotProduct->id ?>">
              <h5 class="x-product-title text-truncate">
                <?php echo $firstHotProduct->title ?>
              </h5>
            </a>
            <div class="text-end">
              <?php if (isset($firstHotProduct->original_price)) { ?>
                <span class="x-product-original-price">
                  <?php echo number_format($firstHotProduct->original_price) ?>đ
                </span>
              <?php } ?>
              <?php if (isset($firstHotProduct->price)) { ?>
                <span class="x-product-price"><?php echo number_format($firstHotProduct->price) ?>đ</span>
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
            <div class="x-product-status">
              <div class="text-danger">Nổi bật!</div>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="col-sm-6">
        <div class="row">
          <?php for ($i = 1; $i < count($hotProducts) - 1; $i++) { ?>
            <?php $item = $hotProducts[$i] ?>
            <div class="col-sm-6">
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
                <div class="x-product-status">
                  <div class="text-danger">Nổi bật!</div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us -->
<section class="mb-5 bg-cover pt-5" style="background-image: url(public/images/static/bg-image2.jpg);">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-12 col-sm-8">
        <div class="bg-white p-4 mb-5">
          <h2 class="fs-1 mb-4">Tại sao chọn chúng tôi</h2>
          <p class="text-secondary">This is Photoshop’s version of Lorem Ipsum. Proin gravida nibh vel velit auctorer aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequa ipsum nec sagittis sem nibh id elit.
          </p>
          <ul class="list-group list-group-flush mb-4">
            <li class="list-group-item ps-0">100% hữu cơ!</li>
            <li class="list-group-item ps-0">Giao hàng miễn phí nhanh chóng</li>
            <li class="list-group-item ps-0">Địa điểm mua sắm tốt nhất</li>
            <li class="list-group-item ps-0">Hơn 15 năm kinh nghiệm sản xuất và kinh doanh</li>
          </ul>
          <button class="btn btn-outline-dark fw-normal btn-lg text-uppercase fs-6 px-4">Xem thêm</button>
        </div>
      </div>
      <div class="col-4 d-none d-lg-block">
        <img src="public/images/static/homepage1_03.png" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</section>

<!-- Sales products -->
<section class="mb-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="text-center fs-1">Sản phẩm khuyến mãi</h2>
      <p class="text-secondary">Lorem Ipsum is simply dummy text of the printing and typesettin</p>
    </div>
    <div class="swiper sale-products">
      <div class="swiper-wrapper">
        <?php foreach ($salesProducts as $item) { ?>
          <div class="swiper-slide h-100">
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
              <div class="x-product-status">
                <div class="text-danger">Khuyến mãi!</div>
                <div class="text-success">Mới</div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>