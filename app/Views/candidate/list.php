<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Candidate List</title>
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
      <div class="col-lg-12 col-md-6 col-sm-6">
        <div class="card shadow">
          <div class="card-title text-center border-bottom">
            <h2 class="p-3">Candidate List</h2>
          </div>
          <div class="common-buttons" style="">
		        <a role="button" href="<?= base_url(); ?>candidate/add" class="btn btn-success">Add Candidates</a>
            <a role="button" href="<?= base_url(); ?>logout" class="btn btn-primary">Logout</a>
		      </div>


          <?php if($page_session->getTempdata('success')): ?>
            <div id='alert' class='alert alert-success'> <?= $page_session->getTempdata('success'); ?></div>
          <?php endif;?>
          
          <div class="card-body">
          <section>
            <div class='container'>
                <div class='contant-box'>
                    <div class ='row'>
                        <?php if(!empty($candidate)):?>
                            <table class='table'>
                              <tr>
                                  <th>Id</th>
                                  <th>Name</th>
                                  <th>DOB</th>
                                  <th>Email</th>
                                  <th>Salary</th>
                                  <th>Action</th>
                              </tr>
                                <?php foreach($candidate as $candi):?>
                                  <tr>
                                      <td><?= $candi->id;?></td>
                                      <td><?= $candi->name;?></td>
                                      <td><?= date("d-M-Y" ,strtotime($candi->dob));?></td>
                                      <td><?= $candi->email;?></td>
                                      <td><?= $candi->salary;?></td>
                                      <td><a class="btn btn-success" href='<?= base_url(); ?>candidate/view/<?= $candi->id;?>'>View</a></td>
                                  </tr>
                                <?php endforeach?>
                            </table>
                            <?php else:?>
                                <h2>Sorry No Records</h2>
                          <?php endif;?>
                    </div>
                </div>
            </div>
          </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
