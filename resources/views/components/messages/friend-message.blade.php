<div class="friend-message d-flex justify-content-start w-100">
    <div class="friend-message-container">
        {{ decryptMessage($message->message) }}
        <span>
            {{ getHourMessage($message->date) }}
        </span>
    </div>
</div>