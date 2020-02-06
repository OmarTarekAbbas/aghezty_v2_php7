    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = false;
    path_name = '';
    if (location.hostname === "localhost" || location.hostname === "127.0.0.1") {
        path_name = '/aghezty_v2_php7'
    }
    window.pusher = new Pusher('5d23f3205ec6864ac372', {
        cluster: 'eu',
        encrypted: true,
        authEndpoint: window.location.origin + path_name + '/broadcasting/auth',
        auth: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        },
        forceTLS: true
    });
