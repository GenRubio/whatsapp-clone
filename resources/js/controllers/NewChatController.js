const Utils = require("../objects/Utils");

const NewChatController = {
    chatPageEl: {
        selector: "#chat-page",
    },
    itemChatEl:{
        selector: ".chat-item-container"
    },
    conversationContainerEl:{
        selector: ".chat-messages-container-js"
    },
    messagesContainerEl: {
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
        $(document).on('click', this.itemChatEl.selector, (e) => {
            this.openNewConversation(e);
        });
    },
    openNewConversation(e){
        this.removeActiveFromChatItems();
        let item = $(e.currentTarget);
        this.openConversationHandler(item);
        this.setChatItemActive(item);
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
                }
            }
        })
    },
    scrollToEnd(){
        let container = $(this.messagesContainerEl.selector);
        container.scrollTop(container.height());
    },
    setChatItemActive(item){
        item.addClass('selected');
    },
    removeActiveFromChatItems(){
        $(this.itemChatEl.selector).removeClass('selected');
    }
};

module.exports = NewChatController;
