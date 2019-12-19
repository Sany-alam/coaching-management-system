<?php
$conn = mysqli_connect("localhost","root","","coaching_management_system");
session_start();


if (isset($_POST['search_output'])) {
  $srch = $_POST['srch'];
  $sql = "SELECT * FROM `students` WHERE `name` = '$srch' OR `contact` = '$srch' OR `address` = '$srch'";
  $res = mysqli_query($conn,$sql);
  ?>
  <div class="box">
    <div class="box-header">
      <h3>Search result</h3>
      <hr>
    </div>
    <div class="box-body">
      <?php if (mysqli_num_rows($res)>0) {
        ?>
        <h4>Student Details</h4>
        <?php
        while ($data = mysqli_fetch_array($res)) {
        $batch_id = $data['batch_id'];
        $sql1 = "SELECT * FROM `batches` WHERE `id` = '$batch_id'";
        $res1 = mysqli_query($conn,$sql1);
        $bat = mysqli_fetch_array($res1);
        $batch = $bat['batch_name'];
        ?>
        <p>Name : <?php echo $data['name']; ?></p>
        <p>Contact : <?php echo $data['contact']; ?></p>
        <p>Address : <?php echo $data['address']; ?></p>
        <p>Batch : <?php echo $batch; ?></p>
        <br><br>
        <?php
      } 
    }
    else {
      ?>
      <p class="text-center text-primary">No student available!</p>
      <?php
    } ?>
    </div>
  </div>
  <?php
}



if (isset($_POST['signout'])) {
  if (isset($_SESSION['admin'])) {
    if (session_unset()) {
      $_SESSION['successfull'] = "
      <div class='alert alert-success alert-dismissible'>
      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
      <h4>Successfully signout!</h4>
    </div>";
      echo "logout";
    }
    else {
      echo "error";
    }
  }
}


