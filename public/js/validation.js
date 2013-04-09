/* 
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
Title : validation.js
Author : Bobby Hazel
Description : used for client side validation on form elements
 - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
*/

$(function(){

    /*
    * Validation Library
    */

    $('.text_required').change(function(){
        var value = $(this).val();
        var msg = 'Required Field';
        if(value != ''){
            $(this).parents().removeClass('error').addClass('success');
        };
    });

    $('.email').change(function(){
        $(this).parent().removeClass('error');
        var value = $(this).val();
        var RegEx = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        validateInput(this,RegEx,value); 
    });
});


/*
* Function: validateInput();
* Recieves: The input object, a regular expression, and the value of the input object
*/

function validateInput(input,regEx,value){

    if(!regEx.test(value) && $(input).val()!=''){  
        $(input).parents().removeClass('success').addClass('error');               
    }else if(regEx.test(value) && $(input).val()!=''){   
        $(input).removeClass('invalid').addClass('valid').tooltip('destroy');            
    }else{
        $(input).removeClass('valid invalid').tooltip('destroy');
    }; 
    
};