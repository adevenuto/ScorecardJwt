var v = $("#courseCreation").validate({
                              rules: {
                                course_name: {
                                  	required: true
                                },
                                course_address: {
                            		required: true
                                },
                                course_phone_number: {
                                	required: true
                                },
                                course_postal_code: {
                                	required: true
                                },
                                course_holes: {
                                	required: true
                                },
                                course_price: {
                                	required: true
                                },
                                course_country: {
                                	required: true
                                },
                                course_state: {
                                	required: true
                                },
                                course_city: {
                                	required: true
                                }
                              },
                              errorElement: "span",
                              errorClass: "help-inline",
                            });