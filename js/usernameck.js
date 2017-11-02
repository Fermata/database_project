
$('#username').keyup(function() {

    var username = $(this).val();

    $('#username_status').text('Searching...');

    if(username != '' && username.length >=4) {
        $.post('username_check.php', {username: username}, function(data) {
            $('#username_status').text(data);
        });
    }else{
        $('#username_status').text('Username should have at least 3 characters.');
    }
});
