$(function(){
    // sidebar showing batches
    showbatch();
 //Timepicker
 $('.timepicker').timepicker({
    showInputs: false
  })

    $("#add_student_data").click(function(){
        const add_name = $("#add_name").val();
        const add_contact = $("#add_contact").val();
        const add_address = $("#add_address").val();
        const add_batch_id = $("#add_batch_id").val();
        var formdata = new FormData();
        formdata.append("add_batch_id",add_batch_id);
        formdata.append("add_name",add_name);
        formdata.append("add_contact",add_contact);
        formdata.append("add_address",add_address);
        formdata.append("add_student","add_student");
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            type:"post",
            url:"data.php",
            success:function(data)
            {
                var batch_info = JSON.parse(data);
                students(batch_info.id,batch_info.batch_name);
                $("#StudentAddModal").modal('hide');
            },
            cache:false
        });
    });


    $("#Update_student_data").click(function(){
        var student_id = $("#update_hidden_student_id").val();
        var batch_id = $("#update_hidden_batch_id").val();
        var update_student_name = $("#update_name").val();
        var update_student_address = $("#update_address").val();
        var update_student_contact = $("#update_contact").val();
        // alert("student id = "+id+"  batch id = "+batch_id);
        var formdata = new FormData();
        formdata.append("id",student_id);
        formdata.append("batch_id",batch_id);
        formdata.append("name",update_student_name);
        formdata.append("address",update_student_address);
        formdata.append("contact",update_student_contact);
        formdata.append("Update_student_info","Update_student_info");
        $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            var batch_info = JSON.parse(data);
            students(batch_info.id,batch_info.batch_name);
            $("#StudentEditModal").modal('hide');
        },
        cache:false
        });
    });


    
    $("#Update_batch").click(function(){
        var id = $("#change_batch_id").val();
        var name = $("#change_batch_name").val();
        var formdata = new FormData();
        formdata.append("id",id);
        formdata.append("name",name);
        formdata.append("Update_batch","Update_batch");
        $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            var all = JSON.parse(data);
            var b_id = all.id;
            var b_name = all.batch_name;
            setting(b_id,b_name);
            showbatch();
            $("#ChangeBatchNameModal").modal('hide');
        },
        cache:false
     // ajax
    });
    // .click function
    });



    $("#save_notice").click(function(){
        var batchname = $("#batchname").val();
        var batchid = $("#batchid").val();
        var title = $("#notice_title").val();
        var description = $("#notice_description").val();
        var formdata = new FormData();
        formdata.append("batchid",batchid);
        formdata.append("batchname",batchname);
        formdata.append("title",title);
        formdata.append("description",description);
        formdata.append("add_notice","add_notice");
        $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            all = JSON.parse(data);
            // alert(all.id+all.name);
            $("#AddNoticeModal").modal("hide");
            notice(all.id,all.name);
        },
        cache:false
        });
    });


    $("#SaveClassRoutine").click(function(){
        var batchID = $("#batchID").val();
        var batchNAME = $("#batchNAME").val();
        var add_day = $("#add_day").val();
        var add_startTime = $("#add_startTime").val();
        var add_endTime = $("#add_endTime").val();
        var add_status = $("input[name='optionsRadios']:checked").val();
        // alert(batchID+" "+batchNAME+" "+add_day+" "+add_startTime+" "+add_endTime+" "+add_status);
        var formdata = new FormData();
        formdata.append("batchID",batchID);
        formdata.append("batchNAME",batchNAME);
        formdata.append("add_day",add_day);
        formdata.append("add_startTime",add_startTime);
        formdata.append("add_endTime",add_endTime);
        formdata.append("add_status",add_status);
        formdata.append("add_routine","add_routine");
        $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            var all = JSON.parse(data);
            routine(all.id,all.name);
            $("#AddClassInRoutineModal").modal('hide');
        },
        cache:false
        });
    });


    $("#UpdateClassRoutine").click(function(){
        var id = $("#editID").val();
        var batchid = $("#editbatchID").val();
        var batchname = $("#editbatchNAME").val();
        var day = $("#edit_day").val();
        var startTime = $("#edit_startTime").val();
        var endTime = $("#edit_endTime").val();
        var status = $("input[name='optionsRadios']:checked").val();
        //  alert(id+" "+batchid+" "+batchname+" "+day+" "+startTime+" "+endTime+" "+status);
        var formdata = new FormData();
        formdata.append("id",id);
        formdata.append("batchid",batchid);
        formdata.append("batchname",batchname);
        formdata.append("day",day);
        formdata.append("startTime",startTime);
        formdata.append("endTime",endTime);
        formdata.append("status",status);
        formdata.append("UpdateClassRoutine","UpdateClassRoutine");
        $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            type:"post",
            url:"data.php",
            success:function(data)
            {
                var all = JSON.parse(data);
                routine(all.id,all.name);
                // alert(data);
                $("#editClassInRoutineModal").modal('hide');
            },
            cache:false
            });
    });


    $("#search-btn").click(function(){
        var srch = $("#search").val();
        if (srch.length == 0) {
            
        }
        else{
        var formdata = new FormData();
        formdata.append("srch",srch);
        formdata.append("search_output","search_output");
        $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            $("#main_contents").html(data);
        },
        cache:false
        });
        }
    });

    dashboard();
});
// ***jquery funtion end here***


