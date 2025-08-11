$(document).ready(function(){

    (function($) {
        "use strict";


    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "your name must consist of at least 2 characters"
                },
                subject: {
                    required: "Please enter a subject related to your email",
                    minlength: "your subject must consist of at least 4 characters"
                },
                phone: {
                    required: "Please enter your phone number",
                },
                email: {
                    required: "Please enter your email address"
                },
                message: {
                    required: "Please you have to write something to send this form.",
                    minlength: "thats all? really?"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"contact",

                    beforeSend:function(){
                        // $(document).find('span.error-text').text('');
                         $('#subBtn').prop('disabled',true);
                         $('#subBtn').css('cursor', 'not-allowed');
                         $('#subBtn').html('<span class="flex justify-center items-center">Message Sending... </span>');
                    },

                    success: function(data) {
                        $('#contactForm :input').attr('disabled', 'disabled');
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor','default');
                            $('#success').fadeIn()
                            $('.modal').modal('hide');
		                	$('#success').modal('show');

                            $('#subBtn').prop('disabled',false);
                            $('#subBtn').css('cursor', 'pointer');
                            $('#subBtn').html('<span class="flex justify-center items-center">Send </span>');

                            if(data == 1){

                                toastr.success("Your message has been sent successfully");
                                window.location.href = '';
                            }else{
                                toastr.error("An error occured, please try later");
                                // window.location.href = '';
                            }
                        })

                    },
                    error: function() {
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
		                	$('#error').modal('show');
                        })
                    }
                })
            }
        })
    })

 })(jQuery)
})
