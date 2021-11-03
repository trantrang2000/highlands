<title>Đăng nhập</title>
<script src="public/js/sign-in.js" defer></script>

<div class="text-center">
  <i class="bi bi-brightness-alt-high-fill d-inline-block fs-1 text-primary"></i>
  <h1 class="fs-2 fw-light mb-5">Đăng nhập</h1>
</div>
<form action="" id="form-sign-in" method="POST">
  <div class="form-floating mb-3">
    <input type="email" class="form-control" id="email" name="email" placeholder="email" value="admin@gmail.com" />
    <label for="email">Email</label>
  </div>
  <div class="form-floating mb-1">
    <input type="password" class="form-control" id="password" name="password" placeholder="password" value="Thuy1234@1234" />
    <label for="password">Mật khẩu</label>
  </div>
  <a href="#" class="form-text text-decoration-none">Quên mật khẩu?</a>
  <div class="mt-3">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="remember" />
      <label class="form-check-label" for="remember">
        Ghi nhớ đăng nhập
      </label>
    </div>
  </div>
  <div class="mt-3">
    <button class="btn btn-primary w-100 btn-lg text-white" type="submit">
      Đăng nhập
    </button>
  </div>
</form>
<div class="mt-3">
  <small>Nếu bạn chưa có tài khoản? <a href="sign-up">Tạo mới tài khoản</a></small>
</div>

<div class="toast align-items-center text-white bg-danger border-0 start-50 translate-middle-x" role="alert" aria-live="assertive" aria-atomic="true" id="toast">
  <div class="d-flex">
    <div class="toast-body">Email hoặc mật khẩu không chính xác.</div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>