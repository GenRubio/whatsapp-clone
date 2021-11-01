@forelse(getChatsList() as $friend)
    @include('components.conversation-item', ['friend' => $friend])
@empty
<div class="conversations-list-container-empty d-flex justify-content-center align-items-center">
    <div>
        No se ha encontrado ningun resultado.
    </div>
</div>
@endforelse