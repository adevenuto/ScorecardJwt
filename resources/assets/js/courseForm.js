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
// $(function() {
//     var holes = $('select[name=course_holes]').val();
//     var teeSelection;
//     var targetDiv = $('#holes');
//     function appendHoles(attr) {
//         targetDiv.empty();
//         var teeBox = attr.replace(/_/g," ");
//         var holesInput = $('select[name=course_holes]');
//         var teeSelection = "<div class='tee-box caps'>"+teeBox+"</div>";
        
//         if (holes>=27) {
//             var loopCount = (holes/9); 
//             targetDiv.append(teeSelection); 
//             while (loopCount > 0) {
//                 for (i=1;i<=(9);i++) {
//                     var hole =  (i===1 ? "<input type='text' class='form-control input-sm' name='nine_hole_name' placeholder='Name of this group of holes'>": "") +
//                                 "<div class='input-group input-group-sm hole'>" +
//                                     "<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>" +
//                                     "<input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter hole length' required>" +
//                                 "</div>";
//                     targetDiv.append(hole);
//                 };
//                 loopCount--;
//             };     
            
//         } else if (holes>=9) {
//             targetDiv.append(teeSelection);
//             for (i=1;i<=holes;i++) {
//                 var hole =  "<div class='input-group input-group-sm hole'>" +
//                                 "<span class='input-group-addon' id='sizing-addon3'>Hole: "+i+"</span>" +
//                                 "<input type='text' class='form-control num-only' maxLength='3' name='"+attr+"[]' aria-describedby='sizing-addon3' placeholder='Enter hole length' required>" +
//                             "</div>";
//                 targetDiv.append(hole);
//             };
//         } else {
//             // validate course_holes field here...w/jqueryvalidate library
//             holesInput.valid();
//             // reset tee-box selection when 'number of holes' is not selected
//             selectInputDefault('tee-box');
//         }
//     };
//     $('#tee-box').on('change', function(e) {
//         if(this.value==="") {
//             targetDiv.empty();
//         } else {
//             teeSelection = $(this).val();
//             appendHoles(teeSelection);
//         }
//     })
//     $('#course_holes').on('change', function() {
//         holes = $(this).val();
//         targetDiv.empty();
//         // reset tee-box selection when 'number of holes' is not selected
//         selectInputDefault('tee-box');
//     })
//     function selectInputDefault(selectInputId) {
//         $("#"+selectInputId+" "+"option").prop('selected', function() {
//             return this.defaultSelected;
//         });
//     }
// });

















