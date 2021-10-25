<div class="user-notifications-container user-notifications-container-js">
    <div class="user-notifications-header d-flex justify-content-between align-items-center">
        <div class="user-notifications-header-icon notifications-back-button-js">
            <i class="fas fa-arrow-left"></i>
        </div>
        <div class="user-notifications-header-text">
            Notificaciones
        </div>
    </div>
    <div class="user-notifications-content">
        <div class="user-notifications-title">
            Solicitudes de amistad
        </div>
        <hr>
        <div class="notification-list-js">
            @include('components.pending-friend-list', ['pendingFriendRequests' => pendingFriendRequest()])
        </div>
    </div>
</div>
