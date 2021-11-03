@foreach (getConversation($friend->id, 'asc') as $message)
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
