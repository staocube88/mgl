var Registration = function () {

    return {
        
        //Registration Form
        initRegistration: function () {
	        // Validation       
	        $("#sky-form4").validate({                   
	            // Rules for form validation
	            rules:
	            {
	                username:
	                {
	                    required: true,
	                   	minlength: 6,
	                    maxlength: 20
	                },
	                email:
	                {
	                    required: true,
	                    email: true
	                },



	                mobile:
	                {
	                    required: true
	                },



	                address:
	                {
	                    required: true
	                },



	                city:
	                {
	                    required: true
	                },



	                post:
	                {
	                    required: true
	                },



	                country:
	                {
	                    required: true
	                },


	                month:
	                {
	                    required: true
	                },



	                day:
	                {
	                    required: true
	                  
	                },



	                year:
	                {
						required: true
						
	                },


	                refname:
	                {
	                    required: true
	                },


	                position:
	                {
	                    required: true
	                },



	                password:
	                {
	                    required: true,
	                    minlength: 6,
	                    maxlength: 20
	                },
	                passwordConfirm:
	                {
	                    required: true,
	                    minlength: 6,
	                    maxlength: 20,
	                    equalTo: '#password'
	                },
	                firstname:
	                {
	                    required: true
	                },
	                lastname:
	                {
	                    required: true
	                },
	                terms:
	                {
	                    required: true
	                }
	            },
	            
	            // Messages for form validation
	            messages:
	            {
	                login:
	                {
	                    required: 'Please enter your login'
	                },
	                email:
	                {
	                    required: 'Please enter your email address',
	                    email: 'Please enter a VALID email address'
	                },
	                mobile:
	                {
	                    required: 'Please enter your Mobile Number'
	                },
	                password:
	                {
	                    required: 'Please enter your password'
	                },
	                passwordConfirm:
	                {
	                    required: 'Please enter your password one more time',
	                    equalTo: 'Please enter the same password as above'
	                },
	                firstname:
	                {
	                    required: 'Please select your first name'
	                },
	                lastname:
	                {
	                    required: 'Please select your last name'
	                },
	                terms:
	                {
	                    required: 'You must agree with Terms and Conditions'
	                }
	            },                  
	            
	            // Do not change code below
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });
        }

    };
}();