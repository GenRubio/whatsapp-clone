@if ($user && $user->name != auth()->user()->name)
    <div class="search-friend-item-container d-flex justify-content-between align-items-center">
        <div class="search-friend-item-image-container">
            <div class="search-friend-item-image">
                <img src="{{ asset('/images/avatars/pp.jpg') }}">
            </div>
        </div>
        <div class="search-friend-item-content-container d-flex flex-wrap justify-content-between align-items-center">
            <div class="search-friend-item-data">
                <div class="search-friend-item-name">
                    {{ $user->name }}
                </div>
            </div>
            <div class="search-friend-item-end-data d-flex flex-wrap justify-content-end">
                @php
                    $friendStatus = friendSearchStatus($user->id);
                @endphp
                <button class="{{ $friendStatus ? 'disabled' : 'add-new-friend-button-js' }} btn btn-success w-100"
                    data-code="{{ $user->friend_code }}">
                    @if ($friendStatus)
                        {{ $friendStatus }}
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
