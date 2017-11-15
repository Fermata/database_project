$('#password').submit(function() {
    var password = $(this).val();
    if (password === '') {
        return false;
    }
    if(password.length < 8){
        alert('Password should be at least 8 characters.');
        return false;
    }
});
$('#confirmpassword').submit(function() {
    var password = $('#password').val();
    var confirmpassword = $('#confirmpassword').val();
    if (confirmpassword === '') {
        return false;
    }
    if (password != confirmpassword){
        alert('Passwords do not match.');
        return false;
    }
});
