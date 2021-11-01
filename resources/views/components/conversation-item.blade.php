<div class="chat-item-container conversation-item-js d-flex justify-content-between align-items-center"
    data-friend-code="{{ $friend->friend_code }}" data-last-message-date="{{ getLastMessage($friend->id)->date }}">
    <div class="chat-item-image-container">
        <div class="chat-item-image">
            @if ($friend->image)
                <img class="friend-profile-img-js" src="{{ asset($friend->image) }}">
            @else
                <img class="friend-profile-img-js" src="{{ asset(config('utils.config.default-avatar')) }}">
            @endif
        </div>
    </div>
    <div class="chat-item-content-container d-flex flex-wrap justify-content-between">
        <div class="chat-item-data">
            <div class="chat-item-name">
                {{ $friend->name }}
            </div>
            <div class="chat-item-message">
                {{ getLastMessage($friend->id)->message }}
            </div>
        </div>
        <div class="chat-item-end-data d-flex flex-wrap justify-content-end">
            <div class="chat-item-time">
                {{ getHourMessage(getLastMessage($friend->id)->date) }}
            </div>
            @if (getNotReadMessages($friend->id) > 0)
                <div class="chat-item-unread chat-item-unread-js">
                    {{ getNotReadMessages($friend->id) }}
                </div>
            @endif
        </div>
        <div class="chat-item-separator"></div>
    </div>
</div>
