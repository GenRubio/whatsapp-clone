@foreach (getConversation($friend->id, 'asc') as $message)
    @if ($message->from_user == getUser()->id)
        @include('components.messages.user-message', [
        'message' => decryptMessageSender($message->message_sender),
        'hour' => getHourMessage($message->date)
        ])
    @else
        @include('components.messages.friend-message', [
        'message' => decryptMessageSender($message->message),
        'hour' => getHourMessage($message->date)
        ])
    @endif
@endforeach
