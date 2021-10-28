<div class="chat-friends-user-settings-container d-flex justify-content-between">
    <div class="user-settings-image-container">
        <div class="user-settings-image user-settings-image-js">
            @if (getUser()->image)
                <img class="user-profile-img-js" src="{{ asset(getUser()->image) }}">
            @else
                <img class="user-profile-img-js" src="{{ asset(config('utils.config.default-avatar')) }}">
            @endif
        </div>
    </div>
    <div class="user-settings-options-container d-flex justify-content-end align-items-center">
        <div class="user-settings-add-user user-settings-add-user-js">
            <i class="fas fa-user-plus"></i>
        </div>
        <div class="user-settings-bell user-settings-bell-js">
            <i class="far fa-bell"></i>
            <div class="bell-messages-count-js">
                @include('components.bell-count-messages', [
                'pendingFriendRequests' => count(pendingFriendRequest())
                ])
            </div>
        </div>
        <div class="user-settings-out user-settings-out-js">
            <i class="fas fa-sign-out-alt"></i>
        </div>
    </div>
</div>
