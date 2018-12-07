

//before quitting page alert

$(window).bind('beforeunload', function(){
    return 'Changes will not be saved. Do you want to quit?';
});


$('#container-schedule-drop').on('click', function (e) {
    e.stopPropagation();
});

$('.mydropdown-menu-tags').on('click', function (e) {
    e.stopPropagation();
});



//tags

function selectTag(id) {
    if (document.getElementById(id).style.opacity == "0.5") {
        // var activeTagId = "active_" + id;
        // document.getElementById(activeTagId).style.display = "none";
        // document.getElementById('active_tags').innerHTML -= "<a href=\"#\" class=\"no-decoration-tags\"><button class=\"tag-id\" id=\"active_" + id + "\" onclick=\"selectTag(this.id); countClicksById(this.id)\">" + id + "</button></a>"
        document.getElementById(id).style.opacity = "1.0"
    } else {
        document.getElementById(id).style.opacity = "0.5";
        // document.getElementById('active_tags').innerHTML += "<a href=\"#\" class=\"no-decoration-tags\"><button class=\"tag-id\" id=\"active_" + id + "\" onclick=\"selectTag(this.id)\">" + id + "</button></a>"

    }
        // "<div class='active-tag-div'><a href='#' class='close-active-tags'><ion-icon class='close-icon-grey' name=\"close\"></ion-icon></a><span class=\"label label-primary active-tag\">"+ id +"</span></div>\n";
    // active_tags_text.style.display = "block";
    // no_active_tags.style.display = "none";
}



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
        $('#select_custom_def').val("custom-select");
        $(".drop-hidden-line-when-days").css("display","flex");
    }
    if ($(this).val() == 'week') {
        texton.style.display = "block";
        daysweek_div.style.display = "block";
        month_div.style.display = "none";
        custom_div.style.display = "none";
        defined_div.style.display = "none";
        $(".drop-hidden-line-when-days").css({"display":"flex!important"});
        $(".drop-hidden-line-when-days").css("display","flex");
    }
});


// multiple select

$('#daysweek').select2({
    placeholder: 'days of week'
});

$('#datemonth').select2({
    placeholder: 'days of month'
});



// change to MONTHS

$('#select_custom_def').on('change', function () {

    if ($(this).val() == 'custom-select') {
        custom_div.style.display = "flex";
        defined_div.style.display = "none";
    } else {
        custom_div.style.display = "none";
        defined_div.style.display = "flex";

    }
});

function changeToPl2(name) {
    document.getElementsByName(name)[0].options[0].innerHTML = "days";
    document.getElementsByName(name)[0].options[1].innerHTML = "weeks";
    document.getElementsByName(name)[0].options[2].innerHTML = "months";
}


//datepicker

$('#picker').datepicker({
    autoclose: true,
    mindate: 0
}).on('changeDate', function (selected) {
    var minDate = new Date(selected.date.valueOf());
    $('#picker2').datepicker('setStartDate', minDate);
});

$('#picker2').datepicker({
    autoclose: true
});




//preview modal

// var span = document.getElementsByClassName("close")[0];
var modal = document.getElementById('myModal');

$('#preview_icon').on('click', function (e) {
    modal.style.display = "block";
    // modalImg.src = this.src;
    // captionText.innerHTML = this.alt;
});

$(".close").onclick = function() {
    modal.style.display = "none";
};

modal.onclick = function() {
    modal.style.display = "none";
};



//checkbox

function endDateOnclick() {
    $(".checkbox-datepicker").prop('checked', true);
    $(".opacity-datepicker").css({"opacity":"1.0"});
}


$("#checkbox_datepicker").change(function() {
    if(!this.checked) {
        $(".opacity-datepicker").css({"opacity":"0.4"});
        $('#picker2').datepicker('setDate', null);
    } else {
        $(".opacity-datepicker").css({"opacity":"1.0"});
    }
});


















