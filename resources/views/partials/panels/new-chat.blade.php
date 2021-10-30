<div class="new-chat-container new-chat-container-js">
    <div class="new-chat-header d-flex justify-content-between align-items-center">
        <div class="new-chat-header-icon new-chat-back-button-js">
            <i class="fas fa-arrow-left"></i>
        </div>
        <div class="new-chat-header-text">
            Iniciar nuevo chat
        </div>
    </div>
    <div class="new-chat-search-container">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="prefixSearch">@</span>
            </div>
            <input id="searchNewChatInput" type="text" class="form-control" aria-describedby="prefixSearch"
                placeholder="Buscar por nombre">
        </div>
    </div>
    <div class="friends-list-container friends-list-container-js overflow-auto">
        @include('partials.friends-list')
    </div>    
</div>