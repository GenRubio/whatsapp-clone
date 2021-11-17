@include('partials.panels.user-profile')
@include('partials.panels.notifications-profile')
@include('partials.panels.user-add-friend')
@include('partials.panels.new-chat')
@include('components.user-settings-container')
@include('components.chat-search')
<div class="conversations-list-container conversations-list-container-js overflow-auto">
    @include('partials.conversations-list', [
        'friends' => getChatsStarted()
    ])
</div>    