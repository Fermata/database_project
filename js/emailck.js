$('#email').blur(function() {
    var email = $('#email').val();
    if(email != '') {
        $.post('email_check.php', {email: email}, function(data) {
            alert(data);
        });
    }
});
