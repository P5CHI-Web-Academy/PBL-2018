// var scheduleDropdown = document.getElementById('container-schedule-drop');

// scheduleDropdown.onclick = function() {
//     dropdown_menu.style.display = "block";
// }


$('#container-schedule-drop').on('click', function (e) {
    e.stopPropagation();
});




// datepicker

$(document).ready(function() {
    $('#js-date').datepicker();
});



//change to WEEKS


function changeToPl() {
    document.getElementsByName('sel-dayweek')[0].options[0].innerHTML = "days";
    document.getElementsByName('sel-dayweek')[0].options[1].innerHTML = "weeks";
    document.getElementsByName('sel-dayweek')[0].options[2].innerHTML = "months";
}

function changeToSing() {
    document.getElementsByName('sel-dayweek')[0].options[0].innerHTML = "day";
    document.getElementsByName('sel-dayweek')[0].options[1].innerHTML = "week";
    document.getElementsByName('sel-dayweek')[0].options[2].innerHTML = "month";
}


$('#sel2').on('change', function () {
    if ($(this).val() == "s") {
        changeToPl();
    } else {
        changeToSing();
    }
});


$('#sel1').on('change', function () {
    if ($(this).val() == 'day') {
        texton.style.display = "none";
        daysweek_div.style.display = "none";
        month_div.style.display = "none";
        custom_div.style.display = "none";
        defined_div.style.display = "none";

    }
    if ($(this).val() == 'month') {
        texton.style.display = "block";
        daysweek_div.style.display = "none";
        month_div.style.display = "flex";
        custom_div.style.display = "flex";
        defined_div.style.display = "none";
    }
    if ($(this).val() == 'week') {
        texton.style.display = "block";
        daysweek_div.style.display = "block";
        month_div.style.display = "none";
        custom_div.style.display = "none";
        defined_div.style.display = "none";
    }
});


// multiple select

$('#daysweek').select2({
    placeholder: 'days of week'
    // var val = $select.data("select2");
    // val.opts.placeholder = "New placeholder text";
});

$('#datemonth').select2({
    placeholder: 'days of month'
});



// change to MONTHS

$('#select_custom_def').on('change', function () {

    if ($(this).val() == 'custom-select') {
        custom_div.style.display = "flex";
        defined_div.style.display = "none";
        // changetoPl2('sel-count-2');
    } else {
        // if ($(this).val() == 'pre-defined-select')
        custom_div.style.display = "none";
        defined_div.style.display = "flex";

    }
});

function changeToPl2(name) {
    document.getElementsByName(name)[0].options[0].innerHTML = "days";
    document.getElementsByName(name)[0].options[1].innerHTML = "weeks";
    document.getElementsByName(name)[0].options[2].innerHTML = "months";
}



