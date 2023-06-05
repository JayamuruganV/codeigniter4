<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Candidate View</title>
  <!-- Template Main CSS File -->
  <link href="<?= base_url(); ?>/public/assets/css/style.css" rel="stylesheet">
  <script src="<?= base_url(); ?>/public/assets/js/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
</head>
<body class="main-bg">
  
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="card shadow">
          <div class="card-title text-center border-bottom">
            <h2 class="p-3">Candidate View</h2>
          </div>
            <div class="" style="">
		        <a role="button" href="<?= base_url(); ?>candidate/list" class="btn btn-success">Back</a>
		    </div>
          
          <div class="card-body">
          <section>
            <div class='container'>
                <div class='contant-box'>
                    <div class ='row'>
                        <?php if(!empty($candidate)):?>
                            <table class='table'>                                
                                    <tr>
                                        <th>Id</th>
                                        <th><?= $candidate->id;?></th>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <th><?= $candidate->name;?></th>
                                    </tr>
                                    <tr>
                                        <th>DOB</th>
                                        <th><?= date("d-M-Y" ,strtotime($candidate->dob));?></th>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <th><?= $candidate->email;?></th>
                                    </tr>
                                    <tr>
                                        <th>Salary</th>
                                        <th><?= $candidate->salary;?></th>
                                    </tr> 
                                    <tr>
                                        <th>Gender</th>
                                        <th><?= $candidate->sex;?></th>
                                    </tr>
                                    <tr>
                                        <th>Language</th>
                                        <th><?= $candidate->language;?></th>
                                    </tr>                               
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
