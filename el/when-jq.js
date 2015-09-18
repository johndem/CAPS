function date () {
    var selected = document.getElementById('date');
    var value = selected.options[selected.selectedIndex].value;
    if (value === "onetime") {
     $('#onetime').addClass('current');
     $('#onetime').toggle(700);
    }
    else {
        $('.current').toggle(300);
        $('.current').removeClass('current');
    }
}