function signout() {
    var formdata = new FormData();
    formdata.append("signout","signout");
    $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"data.php",
    success:function(data)
    {
        var alert = $.trim(data);
        if (alert == "logout") {
            window.location.href="login.php";
        }
        else{
            alert(data);
        }
        
    },
    cache:false
    });
}



function dashboard(){
    var formdata = new FormData();
    formdata.append("dashboard","dashboard");
    $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"data.php",
    success:function(data)
    {
        $("#main_contents").html(data);
    },
    cache:false
    });
}




function dashboard_batch(id,name){
    var formdata = new FormData();
    formdata.append("id",id);
    formdata.append("name",name);
    formdata.append("dashboard_batch","dashboard_batch");
    $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"data.php",
    success:function(data)
    {
        $("#main_contents").html(data);
    },
    cache:false
    });
}



function delete_routine(id,bid,bname) {
    var formdata = new FormData();
    formdata.append("id",id);
    formdata.append("bid",bid);
    formdata.append("bname",bname);
    formdata.append("delete_routine",delete_routine);
    $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"data.php",
    success:function(data)
    {
        // alert(data);
        var all = JSON.parse(data);
        routine(all.id,all.name);
    },
    cache:false
    });
}



function edit_routine(id,batch_id,batch_name) {
    var formdata = new FormData();
    formdata.append("id",id);
    formdata.append("batch_id",batch_id);
    formdata.append("batch_name",batch_name);
    formdata.append("edit_routine",edit_routine);
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            var all = JSON.parse(data);
            $("#editID").val(all.id);
            $("#editbatchID").val(all.batch_id);
            $("#editbatchNAME").val(batch_name);
            $("#edit_day").val(all.day);
            $("#edit_startTime").val(all.start_time);
            $("#edit_endTime").val(all.end_time);
            if (all.status == 'on') {
                $('#on').prop('checked', true);
            }
            else if (all.status == 'off') {
                $('#off').prop("checked", true);
            }
            $("#editClassInRoutineModal").modal('show');
        },
        cache:false
        });
}



function add_routine(id,name) {
    // alert(id+name);
    $("#batchID").val(id);
    $("#batchNAME").val(name);
    $("#add_day").val(null);
    $("#add_startTime").val(null);
    $("#add_endTime").val(null);
    $("#AddClassInRoutineModal").modal('show');
}



function routine(id,name) {
    var formdata = new FormData();
    formdata.append("id",id);
    formdata.append("name",name);
    formdata.append("routine_page","routine_page");
    $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"data.php",
    success:function(data)
    {
        $("#main_contents").html(data);
    },
    cache:false
    });
}




function delete_notice(id,batch_id,batch_name) {
    // alert(id+" "+batch_id+" "+batch_name);
    var formdata = new FormData();
    formdata.append("id",id);
    formdata.append("del_notice","del_notice");
    $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"data.php",
    success:function(data)
    {
        notice(batch_id,batch_name);
    },
    cache:false
    });
}




function write_notice(batchid,batchname){
    $("#batchname").val(batchname);
    $("#batchid").val(batchid);
    $("#notice_title").val(null);
    $("#notice_description").val(null);
    $("#AddNoticeModal").modal("show");
}



function notice(id,name) {
    var formdata = new FormData();
        formdata.append("id",id);
        formdata.append("name",name);
        formdata.append("notice_batch","notice_batch");
        $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            $("#main_contents").html(data);
        },
        cache:false
        });
}


function writeAboutBatch(id,name) {
    $("#text_about").slideUp();
    $("#write_about").slideDown();
    $("#close_write_about_batch").click(function(){
        $("#text_about").slideDown();
        $("#write_about").slideUp();
    });
    $("#save_about_batch").click(function(){
        var text_about_batch = $("#text_about_batch").val();
        var formdata = new FormData();
        formdata.append("id",id);
        formdata.append("name",name);
        formdata.append("text_about_batch",text_about_batch);
        formdata.append("save_about_batch","save_about_batch");
        $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            // alert(data);
            var all = JSON.parse(data);
            about(all.id,all.name);
        },
        cache:false
        });
    });
}


function about(id,name){
    var formdata = new FormData();
        formdata.append("id",id);
        formdata.append("name",name);
        formdata.append("about_batch","about_batch");
        $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            $("#main_contents").html(data).slideDown();
            $("#write_about").slideUp();
            $("#text_about").slideDown();
        },
        cache:false
        });
}



