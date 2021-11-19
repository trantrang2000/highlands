<title><?php echo $category->title ?></title>
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
  <?php if (count($news) > 0) { ?>
    <div class="row">
      <?php foreach ($news as $item) { ?>
        <div class="col-6 col-sm-4">
          <div class="shadow rounded overflow-hidden x-news">
            <div class="x-news-image">
              <img class="img-fluid" src="<?php echo $item->thumbnail ?? 'public/images/static/noimage.jpg' ?>" alt="" />
            </div>
            <div class="p-3">
              <a href="news/<?php echo $item->id ?>">
                <h5 class="text-truncate">
                  <?php echo $item->title ?>
                </h5>
              </a>
              <div class="d-flex text-secondary">
                <div class="me-2">
                  <i class="bi bi-person-fill"></i>
                  <?php echo $item->author ?>
                </div>
                <div class="me-2">
                  <i class="bi bi-award"></i>
                  <?php echo $item->source ?>
                </div>
              </div>
              <p class="mb-0 text-truncate"><?php echo $item->description ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <nav class="bg-light py-2 px-3 mt-5">
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
    <div class="text-center">Không có bài đăng phù hợp.</div>
  <?php } ?>
</section>