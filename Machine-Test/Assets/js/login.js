
$('#register_now').on('click', function(){
    /* $('#myModal').modal('show');*/
    var fullname     =   $('#fullname').val();
    var email        =   $('#email').val();
    var password     =   $('#o_password').val();
    var c_password   =   $('#c_password').val();
    var address      =   $('#address').val();
  
                if (password != c_password) { 
                    alert ("\nPassword did not match: Please try again...") 
                    return false; 
                }  else{ 
                     password = password; 
                     var dataString = {fullname:fullname,email:email,login:password,address:address};
                     $.ajax({
                         type: "POST",
                         url: root+'Welcome/new_user',
                         data:dataString,
                         dataType: "json",
                         success: function(result){
                             if(result.status == 'success'){
                                 alert('successfully registered');
                                 } else {
                                 alert(result.message);
                             }
                         }
                     });
                    return true; 
                } 
    
    
});
