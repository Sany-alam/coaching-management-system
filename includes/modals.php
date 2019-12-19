<!-- edit class routine - schedule! -->
<div class="modal fade" id="editClassInRoutineModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">edit Class-day</h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form role="form">
        <input type="hidden" id="editID">
        <input type="hidden" id="editbatchID">
        <input type="hidden" id="editbatchNAME">
        <div class="form-group">
            <label for="edit_Day">Day</label>
            <select class="form-control" id="edit_day">
              <option value="Saturday">Saturday</option>
              <option value="Sunday">Sunday</option>
              <option value="Monday">Monday</option>
              <option value="Tuesday">Tuesday</option>
              <option value="Wednesday">Wednesday</option>
              <option value="Thursday">Thursday</option>
              <option value="Friday">Friday</option>
            </select>
        </div>
        <div class="form-group">
          <label for="edit_startTime">Class start time:</label>
          <div class="input-group">
            <input id="edit_startTime" type="text" class="form-control timepicker" autocomplete="off">
            <div class="input-group-addon">
              <i class="fa fa-hourglass-start"></i>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="edit_endTime">Class End time:</label>
          <div class="input-group">
            <input id="edit_endTime" type="text" class="form-control timepicker" autocomplete="off">
            <div class="input-group-addon">
              <i class="fa fa-hourglass-end"></i>
            </div>
          </div>
        </div>
        <div class="form-group">
            <label>Class will be : </label>
            <label>
              <input id="on" name="optionsRadios" type="radio" class="edit_status" value="on" checked>On 
            </label>
            <!-- orname="optionsRadios"  -->
            <label>
              <input id="off" type="radio" name="optionsRadios" class="edit_status" value="off">Off
            </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button id="UpdateClassRoutine" type="button" class="btn btn-primary">Update</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- edit class routine - schedule! end here -->




<!-- add class routine - schedule! -->
<div class="modal fade" id="AddClassInRoutineModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Add Class-day</h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form role="form">
        <input type="hidden" id="batchID">
        <input type="hidden" id="batchNAME">
        <div class="form-group">
            <label for="Add_Day">Day</label>
            <select class="form-control" id="add_day">
              <option value="Saturday">Saturday</option>
              <option value="Sunday">Sunday</option>
              <option value="Monday">Monday</option>
              <option value="Tuesday">Tuesday</option>
              <option value="Wednesday">Wednesday</option>
              <option value="Thursday">Thursday</option>
              <option value="Friday">Friday</option>
            </select>
        </div>
        <div class="form-group">
          <label for="add_startTime">Class start time:</label>
          <div class="input-group">
            <input id="add_startTime" type="text" class="form-control timepicker" autocomplete="off">
            <div class="input-group-addon">
              <i class="fa fa-hourglass-start"></i>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="add_endTime">Class End time:</label>
          <div class="input-group">
            <input id="add_endTime" type="text" class="form-control timepicker" autocomplete="off">
            <div class="input-group-addon">
              <i class="fa fa-hourglass-end"></i>
            </div>
          </div>
        </div>
        <!-- radio -->
        <div class="form-group">
            <label>Class will be : </label>
            <label>
              <input name="optionsRadios" type="radio" class="add_status" value="on" checked>On 
            </label>
            <!-- orname="optionsRadios"  -->
            <label>
              <input type="radio" name="optionsRadios" class="add_status" value="off">Off
            </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button id="SaveClassRoutine" type="button" class="btn btn-primary">Save</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- add class routine - schedule! end here -->




<!-- add notice! -->
<div class="modal fade" id="AddNoticeModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Add notice</h4>
      </div>
      <div class="modal-body">
        <form role="form">
        <input type="hidden" id="batchid">
        <input type="hidden" id="batchname">
        <div class="form-group">
            <label for="notice_title">Title</label>
            <input type="text" class="form-control" id="notice_title" placeholder="Enter a title">
        </div>
        <div class="form-group">
            <label for="notice_description">Description</label>
            <input type="text" class="form-control" id="notice_description"  placeholder="Describe the notice">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button id="save_notice" type="button" class="btn btn-primary">Save</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- add notice! end here -->


<!-- add project files -->
<!-- <div class="modal fade" id="AddProjectFileModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Add project file</h4>
      </div>
      <div class="modal-body">
        <form  enctype="multipart/form-data">
        <input type="hidden" id="filebatchID">
        <input type="hidden" id="filebatchNAME">
        <div class="form-group">
            <label for="project_title">Title</label>
            <input type="text" class="form-control" id="project_title" placeholder="Enter a title" required>
            <small id="title_alert" class="text-danger">Fill this input</small>
        </div>
        <div class="form-group">
            <label for="project_file">File</label>
            <input type="file" class="form-control-file" id="project_file" required>
            <small id="file_alert" class="text-danger">Select a file</small>
        </div>
        <div class="form-group">
            <label for="project_description">Description</label>
            <textarea class="form-control" id="project_description" rows="3" placeholder="Describe about this project"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" onclick="Add_project_File()" class="btn btn-primary">Add file</button>
        </form>
      </div>
    </div>
  </div>
</div> -->
<!-- add project files end here -->




<!-- change batch name modal -->
<div class="modal fade" id="ChangeBatchNameModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Change batch name</h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form role="form">
        <input type="hidden" id="change_batch_id">
        <div class="form-group">
          <label for="change_batch_name">Batch name</label>
          <input type="text" class="form-control" id="change_batch_name" placeholder="Enter Batch Name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button id="Update_batch" type="button" class="btn btn-primary">Update</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- end change batch name modal here -->




<!-- Create batch modal -->
<div class="modal fade" id="AddBatch">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Add batch</h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form role="form">
        <div class="form-group">
          <label for="batch_name">Batch</label>
          <input type="text" class="form-control" id="batch_name" placeholder="Enter Batch Name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button onclick="save_batch()" type="button" class="btn btn-primary">Save</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- end Create batch modal here -->


<!-- add student data modal -->
<div class="modal fade" id="StudentAddModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Add student info</h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form role="form">
          <input id="add_batch_id" type="hidden">
        <div class="form-group">
          <label for="add_name">Name</label>
          <input type="text" class="form-control" id="add_name" placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="add_address">Address</label>
          <input type="text" class="form-control" id="add_address" placeholder="Enter address">
        </div>
        <div class="form-group">
          <label for="add_contact">Contact number</label>
          <input type="number" class="form-control" id="add_contact" placeholder="Enter contact number">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" id="add_student_data" class="btn btn-primary">Register</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- add student data modal end here -->



<!-- edit student data modal -->
<div class="modal fade" id="StudentEditModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Update data</h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <form role="form">
          <input id="update_hidden_student_id" type="hidden">
          <input id="update_hidden_batch_id" type="hidden">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="update_name" placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="update_address" placeholder="Enter address">
        </div>
        <div class="form-group">
          <label for="contact">Contact number</label>
          <input type="number" class="form-control" id="update_contact" placeholder="Enter contact number">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" id="Update_student_data" class="btn btn-primary">Update</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- edit student data modal end here -->