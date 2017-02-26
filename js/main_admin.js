jQuery(document).ready(
    function($) {
        // check url and see if access token is present
        var url = window.location.hash;
        var accessToken = url.split("=");
        console.log(accessToken[0]);
        if(accessToken[0] == '#access_token') {
            // Instagram access token found
            console.log($('.access-token'));
            $('.access-token').val(accessToken[1]);
        }
    }
);