if (isset($_POST['Signin'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $sql = "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password'";
  $res = mysqli_query($conn,$sql);
  $admin = mysqli_fetch_array($res);
  if (mysqli_num_rows($res)==1) {
    $_SESSION['admin'] = $admin;
    echo "Credential matched";
  }
  else {
    echo "Credential not matched";
  }
}



if (isset($_POST['registration'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "INSERT INTO `admin`(`name`, `email`, `password`) VALUES ('$name','$email','$password')";
  $res = mysqli_query($conn,$sql);
  if ($res) {
    echo "done";
    $_SESSION['successfull'] = "<div class='alert alert-success alert-dismissible'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    <h6><i class='icon fa fa-check'></i>Successfully registered, Sign in to continue!</h6>
  </div>";
  }
  else {
    echo "error";
  }
}


if (isset($_POST['email_check'])) {
  $email = $_POST['email'];
  $sql = "SELECT * FROM `admin` WHERE `email` = '$email'";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)>0) {
    echo "found email";
  }
  else {
    echo "not found email";
  }
}


if (isset($_POST['dashboard'])) {
  include("includes/dashboard.php");
}


if (isset($_POST['dashboard_batch'])) {
  include("includes/dashboard_batch.php");
}


if (isset($_POST['bname'])) {
  $del_id = $_POST['id'];
  $del_batchid = $_POST['bid'];
  $del_batchname = $_POST['bname'];
  $sql = "DELETE FROM `routine` WHERE `id` = '$del_id' and `batch_id` = '$del_batchid'";
  $res = mysqli_query($conn,$sql);
  $fetch = array('name'=>$del_batchname,'id'=>$del_batchid);
  echo json_encode($fetch);
}


if (isset($_POST['UpdateClassRoutine'])) {
  $edit_id = $_POST['id'];
  $edit_batchid = $_POST['batchid'];
  $edit_batchname = $_POST['batchname'];
  $edit_day = $_POST['day'];
  $edit_startTime = $_POST['startTime'];
  $edit_endTime = $_POST['endTime'];
  $edit_status = $_POST['status'];
  $sql = "UPDATE `routine` SET `day`='$edit_day',`start_time`= '$edit_startTime',`end_time`= '$edit_endTime',`status`= '$edit_status' WHERE `id` = '$edit_id' AND `batch_id` = '$edit_batchid' ";
  $res = mysqli_query($conn,$sql);
  $fetch = array('name'=>$edit_batchname,'id'=>$edit_batchid);
  echo json_encode($fetch);
}


if (isset($_POST['edit_routine'])) {
  $id = $_POST['id'];
  $batch_id = $_POST['batch_id'];
  $sql = "SELECT * FROM `routine` WHERE `id` = '$id' AND `batch_id` = '$batch_id'";
  $res = mysqli_query($conn,$sql);
  $fetch = mysqli_fetch_array($res);
  echo json_encode($fetch);
}


if (isset($_POST['add_routine'])) {
  $batchID = $_POST['batchID'];
  $batchNAME = $_POST['batchNAME'];
  $add_day = $_POST['add_day'];
  $add_startTime = $_POST['add_startTime'];
  $add_endTime = $_POST['add_endTime'];
  $add_status = $_POST['add_status'];
  $sql = "INSERT INTO `routine`(`batch_id`, `day`, `start_time`, `end_time`, `status`) VALUES ('$batchID','$add_day','$add_startTime','$add_endTime','$add_status')";
  $res = mysqli_query($conn,$sql);
  $array = array("id"=>$batchID,"name"=>$batchNAME);
  echo json_encode($array);
}


if (isset($_POST['routine_page'])) {
  $batch_id = $_POST['id'];
  $batch_name = $_POST['name'];
  $sql = "SELECT * FROM `routine` WHERE `batch_id` = '$batch_id'";
  $res = mysqli_query($conn,$sql);
  ?>
<div class="box">
  <div class="box-header">
    <div class="container">
    <h2><?php echo $batch_name; ?>'s routine</h2>
    <hr>
    <button type="button" onclick="add_routine('<?php echo $batch_id; ?>','<?php echo $batch_name; ?>')" class="btn btn-primary">Add day</button>
    </div>
  </div>
  <div class="box-body">
    <?php
    if (mysqli_num_rows($res)>0) { ?>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Day</th>
          <th>Start from</th>
          <th>End in</th>
          <th>On/Off</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($fetch = mysqli_fetch_array($res)) { ?>
        <tr>
          <td><?php echo $fetch['day']; ?></td>
          <td><?php echo $fetch['start_time']; ?></td>
          <td><?php echo $fetch['end_time']; ?></td>
          <td><?php echo $fetch['status']; ?></td>
          <td>
            <button class="btn btn-warning" type="button" onclick="edit_routine('<?php echo $fetch['id']; ?>','<?php echo $batch_id; ?>','<?php echo $batch_name; ?>')"><i class="fa fa-edit"></i></button>
          </td>
          <td><button class="btn btn-danger" type="button" onclick="delete_routine('<?php echo $fetch['id']; ?>','<?php echo $batch_id; ?>','<?php echo $batch_name; ?>')"><i class="fa fa-trash"></i></button></td>
        </tr>
        <?php
      }
      ?>
      </tbody>
    </table>
    <?php
      }
      else {
         echo "<div class='container'><h3 class='text-primary'>No routine available</h3></div>";
        }
        ?>
  </div>
  <!-- /.box-body -->
</div>
  <?php
}


if (isset($_POST['del_notice'])) {
  $id = $_POST['id'];
  $sql = "DELETE FROM `notice` WHERE `id` = '$id'";
  $res = mysqli_query($conn,$sql);
}



if (isset($_POST['add_notice'])) {
  $batch_id = $_POST['batchid'];
  $batch_name = $_POST['batchname'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $sql = "INSERT INTO `notice`(`batch_id`, `title`, `text`) VALUES ('$batch_id','$title','$description')";
  $res = mysqli_query($conn,$sql);
  $array = array("id"=>$batch_id,"name"=>$batch_name);
  echo json_encode($array);
}




if (isset($_POST['notice_batch'])) {
  $batchid = $_POST['id'];
  $batchname = $_POST['name'];
  $sql = "SELECT * FROM `notice` WHERE `batch_id` = '$batchid' order by id desc";
  $res = mysqli_query($conn,$sql);
  ?>
  <div class="box box-primary">
  <div class="box-header">
 <h3 class="text-center"> <?php echo $batchname; ?>'s Notice board</h3>
 <div class="text-right">
  <button type="button" onclick="write_notice('<?php echo $batchid; ?>','<?php echo $batchname; ?>')" class="btn btn-primary">Write notice</button>
  </div>
  </div>
  <div class="box-body">
  <div class="row">
  <?php
  if (mysqli_num_rows($res)>0) {
  while ($cols = mysqli_fetch_array($res)) {
  ?>
  <div class="col-lg-3 col-xs-6">
  <div class="small-box bg-primary">
  <div class="inner">
  <h3><?php echo $cols['title']; ?></h3>
  <p><?php echo $cols['text']; ?></p>
  </div>
  <div class="icon">
  <i class="fa fa-notice"></i>
  </div>
  <a href="#" onclick="delete_notice('<?php echo $cols['id']; ?>','<?php echo $batchid; ?>','<?php echo $batchname; ?>')" class="small-box-footer">Delete notice <i class="fa fa-trash"></i></a>
  </div>
  </div>
  <?php } }
  else {
    ?>
    <div class="text-center text-primary">No notice available</div>
    <?php
  } ?>
  </div>
  </div>
  <?php
}



if (isset($_POST['save_about_batch'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $text_about_batch = $_POST['text_about_batch'];
  $sql = "UPDATE `batches` SET `batch_review`= '$text_about_batch' WHERE `id` = '$id' AND `batch_name` = '$name'";
  $res = mysqli_query($conn,$sql);
  $row = array("id"=>$id,"name"=>$name);
  echo json_encode($row);
}



if (isset($_POST['about_batch'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $sql = "SELECT * FROM `batches` WHERE `id` = '$id' AND `batch_name` = '$name'";
  $res = mysqli_query($conn,$sql);
  $batch_review = mysqli_fetch_array($res);
  if ($batch_review['batch_review'] != null) {
  ?>
  <div class="box" id="text_about" style="display:none;">
  <div class="box-header">
  <h2><?php echo $name; ?></h2>
  </div>
  <div class="box-body">
  <p><?php echo $batch_review['batch_review']; ?></p>
  </div>
  <div class="box-footer">
  <button class="btn btn-primary" type="button" onclick="writeAboutBatch('<?php echo $id; ?>','<?php echo $name; ?>')">
  Change
  </button>
  </div>
  </div>
  <?php
  }
  else {
    ?>
    <div class="box" id="text_about">
    <div class="box-body">
    <h5 class="text-center text-primary">No text here '<a href="#" onclick="writeAboutBatch('<?php echo $id; ?>','<?php echo $name; ?>')">click here</a>' to writw abour this batch!</h5>
    </div>
    </div>
    <?php
  }
  ?>
  <div class="box" id="write_about" style="">
  <!-- display:none; -->
  <div class="box-header">
  <h3><?php echo $name; ?></h3>
  </div>
  <div class="box-body">
  <div class="form-group">
  <textarea placeholder="write about this batch" class="form-control" id="text_about_batch"><?php echo $batch_review['batch_review']; ?></textarea>
  </div>
  <div class="form-group">
  <button class="btn btn-default" type="button" id="close_write_about_batch">
  Close
  </button>
  <button class="btn btn-primary" type="button" id="save_about_batch">
  Save
  </button>
  </div>
  </div>
  </div>
  <?php
}





if (isset($_POST['delete_batch'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $sql = "DELETE FROM `batches` WHERE `id` = '$id' AND `batch_name` = '$name'";
  $res = mysqli_query($conn,$sql);
}




if (isset($_POST['Update_batch'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $sql = "UPDATE `batches` SET `batch_name` = '$name' WHERE `id` = '$id'";
  $res = mysqli_query($conn,$sql);
  $row = array("id"=>$id,"name"=>$name);
  echo json_encode($row);
}


if (isset($_POST['setting_page'])) {
  $id = $_POST['id'];
  $sql = "select * from batches where id = '$id'";
  $res = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($res);
  $name = $row['batch_name'];
  ?>
  <div class="box">
  <div class="box-body" id="setting_box_body_1">
  <ul>
  <li>
  <a href="#" onclick="ChangeBatchName('<?php echo $id;?>','<?php echo $name;?>')">click here</a> to change batch name
  </li>
  <li>
  <a href="#" onclick="DeleteBatch('<?php echo $id;?>','<?php echo $name;?>')">click here</a> to delete batch
  </li>
  </ul>
  </div>
  </div>
  <?php
}



// *** class project files start here ***


// if (isset($_POST['save_project_File'])) {
//   $filebatchID = $_POST['filebatchID'];
//   $filebatchNAME = $_POST['filebatchNAME'];
//   $project = $_FILES['project_file'];
//   $project_name = $_FILES['project_file']['name'];
//   $project_title = $_POST['project_title'];
//   $project_description = $_POST['project_description'];
//   if ($project != null && $project_title != null) {
//     if (move_uploaded_file($project['tmp_name'],"dist/project/".$project['name'])) {
//       $sql = "INSERT INTO `projects`(`batch_id`, `title`, `file`, `description`) VALUES ('$filebatchID','$project_title','$project_name','$project_description')";
//     $res = mysqli_query($conn,$sql);
//     }
//   }
//   $data = array('id' => $filebatchID, 'name' => $filebatchNAME);
//   echo json_encode($data);
// }



if (isset($_POST['project_page'])) {
  $batch_id = $_POST['id'];
  $batch_name = $_POST['name'];
  ?>
  <div class="box">
    <div class="box-header text-center">
      <h3 class="box-title"><?php echo $batch_name; ?>, projects</h3>
    </div>
    <div class="text-right box-header">
      <button type="button" onclick="addproject('<?php echo $batch_id; ?>','<?php echo $batch_name; ?>')" class="btn btn-primary">Add class works</button>
    </div>
    <div class="box-body">
      <div class="row">
      <?php
      $sql = "SELECT * FROM `projects` WHERE `batch_id` = '$batch_id'";
      $res = mysqli_query($conn,$sql);
      if (mysqli_num_rows($res)) {
        while ($cols = mysqli_fetch_array($res)) {
          ?>
          <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php echo $cols['title']; ?></h3>
                <p><?php echo $cols['description']; ?></p>
              </div>
              <div class="icon">
                <i class="fa fa-file"></i>
              </div>
              <a onclick="delete_file" href="#" class="small-box-footer">
                Dellete this file <i class="fa fa-trash"></i>
              </a>
            </div>
          </div>
          <?php
        }
      }
      else{
        ?> <h1 class="text-primary text-center">No data here</h1> <?php
      }
      ?>
      </div>
    </div>
</div>
  <?php
}


// *** class project files end here ***



if (isset($_POST['Update_student_info'])) {
  $id = $_POST['id'];
  $batch_id = $_POST['batch_id'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $sql = "UPDATE `students` SET `batch_id`='$batch_id',`name`='$name',`contact`='$contact',`address`='$address' WHERE `id` = '$id'";
  $res = mysqli_query($conn,$sql);
  $sql1 = "SELECT * FROM `batches` WHERE `id` = '$batch_id'";
  $res1 = mysqli_query($conn,$sql1);
  $batch_info = mysqli_fetch_array($res1);
  echo json_encode($batch_info);
}



if(isset($_POST['edit_student_modal'])) {
  $batch_no = $_POST['batch_no'];
  $student_no = $_POST['student_no'];
  $sql = "SELECT * FROM `students` WHERE `id` = '$student_no' AND `batch_id` = '$batch_no'";
  $res = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($res);
  echo json_encode($row);
}




if (isset($_POST['delete_student_data'])) {
  $batch_no = $_POST['batch_no'];
  $student_no = $_POST['student_no'];
  $sql = "DELETE FROM `students` WHERE `batch_id` = '$batch_no' AND  `id` = '$student_no'";
  $res = mysqli_query($conn,$sql);
  $sql1 = "SELECT * FROM `batches` WHERE `id` = '$batch_no'";
  $res1 = mysqli_query($conn,$sql1);
  $batch_info = mysqli_fetch_array($res1);
  echo json_encode($batch_info);
}





if (isset($_POST['add_student'])) {
  $batch_id = $_POST['add_batch_id'];
  $add_name = $_POST['add_name'];
  $add_contact = $_POST['add_contact'];
  $add_address = $_POST['add_address'];
  $sql = "INSERT INTO `students`( `batch_id`, `name`, `contact`, `address`) VALUES ('$batch_id','$add_name','$add_contact','$add_address')";
  $res = mysqli_query($conn,$sql);
  $sql1 = "SELECT * FROM `batches` WHERE `id` = '$batch_id'";
  $res1 = mysqli_query($conn,$sql1);
  $batch_info = mysqli_fetch_array($res1);
  echo json_encode($batch_info);
}




if (isset($_POST['student_page'])) 
{
  $batch_id = $_POST['batch_id'];
  $batch_name = $_POST['batch_name'];
  $sql = "SELECT * FROM `students` WHERE `batch_id` = '$batch_id' order by id asc";
  $res = mysqli_query($conn,$sql);
  ?>
  <div class="box">
    <div class="box-header text-center">
      <h3 class="box-title"><?php echo $batch_name; ?>, Student's Details</h3>
    </div>
    <div class="text-right box-header">
      <button type="button" onclick="Student_register(<?php echo $batch_id; ?>)" class="btn btn-primary">Student register</button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <?php   if (mysqli_num_rows($res)>0) { ?>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Contact</th>
              <th>Address</th>
              <th>#</th>
              <th>#</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            for($i = 1; $i < $cols = mysqli_fetch_array($res); $i++) { ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $cols['name']; ?></td>
              <td><?php echo $cols['contact']; ?></td>
              <td><?php echo $cols['address']; ?></td>
              <td><button 
              onclick="edit_student_data(<?php echo $cols['id']; ?>,<?php echo $cols['batch_id']; ?>)"
               type="button" class="btn btn-warning"><i class="fa fa-edit"></i></button></td>
              <td><button onclick="delete_student_data(<?php echo $cols['id']; ?>,<?php echo $cols['batch_id']; ?>)" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php }
      else{
        ?> <h1 class="text-primary text-center">No data here</h1> <?php
      } ?>
    </div>
    <!-- /.box-body -->
  </div>
  <?php
}



if (isset($_POST['save_batch'])) {
  $batch_name = $_POST['batch_name'];
  $sql = "INSERT INTO `batches`(`batch_name`) VALUES ('$batch_name')";
  $res = mysqli_query($conn,$sql);
}



if (isset($_POST['showbatch'])) {
  ?>
  <li>
    <a href='#' onclick='dashboard()'>
    <i class='fa fa-home'></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="treeview">
    <a href='#'>
    <i class='fa fa-link'></i>
      <span class='pull-left-container'>Batches</span>
      <span class='pull-right-container'><i class='fa fa-angle-left pull-right'></i></span>
    </a>
    <ul class="treeview-menu">
    <li>
    <a href='#' onclick='CreateBatch()'>
      <span>Create Batch</span>
      <span class='pull-right-container'>
        <i class='fa fa-plus'></i>
      </span>
    </a>
  </li>
  <?php
  $sql = "SELECT * FROM `batches` order by id";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)>0) {
    while ($cols = mysqli_fetch_array($res)) {
      ?>
      <li class="treeview">
      <a href='#'><i class='fa fa-link'></i><span><?php echo $cols['batch_name']; ?></span><span class='pull-right-container'><i class='fa fa-angle-left pull-right'></i></span></a>
 <ul class='treeview-menu'>
   <li>
     <a href='#' onclick="dashboard_batch('<?php echo $cols['id']; ?>','<?php echo $cols['batch_name']; ?>')">
     <i class='fa fa-link'></i>
     <span>Dashboard</span>
     </a>
   </li>
   <li>
     <a href='#' onclick="students('<?php echo $cols['id']; ?>','<?php echo $cols['batch_name']; ?>')">
     <i class='fa fa-link'></i>
     <span>Students</span>
     </a>
   </li>
   <li>
     <a href='#' onclick="project('<?php echo $cols['id']; ?>','<?php echo $cols['batch_name']; ?>')">
     <i class='fa fa-link'></i>
     <span>Works & projects</span>
     </a>
   </li>
   <li>
     <a href="#" onclick="routine('<?php echo $cols['id']; ?>','<?php echo $cols['batch_name']; ?>')">
     <i class='fa fa-link'></i>
     <span>Routine</span>
     </a>
   </li>
   <li>
     <a href="#" onclick="notice('<?php echo $cols['id']; ?>','<?php echo $cols['batch_name']; ?>')">
     <i class='fa fa-link'></i>
     <span>Notice</span>
     </a>
   </li>
   <li>
     <a href='#' onclick="about('<?php echo $cols['id']; ?>','<?php echo $cols['batch_name']; ?>')">
     <i class='fa fa-link'></i>
     <span>About</span>
     </a>
   </li>
   <li>
     <a href='#' onclick="setting('<?php echo $cols['id']; ?>','<?php echo $cols['batch_name']; ?>')">
     <i class='fa fa-link'></i>
     <span>Setting</span>
     </a>
   </li>
 </ul>
 </li>
      <?php
    }
  }
  ?>
    </ul>
  </li>
  <?php
}








?>