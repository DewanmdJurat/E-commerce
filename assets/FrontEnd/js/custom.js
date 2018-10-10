$().ready(function(){

//chekcout Register form validate
	$('#registerForm').validate({
		rules:{
			firstName:{
				required:true,
				minlength:4,
			},
			lastName:{
				required:true,
				minlength:4,
			},			
			customerEmail:{
				required:true,
				email:true,
				remote:{
					url:'email/check',
					type:'post',
				},
			},
			password:{
				required:true,
				minlength:8,
			},
			phoneNumber:{
				required:true,
				minlength:11,
				maxlength:11
			},
			city:{
				required:true,
			},
			district:{
				required:true,
			},
			address:{
				required:true,
			},
			
		},
		messages:{
			firstName:{
				required:"Please Enter Your Name",
				minlength:"Please Enter Atleast 4 characturer",
			},
			lastName:{
				required:"Please Enter Your Name",
				minlength:"Please Enter Atleast 4 characturer",
			},
			email:{
				required:"Please enter email address",
				email:"Please enter validate E-mail address",
				remote:"E-mail is already exit",
			},
			mobile_naumber:{
				required:"Please Enter Your Mobile Number",
				minlength:"Please Enter 11 Digits Mobile Number",
				maxlength:"Please Enter  11 Digits Mobile Number",
			},
			password:{
				minlength:"Please Enter Atleast 8 characturer",
			},

		}
	});
	$('#shippingform').validate({
		rules:{
			fullName:{
				required:true,
				minlength:8,
			},		
			customerEmail:{
				required:true,
				email:true,
			},
			password:{
				required:true,
				minlength:8,
			},
			phoneNumber:{
				required:true,
				minlength:11,
				maxlength:11
			},
			city:{
				required:true,
			},
			district:{
				required:true,
			},
			address:{
				required:true,
			},
			
		},
		messages:{
			firstName:{
				required:"Please Enter Your Name",
				minlength:"Please Enter Atleast 4 characturer",
			},
			lastName:{
				required:"Please Enter Your Name",
				minlength:"Please Enter Atleast 4 characturer",
			},
			email:{
				required:"Please enter email address",
				email:"Please enter validate E-mail address",
			},
			mobile_naumber:{
				required:"Please Enter Your Mobile Number",
				minlength:"Please Enter 11 Digits Mobile Number",
				maxlength:"Please Enter  11 Digits Mobile Number",
			},
			password:{
				minlength:"Please Enter Atleast 8 characturer",
			},

		}
	});
});