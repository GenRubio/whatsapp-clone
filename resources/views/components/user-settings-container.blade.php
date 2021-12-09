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
        <div class="user-settings-new-chat user-settings-new-chat-js">
            <i class="far fa-comment-alt" data-toggle="tooltip" data-placement="bottom" title="New chat"></i>
        </div>
        <div class="user-settings-add-user user-settings-add-user-js">
            <i class="fas fa-user-plus" data-toggle="tooltip" data-placement="bottom" title="Add friend"></i>
        </div>
        <div class="user-settings-bell user-settings-bell-js">
            <i class="far fa-bell" data-toggle="tooltip" data-placement="bottom" title="Notifications"></i>
            <div class="bell-messages-count-js">
                @include('components.bell-count-messages', [
                'pendingFriendRequests' => count(getUser()->pendingRequest)
                ])
            </div>
        </div>
        <div class="user-settings-out user-settings-out-js">
            <i class="fas fa-sign-out-alt" data-toggle="tooltip" data-placement="bottom" title="Logout"></i>
        </div>
    </div>
</div>
