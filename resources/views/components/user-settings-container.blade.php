<div class="chat-friends-user-settings-container d-flex justify-content-between">
    <div class="user-settings-image-container">
        <div class="user-settings-image user-settings-image-js">
            <img src="{{ asset('/images/avatars/pp.jpg') }}">
        </div>
    </div>
    <div class="user-settings-options-container d-flex justify-content-end align-items-center">
        <div class="user-settings-add-user user-settings-add-user-js">
            <i class="fas fa-user-plus"></i>
        </div>
        <div class="user-settings-bell user-settings-bell-js">
            <i class="far fa-bell"></i>
            @if (count(pendingFriendRequest()) > 0)
                <div class="bell-messages-count">
                    {{ count(pendingFriendRequest()) }}
                </div>
            @endif

        </div>
        <div class="user-settings-out user-settings-out-js">
            <i class="fas fa-sign-out-alt"></i>
        </div>
    </div>
</div>
