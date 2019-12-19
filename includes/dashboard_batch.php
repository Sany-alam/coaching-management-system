<?php
$id = $_POST['id'];
$name = $_POST['name'];

// students
$sql = "SELECT * FROM `students` WHERE `batch_id` = '$id'";
$res = mysqli_query($conn,$sql);
if (mysqli_num_rows($res)>0) {
    $students = mysqli_num_rows($res);
}
else {
    $students = 0;
}

// project
$sql1 = "SELECT * FROM `projects` WHERE `batch_id` = '$id'";
$res1 = mysqli_query($conn,$sql1);
if (mysqli_num_rows($res1)>0) {
    $projects = mysqli_num_rows($res1);
}
else {
    $projects = 0;
}


// notice
$sql2 = "SELECT * FROM `notice` WHERE `batch_id` = '$id'";
$res2 = mysqli_query($conn,$sql2);
if (mysqli_num_rows($res2)>0) {
    $notice = mysqli_num_rows($res2);
}
else {
    $notice = 0;
}


// classess in a week
$sql3 = "SELECT * FROM `routine` WHERE `batch_id` = '$id'";
$res3 = mysqli_query($conn,$sql3);
if (mysqli_num_rows($res3)>0) {
    $routine = mysqli_num_rows($res3);
}
else {
    $routine = 0;
}
?>
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $students; ?></h3>
              <p>Students</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <a onclick="students('<?php echo $id; ?>','<?php echo $name; ?>')" href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $projects; ?></h3>

              <p>Projects</p>
            </div>
            <div class="icon">
              <i class="fa fa-copy"></i>
            </div>
            <a href="#" onclick="project('<?php echo $id; ?>','<?php echo $name; ?>')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $notice; ?></h3>

              <p>Notice</p>
            </div>
            <div class="icon">
              <i class="fa fa-sticky-note"></i>
            </div>
            <a href="#" onclick="notice('<?php echo $id; ?>','<?php echo $name; ?>')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $routine; ?></h3>

              <p>Classe in week</p>
            </div>
            <div class="icon">
              <i class="fa fa-university"></i>
            </div>
            <a href="#" onclick="routine('<?php echo $id; ?>','<?php echo $name; ?>')" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>