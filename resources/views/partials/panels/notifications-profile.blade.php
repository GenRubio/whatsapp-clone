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
        @if (count(pendingFriendRequest()) > 0)
            <div class="user-notifications-title">
                Solicitudes de amistad
            </div>
            <hr>
            @foreach (pendingFriendRequest() as $friendRequest)
                @include('components.pending-friend-item', ['friendRequest' => $friendRequest])
            @endforeach
        @else
            <div class="pending-friend-item-container d-flex justify-content-center align-items-center">
                <div>
                    No tienes solicitudes pendientes.
                </div>
            </div>
        @endif
    </div>
</div>
