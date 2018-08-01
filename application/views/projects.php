<?php include('header.php');?>

<style type="text/css">
    .error{
        color: #f00;
    }

    .button {
  display: inline-block;
  border-radius: 4px;
  background-color: #007bff;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 14px;
  padding: 10px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 3px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
    vertical-align:middle;
  opacity: 1;
  right: 0;
}
</style>
<div id="content-wrapper">
<div class="container-fluid">
<div class="card mb-12">
<div class="card-header">
 <div class="card-body">
 <?php
 //echo $this->session->flashdata('upload_error');
 //$this->session->unset_userdata('upload_error');
 //print_r($project);
 ?>

				<!-- <form  style="position: center" action="" method="post" enctype="multipart/form-data" id="coin_upt">
                    <input type="hidden" name="cid" value="">
                        <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="name" value="" class="form-control" >
                        	
						</div>
                        <div class="form-group">
                        <label>Project Name</label>
                        <input type="text" name="abb" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Upload Project</label>
                            <input type="file"  value="" name="Project" >

                        </div>
                                                            
                        <div style="margin-top: 20px;">

                        <button class="btn btn-sm btn-primary" name="update" type="submit" ><strong>Upload</strong></button>
                        </div>
                    </form> -->
                    <?php
                    echo form_open_multipart('welcome/projectUpload');

                    $desc = array(
		              'name'        => 'desc',
		              'id'          => 'desc',
		              'value'       => '',
		              'maxlength'   => '100',
		              'size'        => '50',
		              'class'       => 'form-control',
                      'placeholder' => 'Project description',
		            );

		            $prjct = array(
		              'name'        => 'project',
		              'id'          => 'project',
		              'value'       => '',
		              'maxlength'   => '100',
		              'size'        => '50',
		              'class'       => 'form-control',
                      'placeholder' => 'Name of the project',
		            );

		            $upload = array(
					'name'	=>	'prFile',
					'id'	=>	'upload',
					'class' => 'form-control',
					'type'	=> 'file',
		            );

					$button = array(
                        'class' => 'button',
						'name' => 'button',
						'id' => 'button',
						'value' => 'true',
						'type' => 'submit',
						'content' => 'Upload'
					);

                    ?>
                    <div class="form-group">
                    	
                    	<?php
                    	echo form_label('Project Name', 'project');
                        echo form_error('project');
                    	echo form_input($prjct);

                        echo form_label('Description', 'desc');
                        echo form_error('desc');
                        echo form_input($desc);

                    	echo form_label('Upload Project', 'prFile');
                        echo form_error('prFile');
                    	echo form_input($upload);
                    ?>

                    </div>

                    <div>
                    <?php
                    	echo form_button($button);
                    ?>
                    </div>
					
					<?php
                    echo form_close();
                    ?>
                    </div>
                    </div>
                    </div>
                    
            <div class="card mb-6">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Projects Table</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Project Name</th>
                      <th>Description</th>
                      <th>File name</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php
                  foreach ($project as $key=>$valueProject) {

                  ?>
                    <tr>
                      <td><?= $valueProject->project_name ?></td>
                      <td><?= $valueProject->project_descr ?></td>
                      <td><a download href="<?php echo base_url(); ?>uploads/<?php echo $valueProject->project_file;  ?>">Download</a></td>
                    </tr>
                    <?php }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Last updated <?= $valueProject->create_date ?></div>
          </div>
          </div>
          </div>
                    



<?php include('footer.php') ?>