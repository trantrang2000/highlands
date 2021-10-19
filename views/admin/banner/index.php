<title><?php echo $title ?></title>

<div class="text-white my-5">
  <h1 class="fs-2 text-uppercase"><?php echo $title ?></h1>
  <!-- Breadcrumbs -->
  <nav aria-label="breadcrumb" class="py-2">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item">
        <a href="#" class="text-decoration-none text-white-50">Dashboard</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        <?php echo $title ?>
      </li>
    </ol>
  </nav>
</div>

<!-- Search -->
<div class="card border-0 shadow-sm mb-4">
  <div class="card-header py-3 bg-white">
    <h5 class="card-title mb-0">Tìm kiếm</h5>
  </div>
  <div class="card-body">
    <form action="" method="POST">
      <div class="row">
        <div class="col-sm-4">
          <div class="mb-3">
            <input class="form-control" id="keyword" placeholder="Tiêu đề, link..." name="keyword" value="<?php echo isset($keyword) ? $keyword : '' ?>" />
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-secondary">Tìm kiếm</button>
    </form>
  </div>
</div>

<!-- Table -->
<div class="card border-0 shadow-sm">
  <div class="card-header py-3 bg-white d-flex align-items-center justify-content-end">
    <a href="admin/<?php echo $pathForm ?>/create" class="btn btn-info">
      <i class="bi bi-plus-circle me-2"></i>
      Thêm mới
    </a>
  </div>
  <?php if (count($banners) > 0) { ?>
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th style="width: 20%; min-width: 100px">Ảnh</th>
            <th style="width: 20%; min-width: 100px">Tiêu đề</th>
            <th style="width: 20%; min-width: 100px">Đường dẫn</th>
            <th style="width: 20%; min-width: 100px">Ngày tạo</th>
            <th style="width: 10%; min-width: 100px"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($banners as $item) { ?>
            <tr>
              <td>
                <img src="<?php echo $item->thumbnail ?? 'public/images/static/noimage.jpg' ?>" width="60" height="60" style="object-fit: cover;" alt="">
              </td>
              <td><?php echo $item->title ?></td>
              <td><?php echo $item->link ?></td>
              <td><?php echo $item->created_at ?></td>
              <td>
                <a href="admin/<?php echo $pathForm ?>/edit/<?php echo $item->id ?>" class="text-decoration-none text-info me-2">
                  <i class="bi bi-pencil-square"></i>
                </a>
                <button data-id="<?php echo $item->id ?>" data-bs-toggle="modal" data-bs-target="#deleteModal" class="delete-btn text-decoration-none text-danger btn bg-transparent">
                  <i class="bi bi-trash-fill"></i>
                </button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

      <div class="d-flex align-items-center justify-content-between px-2">
        <div class="text-secondary">Hiển thị <?php echo $start + 1 ?> đến <?php echo $end ?> trên tổng số <?php echo $totalRecord ?> bản ghi.</div>
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-end">
            <?php if ($page > 1 && $totalPage > 1) { ?>
              <li class="page-item">
                <a class="page-link text-info" href="admin/<?php echo $pathList ?>/<?php echo ($page - 1) ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
            <?php } ?>

            <?php for ($i = 0; $i < $totalPage; $i++) { ?>
              <li class="page-item">
                <a class="page-link text-info" href="admin/<?php echo $pathList ?>/<?php echo ($i + 1) ?>"><?php echo $i + 1 ?></a>
              </li>
            <?php } ?>

            <?php if ($page < $totalPage && $totalPage > 1) { ?>
              <li class="page-item">
                <a class="page-link text-info" href="admin/<?php echo $pathList ?>/<?php echo ($page + 1) ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            <?php } ?>
          </ul>
        </nav>
      </div>
    </div>
  <?php } else { ?>
    <div class="p-3 text-center">Không có bản ghi.</div>
  <?php } ?>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Xác nhận xoá</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn có chắc chắn xoá bản ghi này?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <a id="deleteConfirmBtn" data-link="<?php echo $pathForm ?>" href="#" type="button" class="btn btn-info">Xác nhận</a>
      </div>
    </div>
  </div>
</div>