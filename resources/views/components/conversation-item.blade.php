<div class="chat-item-container conversation-item-js d-flex justify-content-between align-items-center"
    data-friend-code="{{ $friend->user->friend_code }}"
    data-last-message-date="{{ getMessageTimestamp(getLastMessage($friend->user->id)->date) }}">
    @include('components.conversation-item-content')
</div>
