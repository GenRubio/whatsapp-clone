const Utils = require("../objects/Utils");

const ConversationController = {
    chatPageEl: {
        selector: "#chat-page",
    },
    conversationItemEl: {
        selector: ".conversation-item-js"
    },
    conversationContainerEl:{
        selector: ".chat-messages-container-js"
    },
    messagesContainerEl: {
        selector: ".chat-friend-messages-js"
    },
    pendingMessagesEl:{
        selector: ".chat-item-unread-js"
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
        $(document).on('click', this.conversationItemEl.selector, (e) => {
            this.openConversation(e);
        });
    },
    openConversation(e){
        this.removeActiveFromConversationItems();
        let item = $(e.currentTarget);
        this.openConversationHandler(item);
        this.setConversationItemActive(item);
    },
    openConversationHandler(item){
        const $this = this;
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $(this.csrfToken.selector).attr("content"),
            },
            url: Utils.getUrl("openConversation"),
            method: "POST",
            data:{
                'friendCode': item.data('friend-code')
            },
            success:function(data){
                if (data.success){
                    $($this.conversationContainerEl.selector).html(data.content);
                    $this.scrollToEnd();
                    $this.removePendingMessages(item);
                }
            }
        })
    },
    removePendingMessages(item){
        let pendingMessagesContainer = item.find(this.pendingMessagesEl.selector);
        if (pendingMessagesContainer){
            $(pendingMessagesContainer).remove();
        }
    },
    scrollToEnd(){
        let container = $(this.messagesContainerEl.selector);
        container.scrollTop(container.height());
    },
    setConversationItemActive(item){
        item.addClass('selected');
    },
    removeActiveFromConversationItems(){
        $(this.conversationItemEl.selector).removeClass('selected');
    }
}

module.exports = ConversationController;