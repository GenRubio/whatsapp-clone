const Utils = require("../objects/Utils");

const MessagesController = {
    chatPageEl: {
        selector: "#chat-page",
    },
    inputMessageEl: {
        selector: "#input-message",
    },
    messagesContainerEl:{
        selector: ".chat-friend-messages-js"
    },
    csrfToken: {
        selector: 'meta[name="csrf-token"]',
    },
    init() {
        if (!Utils.checkSection(this.chatPageEl.selector)) {
            return false;
        } else {
            this.setListeners();
        }
    },
    setListeners() {
        $(document).on("keyup", this.inputMessageEl.selector, (e) => {
            const item = $(e.currentTarget);
            if (e.keyCode == 13) {
                this.sendMessageHandler(item);
            }
        });
    },
    sendMessageHandler(item) {
        const $this = this;
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $(this.csrfToken.selector).attr("content"),
            },
            url: Utils.getUrl("sendMessage"),
            method: "POST",
            data: {
                'friendCode': item.data('friend-code'),
                'message': item.val()
            },
            success:function(data){
                if (data.success){
                    $this.addMessageToConversation(data.content);
                }
                $this.clearInputMessage();
            }
        })
    },
    addMessageToConversation(content){
        $(this.messagesContainerEl.selector).append(content);
    },
    clearInputMessage(){
        $(this.inputMessageEl.selector).val("");
    }
};

module.exports = MessagesController;
