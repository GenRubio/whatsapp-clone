<div class="my-message d-flex justify-content-end w-100">
    <div class="my-message-container">
        {!! $message->message_sender !!}
        <span>
            {{ getHourMessage($message->date) }}
        </span>
    </div>
</div>
