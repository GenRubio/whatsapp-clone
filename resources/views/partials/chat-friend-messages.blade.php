<div class="chat-friend h-100">
    <div class="chat-friend-header d-flex justify-content-between align-items-center border w-100">
        <div class="chat-friend-left-section d-flex align-items-center">
            <div class="chat-friend-image">
                <img src="{{ asset(config('utils.config.default-avatar')) }}">
            </div>
            <div class="chat-friend-info">
                <div class="chat-friend-name ml-3">
                    Gen
                </div>
                <div class="chat-friend-status d-none">
                    Online
                </div>
            </div>
        </div>
        <div class="chat-friend-right-section d-flex">

        </div>
    </div>
    <div class="chat-friend-messages w-100"
        style="background-image: url('{{ asset('/images/chat/background.png') }}')">
    </div>
    <div class="chat-friend-sender border w-100">
        <div class="chat-friend-input h-100">
            <input type="text" placeholder="Escribe un mensaje aquí">
        </div>
    </div>
</div>
