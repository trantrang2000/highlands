<title><?php echo $title ?> | Fresh garden</title>
<script src="public/js/admin-category-product.js" defer></script>

<form action="<?php echo $formAction ?>" id="form" method="POST" enctype="multipart/form-data">
  <div class="shadow-sm py-2 bg-white sticky-top mb-4">
    <div class="layout-edit d-flex justify-content-between">
      <a href="admin/<?php echo $pathList ?>/1" class="btn bg-transparent">
        <i class="bi bi-arrow-left pe-1"></i> Quay lại
      </a>
      <button class="btn bg-info text-white" type="submit">Lưu thay đổi</button>
    </div>
  </div>

  <div class="layout-edit">
    <div class="card border-0 shadow-sm mb-4">
      <div class="card-body">
        <div class="form-custom">
          <label for="title" class="form-label">Tiêu đề</label>
          <input class="form-control" id="title" name="title" placeholder="example" value="<?php echo $detail->title ?? '' ?>" />
        </div>

        <div class="form-upload">
          <div class="form-upload-label">Ảnh</div>
          <label for="thumbnail">
            <div class="form-upload-container">
              <div class="form-upload-image">
                <?php if (!isset($detail) || $detail->thumbnail == null) { ?>
                  <i id="thumbnailIcon" class="bi bi-upload"></i>
                  <img id="thumbnailPreview" src="" alt="" class="img-fluid w-100 d-none">
                <?php } else { ?>
                  <img id="thumbnailPreview" src="<?php echo $detail->thumbnail ?>" alt="" class="img-fluid w-100">
                <?php } ?>
              </div>
            </div>
          </label>
          <input accept="image/*" type="file" hidden id="thumbnail" name="thumbnail" />
        </div>

        <div class="form-custom">
          <label for="parent_id" class="form-label">Danh mục cha</label>
          <select class="form-select" id="parent_id" name="parent_id">
            <?php if (!isset($detail) || $detail->id == null) { ?>
              <option selected value="">-- Lựa chọn --</option>
            <?php } ?>
            <?php foreach ($categories as $category) { ?>
              <option <?php if (isset($detail) && $detail->id == $category->id) { ?>selected<?php } ?> value="<?php echo $category->id ?>">
                <?php echo $category->title ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <input hidden type="text" name="type" value="1" />

        <div class="form-custom">
          <label for="display_order" class="form-label">Thứ tự hiển thị</label>
          <input class="form-control" id="display_order" name="display_order" placeholder="example: 1" value="<?php echo $detail->display_order ?? 1 ?>" />
        </div>

        <div class="form-check mb-3">
          <input type="hidden" name="status" value="0" />
          <input class="form-check-input" type="checkbox" id="status" name="status" <?php if (isset($detail) && $detail->status == 1 || !isset($detail)) { ?>checked <?php } ?> value="1" />
          <label class="form-check-label" for="status">
            Hiển thị
          </label>
        </div>
      </div>
    </div>
  </div>
</form>