function DeleteBatch(id,name) {
    var del = confirm("are u sure to delete this batch?");
    if (del == true) {
        var formdata = new FormData();
        formdata.append("id",id);
        formdata.append("name",name);
        formdata.append("delete_batch","delete_batch");
        $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            location.reload();
        },
        cache:false
        });
    }
}




function ChangeBatchName(id,name){
    $("#change_batch_id").val(id);
    $("#change_batch_name").val(name);
    $("#ChangeBatchNameModal").modal('show');
}



function setting(id,name) {
    // alert(id+" "+name);
    var formdata = new FormData();
    formdata.append("id",id);
    formdata.append("name",name);
    formdata.append("setting_page","setting_page");
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            $("#main_contents").html(data);
        },
        cache:false
    });
}


// *** class project files start here ***


// function Add_project_File(){
//     var filebatchID = $("#filebatchID").val();
//     var filebatchNAME = $("#filebatchNAME").val();
//     var project_title = $("#project_title").val();
//     // var project_file = 
//     var project_description = $("#project_description").val();
//     // alert(bid+" "+filebatchNAME+" "+project_title+" "+project_file+" "+project_description);
//         var formdata = new FormData();
//         formdata.append("filebatchID",filebatchID);
//         formdata.append("project_title",project_title);
//         formdata.append("filebatchNAME",filebatchNAME);
//         formdata.append("project_file",$("#project_file")[0].files[0]);
//         formdata.append("project_description",project_description);
//         formdata.append("save_project_File","save_project_File");
//         $.ajax({
//         processData:false,
//         contentType:false,
//         data:formdata,
//         type:"post",
//         url:"data.php",
//         success:function(data)
//         {
//             // alert(data);
//             var all = JSON.parse(data);
//             project(all.id,all.name);
//             $("#AddProjectFileModal").modal('hide');
//         },
//         cache:false
//         });
// }


function addproject(id,name) {
    $("#filebatchID").val(id);
    $("#filebatchNAME").val(name);
    $("#project_title").val(null);
    $("#project_file").val(null);
    $("#project_description").val(null);
    $("#title_alert").hide();
    $("#file_alert").hide();
    $("#AddProjectFileModal").modal('show');
}



function project(id,name) {
    // alert(id+" "+name);
    var formdata = new FormData();
    formdata.append("id",id);
    formdata.append("name",name);
    formdata.append("project_page","project_page");
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            $("#main_contents").html(data);
        },
        cache:false
    });
}


// *** class project files end here ***



function edit_student_data(student_no,batch_no){
    // alert("student id = "+student_no+"  batch id = "+batch_no);
    var formdata = new FormData();
    formdata.append("student_no",student_no);
    formdata.append("batch_no",batch_no);
    formdata.append("edit_student_modal","edit_student_modal");
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            var row = JSON.parse(data);
            $("#update_hidden_student_id").val(row.id);
            $("#update_hidden_batch_id").val(row.batch_id);
            $("#update_name").val(row.name);
            $("#update_address").val(row.address);
            $("#update_contact").val(row.contact);
            $("#StudentEditModal").modal('show');
        },
        cache:false
    });
}


function delete_student_data(student_no,batch_no){
    // alert("student id = "+id+"  batch id = "+batch_id);
    var formdata = new FormData();
    formdata.append("batch_no",batch_no);
    formdata.append("student_no",student_no);
    formdata.append("delete_student_data","delete_student_data");
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            var batch_info = JSON.parse(data);
            students(batch_info.id,batch_info.batch_name);
        },
        cache:false
    });
}




function Student_register(batch_id){
    $("#add_batch_id").val(batch_id);
    $("#StudentAddModal").modal('show');
}



function students(batch_id,batch_name) {
    var formdata = new FormData();
    formdata.append("batch_id",batch_id);
    formdata.append("batch_name",batch_name);
    formdata.append("student_page","student_page");
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            $("#main_contents").html(data);
            $("#add_name").val(null);
            $("#add_contact").val(null);
            $("#add_address").val(null);
        },
        cache:false
    });
}





function CreateBatch(){
    $("#AddBatch").modal('show');
}


function save_batch(){
    var batch_name = $("#batch_name").val();
    var formdata = new FormData();
    formdata.append("batch_name",batch_name);
    formdata.append("save_batch","save_batch");
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            // alert(data);
            showbatch();
            $("#AddBatch").modal('hide');
        },
        cache:false
    });
}


function showbatch(){
    var formdata = new FormData();
    formdata.append("showbatch",showbatch);
    $.ajax({
        processData:false,
        contentType:false,
        data:formdata,
        type:"post",
        url:"data.php",
        success:function(data)
        {
            $("#batches").html(data);
            $("#batch_name").val(null);
        },
        cache:false
    });
}