@foreach (getConversation($friend->id, 'asc') as $message)
    @if ($message->from_user == getUser()->id)
        @include('components.messages.user-message')
    @else
        @include('components.messages.friend-message')
    @endif
@endforeach
