<div class="my-message d-flex justify-content-end w-100">
    <div class="my-message-container">
        <div>
            {!! decryptMessage(nl2br(e($message->message_sender), false)) !!}
        </div>
        <span>
            {{ getHourMessage($message->date) }}
        </span>
    </div>
</div>
