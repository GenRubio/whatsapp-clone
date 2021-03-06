@if ($user && $user->name != auth()->user()->name)
    <div class="search-friend-item-container d-flex justify-content-between align-items-center">
        <div class="search-friend-item-image-container">
            <div class="search-friend-item-image">
                @if ($user->image)
                    <img class="user-profile-img-js" src="{{ asset($user->image) }}">
                @else
                    <img class="user-profile-img-js" src="{{ asset(config('utils.config.default-avatar')) }}">
                @endif
            </div>
        </div>
        <div class="search-friend-item-content-container d-flex flex-wrap justify-content-between align-items-center">
            <div class="search-friend-item-data">
                <div class="search-friend-item-name">
                    {{ $user->name }}
                </div>
            </div>
            <div class="search-friend-item-end-data d-flex flex-wrap justify-content-end">
                <button class="{{ $status ? 'disabled' : 'add-new-friend-button-js' }} btn btn-success w-100"
                    data-code="{{ $user->friend_code }}">
                    @if ($status)
                        {{ $status }}
                    @else
                        <i class="fas fa-user-plus"></i> Add
                    @endif
                </button>
            </div>
        </div>
    </div>
@else
    <div class="search-friend-item-container d-flex justify-content-center align-items-center">
        <div>
            No se ha encontrado ningun resultado.
        </div>
    </div>
@endif
