@foreach ($pendingFriendRequests as $friendRequest)
    @include('components.pending-friend-item', ['friendRequest' => $friendRequest])
@endforeach
@if (count(pendingFriendRequest()) == 0)
    <div class="pending-friend-item-container d-flex justify-content-center align-items-center">
        <div>
            No tienes solicitudes pendientes.
        </div>
    </div>
@endif
