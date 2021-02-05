jQuery(document).ready(function ()
{
    jQuery('select[name="doctor_id"]').on('change',function(){
        $('#doctor_error').hide();
        var doctorId = jQuery(this).val();
        var date = $('#date').val();
        if(!date){
            $('#date_error').empty();
            $('#date_error').append('Please select the date first');
            return false;
        }
        if(doctorId && date)
        {
            $('#date_error').hide();
            callRecordAjax(doctorId, date)

        }
        else
        {
            $('select[name="record_id"]').empty();
            $('select[name="record_id"]').append('<option value="">Please Select</option>');
        }
    });

    jQuery('#date').on('change',function() {
        $('#date_error').hide();
        var date = jQuery(this).val();
        var docId = $('#doctor_id').val();
        if(!docId){
            $('select[name="record_id"]').empty();
            $('select[name="record_id"]').append('<option value="">Please Select</option>');
            $('#doctor_error').empty();
            $('#doctor_error').append('Please select the doctor');
            return false;
        }else{
            $('#doctor_error').hide();
            callRecordAjax(docId, date)
        }
    });

    $('select[name="user_id"]').on('change', function () {
        var guestUserId = $(this).val();
        $.ajax({
           url : '/dashboard/user-details/'+ guestUserId,
           type : "GET",
           dataType: "json",
           success:function (response) {
                if(response.status == true){
                    $("#title").val(response.data.title);
                    $("#first_name").val(response.data.first_name);
                    $("#last_name").val(response.data.last_name);
                }
           },
           error:function () {

           }
        });
    });

});

function callRecordAjax(docId, date) {
    jQuery.ajax({
        url : '/doctor-records/' +docId+'/'+ date,
        type : "GET",
        dataType : "json",
        success:function(response)
        {
            if(response.status == true) {
                jQuery('select[name="record_id"]').empty();
                jQuery.each(response.data, function (key, value) {
                    $('select[name="record_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            }else{
                $('select[name="record_id"]').empty();
                $('select[name="record_id"]').append('<option value="">Please Select</option>');
            }
        }
    });
}

// $(document).ready(function() {
//     $(document).on('change', '.appointment_id', function() {
//         var doctor_id =  $(this).val();
//
//         var a = $(this).parent();
//
//         console.log("Its Change !");
//
//         var op = "";
//
//         $.ajax({
//             type: 'get',
//             url: '/admin/appointments/findDoctorName',
//             data: { 'id': doctor_id },
//             dataType: 'json',      //return data will be json
//             success: function(data) {
//                 // console.log("price");
//                 console.log(data.registred_company_name);
//
//                 a.find('.id').val(data.id);
//                 // do you want to display id or registration name?
//             },
//             error:function(){
//
//             }
//         });
//     });
// });
// $(document).ready(function () {
//     $("#patient_id").change(function () {
//         var patient_id=$(this).val();
//         $("#patient_id").val(patient_id);
//     });
//
// });


// function callRecordAjax(date) {
//     jQuery.ajax({
//         url : '/doctor-according-to-date/'+ date,
//         type : "GET",
//         dataType : "json",
//         success:function(response)
//         {
//             // if(response.status == true) {
//             //     jQuery('select[name="record_id"]').empty();
//             //     jQuery.each(response.data, function (key, value) {
//             //         $('select[name="record_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
//             //     });
//             // }else{
//             //     $('select[name="record_id"]').empty();
//             //     $('select[name="record_id"]').append('<option value="">Please Select</option>');
//             // }
//
//             console.log(response);
//         }
//     });
// }

// callRecordAjax('2019-12-21');