<title><?php echo $category->title ?></title>
<script src="public/js/category-product.js" defer></script>
<?php global $APP_URL; ?>

<!-- Breadcrumbs -->
<nav aria-label="breadcrumb" class="py-4">
  <ol class="breadcrumb container mb-0">
    <li class="breadcrumb-item">
      <a href="#" class="text-decoration-none">Trang chủ</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
      <?php echo $category->title ?>
    </li>
  </ol>
</nav>

<section class="container py-4 bg-white rounded">
  <div class="row">
    <div class="col-lg-3">
      <div class="mb-4">
        <p class="mb-1 fw-bold">Giá</p>
        <div class="form-check text-secondary">
          <input class="form-check-input" type="checkbox" value="" id="filderPrice1" />
          <label class="form-check-label" for="filderPrice1">
            < 200.000đ</label>
        </div>
        <div class="form-check text-secondary">
          <input class="form-check-input" type="checkbox" value="" id="filderPrice2" />
          <label class="form-check-label" for="filderPrice2">
            200.000đ - 500.000đ</label>
        </div>
      </div>

      <div class="mb-4">
        <p class="mb-1 fw-bold">Thương hiệu</p>
        <div class="form-check text-secondary">
          <input class="form-check-input" type="checkbox" value="" id="filterBrand1" />
          <label class="form-check-label" for="filterBrand1">
            Studio Design
          </label>
        </div>
        <div class="form-check text-secondary">
          <input class="form-check-input" type="checkbox" value="" id="filterBrand2" checked />
          <label class="form-check-label" for="filterBrand2">
            Graphic Corner
          </label>
        </div>
      </div>

      <div class="mb-4">
        <p class="mb-1 fw-bold">Kích thước</p>
        <div class="form-check text-secondary">
          <input class="form-check-input" type="checkbox" value="" id="filterDemension1" />
          <label class="form-check-label" for="filterDemension1">
            40x60cm
          </label>
        </div>
        <div class="form-check text-secondary">
          <input class="form-check-input" type="checkbox" value="" id="filterDemension2" checked />
          <label class="form-check-label" for="filterDemension2">
            60x90cm
          </label>
        </div>
      </div>

      <div class="mb-4">
        <label for="customRangePrice" class="form-label fw-bold">Khoảng giá</label>
        <input type="range" class="form-range" min="0" step="1" id="customRangePrice">
      </div>
    </div>
    <div class="col-lg-9">
      <div class="bg-light py-2 px-3 row g-0 align-items-center mb-3">
        <div class="fs-4 col-sm-6">
          <i class="bi bi-grid-3x2-gap-fill pointer me-2 text-primary"></i>
          <i class="bi bi-list-ul pointer"></i>
        </div>
        <div class="col-sm-6">
          <form method="POST" action="" class="row g-0 align-items-center justify-content-end">
            <div class="col-9 d-flex">
              <select class="form-select" id="sortSelect" name="sortBy">
                <option value="id desc" <?php if ($sortBy == "id desc") { ?> selected <?php } ?>>Ngày tạo gần nhất</option>
                <option value="title asc" <?php if ($sortBy == "title desc") { ?> selected <?php } ?>>Tên, A -> Z</option>
                <option value="title desc" <?php if ($sortBy == "title asc") { ?> selected <?php } ?>>Tên, Z -> A</option>
                <option value="price asc" <?php if ($sortBy == "price asc") { ?> selected <?php } ?>>Giá thấp nhất</option>
                <option value="price desc" <?php if ($sortBy == "price desc") { ?> selected <?php } ?>>Giá cao nhất</option>
              </select>
              <button class="btn btn-primary" style="white-space: nowrap">Sắp xếp</button>
            </div>
          </form>
        </div>
      </div>
      <?php if (count($products) > 0) { ?>
        <div class="row mb-4">
          <?php foreach ($products as $item) { ?>
            <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
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

        <nav class="bg-light py-2 px-3">
          <ul class="pagination justify-content-end mb-0">
            <?php if ($page > 1 && $totalPage > 1) { ?>
              <li class="page-item">
                <a class="page-link text-info" href="category-product/<?php echo $category->id ?>/<?php echo ($page - 1) ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
            <?php } ?>
            <?php for ($i = 0; $i < $totalPage; $i++) { ?>
              <li class="page-item">
                <a class="page-link text-info" href="category-product/<?php echo $category->id ?>/<?php echo ($i + 1) ?>"><?php echo $i + 1 ?></a>
              </li>
            <?php } ?>
            <?php if ($page < $totalPage && $totalPage > 1) { ?>
              <li class="page-item">
                <a class="page-link text-info" href="category-product/<?php echo $category->id ?>/<?php echo ($page + 1) ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            <?php } ?>
          </ul>
        </nav>
      <?php } else { ?>
        <div class="text-center">Không có sản phẩm phù hợp.</div>
      <?php } ?>
    </div>
  </div>
</section>