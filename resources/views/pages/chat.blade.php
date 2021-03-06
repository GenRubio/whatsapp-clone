<div id="chat-page">
    <div class="page-chat-container">
        <div class="chat-container-content d-flex">
            <div class="chat-friends-container">
                @include('partials.chat-friends-container')
            </div>
            <div class="chat-messages-container chat-messages-container-js h-100">
               @include('partials.chat-messages-preview')
            </div>
        </div>
    </div>
</div>

@include('socket-connection')
@include('auth-scripts')
@include('partials.modals.user-keys-modal')
