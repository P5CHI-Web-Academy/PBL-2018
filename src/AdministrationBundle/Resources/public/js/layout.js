$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
        trigger : 'hover'
    });
    $('[data-toggle="tooltip').on('click', function () {
        $(this).tooltip('hide');
        $("#DeleteUserModal").modal();
    
    });
    trigger : 'hover'   
});

function appearUserInfo() {
    var userInfo = document.getElementById('user-info');    
    if (userInfo.style.display == "block") { 
        userInfo.style.display = "none";
    }
    else { 
        userInfo.style.display = "block";
    }
}



// $(document).ready(function(){
//     $('[data-toggle=tooltip]').tooltip({ trigger: "hover" });
// });