var v = $("#courseCreation").validate({
                              rules: {
                                course_name: {
                                  required: true,
                                }

                              },
                              errorElement: "span",
                              errorClass: "help-inline",
                            });