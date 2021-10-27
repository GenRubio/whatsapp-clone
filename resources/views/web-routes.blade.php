window.routes = {
    'home': "{!! route('home') !!}",
    'homeLogin': "{!! route('home.login') !!}",
    'logOut': "{!! route('settings.logOut') !!}",
    'homeRegister': "{!! route('home.register') !!}",
    'searchFriend': "{!! route('search.friend') !!}",
    'friendSendRequest': "{!! route('friend.send.request') !!}",
    'acceptFriendRequest': "{!! route('accept.friend.request') !!}",
    'removeFriendRequest': "{!! route('remove.friend.request') !!}",
    'notificationsReload': "{!! route('notifications.reload') !!}"
}