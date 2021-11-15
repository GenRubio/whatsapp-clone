@php
$conversationChat = getConversation($friend->id, 'asc');
@endphp
@foreach ($conversationChat as $key => $message)
    @if ($key == 0)
        @include('components.messages.date-separator', [
        'date' => $message->date
        ])
    @else
        @if (getDateMessages($message->date) > getDateMessages($conversationChat[$key - 1]->date))
            @include('components.messages.date-separator', [
            'date' => $message->date
            ])
        @endif
    @endif
    @if ($message->from_user == getUser()->id)
        @include('components.messages.user-message', [
        'message' => decryptMessage($message->message_sender),
        'hour' => getHourMessage($message->date)
        ])
    @else
        @include('components.messages.friend-message', [
        'message' => decryptMessage($message->message),
        'hour' => getHourMessage($message->date)
        ])
    @endif
@endforeach
