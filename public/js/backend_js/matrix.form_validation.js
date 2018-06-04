$(document).ready(function(){
    $("#current_pwd").keyup(function(){
        var current_pwd = $("#current_pwd").val();

        $.ajax({
            type:'get',
            url:'/admin/check-pwd',
            data:{current_pwd:current_pwd},
            success:function(resp){

                if(resp=="false"){
                    $("#chkPwd").html("<font color='red'>Current Password is Incorrect</font>");
                }else if(resp=="true"){
                    $("#chkPwd").html("<font color='green'>Current Password is Correct</font>");
                }
            },error:function(){
                alert("Error");
            }
        });
    });

    $("#country_id").change(function(){
      //  var countryid = $("#country_id").val();
        var op ="";
        var countryid = $(this).val();
        var div =$(this).parent();
       // alert(countryId);return false;
        $.ajax({
            type:'get',
            url:'/admin/get_city',
            data:{countryid:countryid},
            success:function(data){
               // console.log(data.length);
                op+='<option value="0" selected disabled> Choose City</option>';
                for(var  i=0;i<data.length;i++)
                {
                    op+='<option value="'+data[i].id+'">'+data[i].ctName+'</option>';
                }
              //  alert(op);
                div.find('#city_id').html("");
                $('#city_id').html(op);
             //   console.log(resp.length);
               // $("#city_id").html(resp);

            },error:function(){
                alert("Error");
            }
        });
    });

    $('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#add_country").validate({
		rules:{
            cnt_name:{
				required:true
			},
            cnt_name_arb:{
				required:true

			},
            currency:{
				required:true

			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
    $("#add_category").validate({
        rules:{
            cat_name:{
                required:true
            },
            cat_name_arb:{
                required:true

            },
            url:{
                required:true,
                url:true

            },
            description:{
                required:true

            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });
    $("#add_city").validate({
        rules:{
            city_name:{
                required:true
            },
            city_name_arb:{
                required:true

            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });
    $("#add_area").validate({
        rules:{
            area_name:{
                required:true
            },
            area_name_arb:{
                required:true

            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
            new_pwd:{
                required: true,
                minlength:6,
                maxlength:20
            },
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});


    $("#edit_country").validate({
        rules:{
            cnt_name:{
                required:true
            },
            cnt_name_arb:{
                required:true

            },
            currency:{
                required:true

            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });
    $("#update_profile").validate({
        rules:{
            first_name:{
                required: true

            },
            last_name:{
                required: true

            },
            email:{
                required:true,
                email:true

            },
            phone:{
                required: true,
                minlength:8,
                maxlength:13
            }
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
            $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).parents('.control-group').removeClass('error');
            $(element).parents('.control-group').addClass('success');
        }
    });
	$(".country").click(function(){

		if(confirm('Are you sure want to delete this country?'))
		{
			return true;
		}
		return false;
	});
    $(".city").click(function(){

        if(confirm('Are you sure want to delete this city?'))
        {
            return true;
        }
        return false;
    });
    $(".area").click(function(){

        if(confirm('Are you sure want to delete this area?'))
        {
            return true;
        }
        return false;
    });
});
