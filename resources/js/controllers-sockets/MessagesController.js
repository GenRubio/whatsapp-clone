const Utils = require("../objects/Utils");

const MessagesController = {
    chatPageEl: {
        selector: "#chat-page",
    },
    conversationEl: {
        selector: ".conversation-friend-js",
    },
    messagesContainerEl: {
        selector: ".chat-friend-messages-js",
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
        socket.on("receive-friend-message-" + userChannel, (data) => {
            this.addMessageToConversation(data);
        });
    },
    addMessageToConversation(data) {
        let conversation = $(
            this.conversationEl.selector +
                '[data-friend-code="' +
                data.friendCode +
                '"]'
        ).length;
        if (conversation) {
            const $this = this;
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $(this.csrfToken.selector).attr("content"),
                },
                url: Utils.getUrl("receiveMessage"),
                method: "POST",
                data: {
                    message: data.message,
                },
                success: function (data) {
                   $($this.messagesContainerEl.selector).append(data.content);
                   $this.scrollToEnd();
                },
            });
        }
    },
    scrollToEnd(){
        let container = $(this.messagesContainerEl.selector);
        container.scrollTop(container.height());
    },
};

module.exports = MessagesController;
