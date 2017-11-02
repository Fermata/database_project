
$('#confirmpassword').keyup(function() {
    var password = $('#password').val();
    var confirmpassword = $('#confirmpassword').val();

    if (password != confirmpassword)
        $('#password_match').text('Passwords do not match.');
    });
    else
        $('#password_match').text('Passwords match');
});
