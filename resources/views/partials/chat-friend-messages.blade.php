<div class="chat-friend conversation-friend-js h-100" data-friend-code="{{ $friend->friend_code }}">
    <div class="chat-friend-header d-flex justify-content-between align-items-center border w-100">
        <div class="chat-friend-left-section d-flex align-items-center">
            <div class="chat-friend-image">
                @if ($friend->image)
                    <img class="friend-profile-img-js" src="{{ asset($friend->image) }}">
                @else
                    <img class="friend-profile-img-js" src="{{ asset(config('utils.config.default-avatar')) }}">
                @endif
            </div>
            <div class="chat-friend-info">
                <div class="chat-friend-name ml-3">
                    {{ $friend->name }}
                </div>
                <div class="chat-friend-status d-none">
                    Online
                </div>
            </div>
        </div>
        <div class="chat-friend-right-section d-flex">
        </div>
    </div>
    <div class="chat-friend-messages chat-friend-messages-js w-100 overflow-auto"
        style="background-image: url('{{ asset('/images/chat/background.png') }}')">
        @foreach (getConversation($friend->id) as $message)
            @if ($message->from_user == getUser()->id)
                @include('components.messages.user-message', [
                'message' => $message->message,
                'hour' => getHourMessage($message->date)
                ])
            @else
                @include('components.messages.friend-message', [
                'message' => $message->message,
                'hour' => getHourMessage($message->date)
                ])
            @endif
        @endforeach
    </div>
    <div class="chat-friend-sender border w-100">
        <div class="chat-friend-input h-100">
            <input id="input-message" type="text" data-friend-code="{{ $friend->friend_code }}"
                placeholder="Escribe un mensaje aquí">
        </div>
    </div>
</div>
