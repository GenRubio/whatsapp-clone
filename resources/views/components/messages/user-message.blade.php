<div class="my-message d-flex justify-content-end w-100">
    <div class="my-message-container">
        <div>
            {!! decryptMessage($message->message_sender) !!}
        </div>
        <span>
            {{ getHourMessage($message->date) }}
        </span>
    </div>
</div>
