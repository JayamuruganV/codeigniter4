<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <!-- Template Main CSS File -->
  <link href="<?= base_url(); ?>/public/assets/css/style.css" rel="stylesheet">
  <script src="<?= base_url(); ?>/public/assets/js/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
</head>
<script>    
    setTimeout(function() {
    $('#alert').hide();
     }, 3000);
</script>
<body class="main-bg">
<?php 
$page_session = \Codeigniter\Config\Services::session();
?>
  <!-- Login Form -->
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card shadow">
          <div class="card-title text-center border-bottom">
            <h2 class="p-3">Login</h2>
          </div>
          <div class="card-body">

          <?php if($page_session->getTempdata('error')): ?>
            <div id='alert' class='alert alert-danger'> <?= $page_session->getTempdata('error'); ?></div>
          <?php endif;?>

          <?= form_open(); ?>
              <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email')?>" />
                <span class='text-danger'><?= display_error($validation, 'email');?></span> 
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" value="<?= set_value('password')?>" />
                <span class='text-danger'><?= display_error($validation, 'password');?></span> 
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
              <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>