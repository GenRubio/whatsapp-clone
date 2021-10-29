<div class="pending-friend-item-container d-flex justify-content-between align-items-center">
    <div class="pending-friend-item-image-container">
        <div class="pending-friend-item-image">
            @if ($friendRequest->image)
                <img class="user-profile-img-js" src="{{ asset($friendRequest->image) }}">
            @else
                <img class="user-profile-img-js" src="{{ asset(config('utils.config.default-avatar')) }}">
            @endif
        </div>
    </div>
    <div class="pending-friend-item-content-container d-flex flex-wrap justify-content-between align-items-center">
        <div class="pending-friend-item-data">
            <div class="pending-friend-item-name">
                {{ $friendRequest->name }}
            </div>
        </div>
        <div class="pending-friend-item-end-data d-flex flex-wrap justify-content-end">
            <div>
                <button type="button" class="remove-friend-request-js btn btn-danger mr-2"
                    data-code="{{ $friendRequest->friend_code }}">
                    <i class="fas fa-user-slash"></i>
                </button>
            </div>
            <div>
                <button type="button" class="accept-friend-request-js btn btn-success"
                    data-code="{{ $friendRequest->friend_code }}">
                    <i class="fas fa-user-plus"></i>
                </button>
            </div>
        </div>
    </div>
</div>
