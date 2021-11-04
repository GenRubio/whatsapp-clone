const Utils = require("../objects/Utils");

const ChatController = {
    chatPageEl: {
        selector: "#chat-page",
    },
    conversationListContainerEl: {
        selector: ".conversations-list-container-js",
    },
    conversationContainerEl: {
        selector: ".conversation-friend-js",
    },
    containerEmptyChatsEl: {
        selector: ".conversations-list-container-empty",
    },
    conversationItemEl: {
        selector: ".conversation-item-js",
    },
    init() {
        if (!Utils.checkSection(this.chatPageEl.selector)) {
            return false;
        } else {
            this.setListeners();
        }
    },
    setListeners() {},
    makeNewOrUpdateChatUserMessage(friendCode) {
        const $this = this;
        let container = $(
            this.conversationItemEl.selector +
                '[data-friend-code="' +
                friendCode +
                '"]'
        ).length;

        $.ajax({
            url: Utils.getUrl("chatListUserSender"),
            method: "GET",
            data: {
                friendCode: friendCode,
                container: container ? true : false,
            },
            success: function (data) {
                if (data.success) {
                    if (container) {
                        let chatContainer = $this.getChatItemContainer(friendCode);
                        chatContainer.empty();
                        chatContainer.append(data.content);
                    } else {
                        $this.removeEmpyChatsContainer();
                        $($this.conversationListContainerEl.selector).append(
                            data.content
                        );
                    }
                }
            },
        });
    },
    getChatItemContainer(friendCode) {
        return $(
            this.conversationItemEl.selector +
                '[data-friend-code="' +
                friendCode +
                '"]'
        );
    },
    removeEmpyChatsContainer() {
        let container = $(this.containerEmptyChatsEl.selector);
        if (container) {
            container.remove();
        }
    },
};

module.exports = ChatController;
