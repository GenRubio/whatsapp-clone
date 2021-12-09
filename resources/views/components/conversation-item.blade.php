<div class="chat-item-container conversation-item-js d-flex justify-content-between align-items-center"
    data-friend-code="{{ $friend->user->friend_code }}">
    @include('components.conversation-item-content', [
        'lastMessage' => getLastMessage($friend->user->id),
        'notReadMessages' => getNotReadMessages($friend->user->id)
    ])
</div>
