<div class="chat-item-container chat-item-container-js d-flex justify-content-between align-items-center"
    data-friend-code="{{ $friend->user->friend_code }}">
    <div class="chat-item-image-container">
        <div class="chat-item-image">
            @if ($friend->user->image)
                <img class="friend-profile-img-js" src="{{ asset($friend->user->image) }}">
            @else
                <img class="friend-profile-img-js" src="{{ asset(config('utils.config.default-avatar')) }}">
            @endif
        </div>
    </div>
    <div class="chat-item-content-container d-flex flex-wrap justify-content-between">
        <div class="chat-item-data">
            <div class="chat-item-name">
                {{ $friend->user->name }}
            </div>
            <div class="chat-item-message">
                ...
            </div>
        </div>
        <div class="chat-item-end-data d-flex flex-wrap justify-content-end">
            <div class="chat-item-time">
            </div>
            <div class="chat-item-unread d-none">
            </div>
        </div>
        <div class="chat-item-separator"></div>
    </div>
</div>
