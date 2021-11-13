const Utils = require("../objects/Utils");

const MeController = {
    chatPageEl: {
        selector: "#chat-page",
    },
    conversationListContainerEl: {
        selector: ".conversations-list-container-js",
    },
    conversationItemEl: {
        selector: ".conversation-item-js",
    },
    init() {
        if (!Utils.checkSection(this.chatPageEl.selector)) {
            return false;
        } else {
            this.reorderChatsByLastMessageDate();
        }
    },
    reorderChatsByLastMessageDate() {
        let container = $(this.conversationListContainerEl.selector);
        let chats = $(this.conversationItemEl.selector);
        chats
            .sort(function (a, b) {
                a = parseFloat($(a).attr("data-last-message-date"));
                b = parseFloat($(b).attr("data-last-message-date"));
                return a > b ? -1 : a < b ? 1 : 0;
            })
            .each(function () {
                container.prepend(this);
            });
    },
};

module.exports = MeController;
