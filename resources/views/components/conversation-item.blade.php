<div class="chat-item-container chat-item-container-js d-flex justify-content-between align-items-center"
    data-friend-channel="">
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
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem libero incidunt, eius illum soluta
                est autem temporibus nihil explicabo molestiae molestias inventore ea vel? Reprehenderit asperiores
                mollitia explicabo sapiente quis?
            </div>
        </div>
        <div class="chat-item-end-data d-flex flex-wrap justify-content-end">
            <div class="chat-item-time">
                7:55
            </div>
            <div class="chat-item-unread d-none">
                50
            </div>
        </div>
        <div class="chat-item-separator"></div>
    </div>
</div>
