document.getElementById('departure').addEventListener('change', take_departure);
document.getElementById('formbranch').addEventListener('submit', check_fill_branch);
change_disabled("disabled");

function take_departure(){
    alert("sdf");
}

function change_disabled(value){
    $("#destination_station").attr("disabled", value);
    $("#destination_station_input").attr("disabled", value);
    $("#length").attr("disabled", value);
}


function check_fill_branch(e) {
    document.getElementById("departure").addEventListener('onchange', )

    if (document.getElementById('length').value === '') {
        e.preventDefault();
        alert("Заполните поле \'Протяженность\'");
        document.getElementById('length').focus();
        return false;
    }
    var reg = x
}
