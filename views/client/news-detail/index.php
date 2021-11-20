<title><?php echo $news->title ?></title>

<!-- Breadcrumbs -->
<nav aria-label="breadcrumb" class="py-4">
  <ol class="breadcrumb container mb-0">
    <li class="breadcrumb-item">
      <a href="#" class="text-decoration-none">Trang chủ</a>
    </li>
    <li class="breadcrumb-item">
      <a href="category-product/<?php echo $category->id ?>" class="text-decoration-none">
        <?php echo $category->title ?>
      </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $news->title ?></li>
  </ol>
</nav>

<!-- News -->
<section class="container py-4 bg-white rounded">
  <h1><?php echo $news->title ?></h1>
  <div class="d-flex text-secondary">
    <div class="me-2">
      <i class="bi bi-person-fill"></i>
      <?php echo $news->author ?>
    </div>
    <div class="me-2">
      <i class="bi bi-award"></i>
      <?php echo $news->source ?>
    </div>
    <div class="me-2">
      <i class="bi bi-calendar-event"></i>
      <?php echo $news->created_at ?>
    </div>
  </div>
  <p>
    <?php echo $news->description ?>
  </p>
  <div class="mb-5">
    <img src="<?php echo $news->thumbnail ?>" class="img-fluid" alt="">
  </div>
  <p>
    <?php echo $news->content ?>
  </p>
</section>