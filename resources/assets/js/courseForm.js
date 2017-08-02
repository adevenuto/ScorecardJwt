// THIS CONTROLS THE COUNTRY/STATE/AND CITIES SELECT INPUTS
function ajaxCall() {
    this.send = function(data, url, method, success, type) {
        type = type || 'json';
        var successRes = function(data) {
            success(data);
        }
        var errorRes = function(e) {
            console.log(e);
            alert("Error found \nError Code: " + e.status + " \nError Message: " + e.statusText);
        }
        $.ajax({
            url: url,
            type: method,
            data: data,
            success: successRes,
            error: errorRes,
            dataType: type,
            timeout: 60000
        });
    }
}
function locationInfo() {
    var rootUrl = "http://scorecard.dev";
    var call = new ajaxCall();
    this.getCities = function(id) {
        $(".cities option:gt(0)").remove();
        var url = rootUrl + '/getcities/' + id;
        var method = "post";
        var data = {};
        $('.cities').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            $('.cities').find("option:eq(0)").html("Select City");
            if (data) {
                $.each(data, function(i, city) {
                    var option = $('<option />');
                    option.attr('value', city.id).text(city.name);
                    $('.cities').append(option);
                });
                $(".cities").prop("disabled", false);
            } else {
                alert(data.msg);
            }
        });
    };
    this.getStates = function(id) {
        $(".states option:gt(0)").remove();
        $(".cities option:gt(0)").remove();
        var url = rootUrl + '/getstates/' + id;
        var method = "post";
        var data = {};
        $('.states').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            $('.states').find("option:eq(0)").html("Select State");
            if (data) {
                $.each(data, function(i, state) {
                    var option = $('<option />');
                    option.attr('value', state.id).text(state.name);
                    $('.states').append(option);
                });
                $(".states").prop("disabled", false);
            } else {
                alert(data.msg);
            }
        });
    };
    this.getCountries = function() {
        var url = rootUrl + '/getcountries';
        var method = "post";
        var data = {};
        $('.countries').find("option:eq(0)").html("Please wait..");
        call.send(data, url, method, function(data) {
            $('.countries').find("option:eq(0)").html("Select Country");
            if (data) {
                $.each(data, function(i, country) {
                    var option = $('<option />');
                    option.attr('value', country.id).text(country.name);
                    $('.countries').append(option);
                });
                $(".countries").prop("disabled", false);
            } else {
                alert(data.msg);
            }
        });
    };
}
$(function() {
    var loc = new locationInfo();
    loc.getCountries();
    $(".countries").on("change", function(ev) {
        var countryId = $(this).val()
        if (countryId != '') {
            loc.getStates(countryId);
        } else {
            $(".states option:gt(0)").remove();
        }
    });
    $(".states").on("change", function(ev) {
        var stateId = $(this).val()
        if (stateId != '') {
            loc.getCities(stateId);
        } else {
            $(".cities option:gt(0)").remove();
        }
    });
});
// THIS CREATES THE HOLE INPUTS (based on user selection)
$(function() {
    var holes = 0;
    var teeSelection;
    function appendHoles(attr) {
        var template = $('.'+attr).clone();
        var targetDiv = $('.holes');
        if (holes>=9) {
            for (i=1;i<=holes;i++) {
               targetDiv.append(template);
            }
        } else {
            // I need to validate course_holes here....
            // $('#courseCreation').validate().$('.'+attr);
        }
    }
    $('.tee-box').on('click', function() {
        teeSelection = $(this).attr('data-tee-box');
        appendHoles(teeSelection);
        
    })
    $('#course_holes').on('change', function() {
        holes = $(this).val();
        console.log(holes);
    })
});
















