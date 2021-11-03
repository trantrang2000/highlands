<title>Đăng ký</title>
<script src="public/js/sign-up.js" defer></script>

<div class="text-center">
  <i class="bi bi-brightness-alt-high-fill d-inline-block fs-1 text-primary"></i>
  <h1 class="fs-2 fw-light mb-5">Đăng ký</h1>
</div>
<form action="" method="POST" id="form-sign-up">
  <div class="form-floating mb-3">
    <input class="form-control" id="first-name" placeholder="first-name" name="first_name" />
    <label for="first-name">Họ <span class="text-danger">*</span></label>
  </div>
  <div class="form-floating mb-3">
    <input class="form-control" id="last-name" placeholder="last-name" name="last_name" />
    <label for="last-name">Tên <span class="text-danger">*</span></label>
  </div>
  <div class="form-floating mb-3">
    <input class="form-control" id="phone" placeholder="phone" name="phone" />
    <label for="phone">Số điện thoại </label>
  </div>
  <div class="form-floating mb-3">
    <input type="email" class="form-control" id="email" placeholder="email" name="email" />
    <label for="email">Email <span class="text-danger">*</span></label>
  </div>
  <div class="form-floating mb-3">
    <input type="password" class="form-control" id="password" placeholder="password" name="password" />
    <label for="password">Mật khẩu <span class="text-danger">*</span></label>
  </div>
  <div class="form-floating mb-3">
    <input type="password" class="form-control" id="confirm-password" placeholder="confirm-password" name="confirm-password" />
    <label for="confirm-password">Xác nhận mật khẩu <span class="text-danger">*</span></label>
  </div>
  <button type="submit" class="btn btn-primary w-100 btn-lg text-white">
    Tạo mới tài khoản
  </button>
</form>
<div class="mt-3">
  <small>Nếu bạn đã có tài khoản? <a href="sign-in">Đăng nhập</a></small>
</div>

<div class="toast align-items-center text-white bg-danger border-0 start-50 translate-middle-x" role="alert" aria-live="assertive" aria-atomic="true" id="toast">
  <div class="d-flex">
    <div class="toast-body">Email đã được đăng ký.</div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>