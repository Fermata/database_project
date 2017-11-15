$("#username").blur(function(){
    var username = $(this).val();
    if (username === '') {
        return;
    }
    if(username != '' && username.length >= 4) {
        $.post('username_check.php', {username: username}, function(data) {
            alert(data);
        });
    }else{
        alert('Username should have at least 3 characters.');
    }
});
