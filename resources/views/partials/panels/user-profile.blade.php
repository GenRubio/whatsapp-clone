<div class="user-profile-container user-profile-container-js">
    <div class="user-profile-header d-flex justify-content-between align-items-center">
        <div class="user-profile-header-icon profile-back-button-js">
            <i class="fas fa-arrow-left"></i>
        </div>
        <div class="user-profile-header-text">
            Mi perfil
        </div>
    </div>
    <div class="user-profile-photo-container d-flex justify-content-center">
        <div class="user-profile-photo user-profile-photo-js">
            @if (getUser()->image)
                <img class="user-profile-img-js" src="{{ asset(getUser()->image) }}">
            @else
                <img class="user-profile-img-js" src="{{ asset(config('utils.config.default-avatar')) }}">
            @endif
        </div>
        <input type="file" id="profile-image-input-js" class="d-none" />
    </div>
    <div class="user-profile-data-container">
        <div class="user-profile-data-title">
            Tu nombre
        </div>
        <div class="user-profile-data-input">
            <div class="form-group">
                <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
            </div>
        </div>
    </div>
    <div class="user-profile-data-container">
        <div class="user-profile-data-title">
            Tu identificador
        </div>
        <div class="user-profile-data-input">
            <div class="form-group">
                <input type="text" class="form-control" value="{{ auth()->user()->friend_code }}" readonly>
            </div>
        </div>
    </div>
</div>
