<div class="chat-item-image-container">
    <div class="chat-item-image">
        @if ($friend->user->image)
            <img class="friend-profile-img-js" src="{{ asset($friend->user->image) }}">
        @else
            <img class="friend-profile-img-js" src="{{ asset(config('utils.config.default-avatar')) }}">
        @endif
    </div>
</div>
@php
$lastMessage = getLastMessage($friend->user->id);
@endphp
<div class="chat-item-content-container d-flex flex-wrap justify-content-between">
    <div class="chat-item-data">
        <div class="chat-item-name">
            {{ $friend->user->name }}
        </div>
        <div class="chat-item-message">
            @if ($lastMessage->from_user == getUser()->id)
                {{ decryptMessage($lastMessage->message_sender) }}
            @else
                {{ decryptMessage($lastMessage->message) }}
            @endif
        </div>
    </div>
    <div class="chat-item-end-data d-flex flex-wrap justify-content-end">
        <div class="chat-item-time">
            {{ getHourMessage($lastMessage->date) }}
        </div>
        @if (getNotReadMessages($friend->user->id) > 0)
            <div class="chat-item-unread chat-item-unread-js">
                {{ getNotReadMessages($friend->user->id) }}
            </div>
        @endif
    </div>
    <div class="chat-item-separator"></div>
</div>
