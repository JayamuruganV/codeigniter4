<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Candidate Add</title>
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
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card shadow">
          <div class="card-title text-center border-bottom">
            <h2 class="p-3">Candidate Add</h2>
          </div>
          <div class="card-body">

          <?php if($page_session->getTempdata('error')): ?>
            <div id='alert' class='alert alert-danger'> <?= $page_session->getTempdata('error'); ?></div>
          <?php endif;?>   

            <?= form_open_multipart(); ?>

                <div class="mb-4">
                <lable>Name:</label> 
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="<?= set_value('name')?>" >
                    <span class='text-danger'><?= display_error($validation, 'name');?></span>       
                </div>

                <div class="mb-4">
                <lable>Email:</label> 
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?= set_value('email')?>" >
                    <span class='text-danger'><?= display_error($validation, 'email');?></span>        
                </div>

                <div class="mb-4">
                <lable>Expected Salary:</label> 
                    <input type="text" class="form-control" name="salary" id="salary" placeholder="Expected Salary" value="<?= set_value('salary')?>" >
                    <span class='text-danger'><?= display_error($validation, 'salary');?></span>        
                </div>
                <div class="mb-4">
                <lable>D.O.B:</label> 
                    <input type="date" class="form-control" id="dob" name="dob" min="1992-01-01" max="2000-12-31" value="<?= set_value('birthday')?>">
                    <span class='text-danger'><?= display_error($validation, 'dob');?></span>
                </div>
                <div class="mb-4">
                <lable>Address:</label> 
                    <textarea class="form-control" name="address" rows="5" placeholder="Address" value="<?= set_value('address')?>" ></textarea>
                    <span class='text-danger'><?= display_error($validation, 'address');?></span>        
                </div>
                <div class="mb-4">
                    <lable>Gender:</label> 
                    <input type="radio" name="sex" value="Male"/>Male    
                    <input type="radio" name="sex" value="Female"/>Female
                    <span class='text-danger'><?= display_error($validation, 'sex');?></span>
                </div> 

                <div class="mb-4">
                    <lable>Language:</label> 
                    <input type="checkbox" name="language[]" value="Tamil"/>Tamil    
                    <input type="checkbox" name="language[]" value="English"/>English
                    <input type="checkbox" name="language[]" value="Hindi"/>Hindi
                    <span class='text-danger'><?= display_error($validation, 'language');?></span>
                </div> 

                <div class="mb-4">
                <input type="file" class="form-control" name="pdf" id="pdf" placeholder="Upload PDF" value="<?= set_value('pdf')?>" >
                <span class='text-danger'><?= display_error($validation, 'pdf');?></span>    
                </div>
                <br>

                <div class="text-center"><input type="submit" name="save" class="btn btn-primary" value="Add"></div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>

</html>


