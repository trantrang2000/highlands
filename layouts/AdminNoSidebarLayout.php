<!DOCTYPE html>
<html lang="en">

<head>
  <?php global $APP_URL; ?>
  <base href="<?php echo $APP_URL ?>/">
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="public/js/main.js"></script>
  <script src="public/js/admin.js" defer></script>
</head>

<body class="bg-light min-vh-100 d-flex flex-column">
  <!-- Content -->
  <main class="flex-grow-1 mb-3">
    <?php
    echo $this->content;
    ?>
  </main>

  <!-- Footer -->
  <footer class="container-fluid py-2 text-center bg-white border-top">
    <p class="mb-0">
      © 2021 -
      <a href="admin" class="text-muted text-decoration-none">Highland</a>
    </p>
  </footer>
</body>

</html>