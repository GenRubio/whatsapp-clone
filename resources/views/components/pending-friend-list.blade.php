@forelse ($pendingFriendRequests as $friendRequest)
    @include('components.pending-friend-item', ['friendRequest' => $friendRequest])
@empty
    <div class="pending-friend-item-container d-flex justify-content-center align-items-center">
        <div>
            No tienes solicitudes pendientes.
        </div>
    </div>
@endforelse
