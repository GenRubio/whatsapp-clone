@forelse($friends as $friend)
    @include('components.chat-item', ['friend' => $friend])
@empty
    <div class="friends-list-container-empty d-flex justify-content-center align-items-center">
        <div>
            No se ha encontrado ningun resultado.
        </div>
    </div>
@endforelse
