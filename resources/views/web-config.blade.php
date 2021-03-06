window.routes = {
    'home': "{!! route('home') !!}",
    'homeLogin': "{!! route('home.login') !!}",
    'logOut': "{!! route('settings.logOut') !!}",
    'homeRegister': "{!! route('home.register') !!}",
    'searchFriend': "{!! route('search.friend') !!}",
    'friendSendRequest': "{!! route('friend.send.request') !!}",
    'acceptFriendRequest': "{!! route('accept.friend.request') !!}",
    'removeFriendRequest': "{!! route('remove.friend.request') !!}",
    'notificationsReload': "{!! route('notifications.reload') !!}",
    'uploadUserImg': "{!! route('upload.user.image') !!}",
    'openConversation': "{!! route('open.conversation') !!}",
    'sendMessage': "{!! route('send.message') !!}",
    'receiveMessage': "{!! route('receive.message') !!}",
    'chatListUserSender': "{!! route('chat.list.user') !!}",
    'homeTestRegister': "{!! route('home.test.register') !!}",
    'savePrivateKeys': "{!! route('save.private.keys') !!}",
    'chatSearch': "{!! route('chat.search') !!}"
}

window.views = {
    'spinner': `{!! view('components.spinners.load-messages')->render() !!}`
}

window.sounds = {
    newChat: "{{ asset('sound/new-chat.mp3') }}",
    openChat: "{{ asset('sound/open-chat.mp3') }}"
}