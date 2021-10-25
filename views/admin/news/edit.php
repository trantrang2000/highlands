<title><?php echo $title ?> | Fresh garden</title>
<script src="public/js/admin-news.js" defer></script>

<form action="<?php echo $formAction ?>" class="<?php if (isset($detail) && $detail->thumbnail != null) { ?>has-thumbnail<?php } ?>" id="form" method="POST" enctype="multipart/form-data">
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

        <div class="form-custom">
          <label for="author" class="form-label">Tác giả</label>
          <input class="form-control" id="author" name="author" placeholder="example" value="<?php echo $detail->author ?? '' ?>" />
        </div>

        <div class="form-custom">
          <label for="source" class="form-label">Trích nguồn</label>
          <input class="form-control" id="source" name="source" placeholder="example" value="<?php echo $detail->source ?? '' ?>" />
        </div>

        <div class="form-custom">
          <label for="category_id" class="form-label">Danh mục tin tức</label>
          <select class="form-select" id="category_id" name="category_id">
            <?php if (!isset($detail) || $detail->id == null) { ?>
              <option selected value="">-- Lựa chọn --</option>
            <?php } ?>
            <?php foreach ($categories as $category) { ?>
              <option <?php if (isset($detail) && $detail->category_id == $category->id) { ?>selected<?php } ?> value="<?php echo $category->id ?>">
                <?php echo $category->title ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <div class="form-custom">
          <label for="description" class="form-label">Mô tả ngắn</label>
          <textarea name="description" id="description" class="form-control">
            <?php echo $detail->description ?? '' ?>
          </textarea>
        </div>

        <div class="form-custom">
          <label for="content" class="form-label">Nội dung</label>
          <textarea name="content" id="content">
            <?php echo $detail->content ?? '' ?>
          </textarea>
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
          <input accept="image/*" type="file" id="thumbnail" name="thumbnail" hidden />
        </div>
      </div>
    </div>
  </div>
</form>