// var scheduleDropdown = document.getElementById('container-schedule-drop');

// scheduleDropdown.onclick = function() {
//     dropdown_menu.style.display = "block";
// }



$('#myDropdown').on('hide.bs.dropdown', function (e) {
    var target = $(e.target);
    if(target.hasClass("keepopen") || target.parents(".keepopen").length){
        return false; // returning false should stop the dropdown from hiding.
    }else{
        return true;
    }
});


$(function() {
    $('input[name="date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: 2021
    }, 
    function(start, end, label) {
        var years = moment().diff(start, 'years');
    });
});