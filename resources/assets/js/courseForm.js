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
                    if (country.id === 231) {
                        option.prop('selected', true);
                    };
                    $('.countries').append(option);
                });
                $("#create-course-form option[value='231']").trigger('change');
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
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
///////////// HANDLE COURSE HOLE CREATION ///////////////////////
$(function() {
    // Toggle 'Hole Group Name' Option
    $('#holes-container').on('click', '.add-course-name-btn', function(){
        var parent = $(this).closest('.holes');
        var targetEl = parent.find('.course-name-input');
        targetEl.fadeToggle('fast');

    })
    // THIS CREATES THE HOLE INPUT FIELDS (based on user selection)
    var currentKey;
    var holesContainer = $('#holes-container'); 
    function generateRandomKey() {
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        var key = "";
        for( var i=0; i < 4; i++ ) {
            key += possible.charAt(Math.floor(Math.random() * possible.length));
        }
        currentKey = key;
    }
    function buildHolesForm(holeCount) {
        var courseId = $('#course-id').val();
        generateRandomKey();
        holesContainer.append(
            "<div class='col-sm-6'>"+
                "<form action='/course/"+courseId+"/create/holes' method='POST'>"+
                    "<div class='course-holes'>"+
                        "<div class='holes'>"+
                            "<input type='text' class='course-name-input' placeholder='Hole Group Name'>"+
                            "<div class='course-holes-header flex'>"+
                                "<span class='col-xs-4'>Hole #</span>"+
                                "<div class='col-xs-1'></div>"+
                                "<span class='col-xs-7'>Hole Length</span>"+
                                "<span class='add-course-name-btn b-rad3'>Course name</span>"+
                            "</div>"+
                            "<div class='hole-group-"+currentKey+"'>"+
                                // Individual holes rendered here
                            "</div>"+
                        "</div>"+
                    "</div>"+
                "</form>"+
            "</div>"   
        );
        var currentHoleGroup = $(".hole-group-"+currentKey);
        for (var i = 0; holeCount > i; i++) {
            currentHoleGroup.append(
                "<div class='hole flex'>"+
                    "<input type='text' name='hole_number' maxLength='2' value='"+(i+1)+"'class='col-xs-4 num-only' required>"+
                    "<div class='col-xs-1 text-center seperator'>-</div>"+
                    "<input type='text' name='hole_length' maxLength='3' class='col-xs-7 num-only' required>"+
                "</div>"
            )
        }
    }
    $('.hole-count').on('click', function(){   
        var holeCount = $(this).attr('data-hole-count');
        holeCount == '9' ? buildHolesForm(holeCount) : buildHolesForm(holeCount);
    })
    $('.create-holes-submit').on('click', function(){
        var forms = holesContainer.find('form');
        if (forms.length > 0) {
           forms.each(function(i, form){
            console.log($(form).serialize());
           })
        }
    })
});

















