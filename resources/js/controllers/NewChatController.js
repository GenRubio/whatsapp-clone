const Utils = require("../objects/Utils");
const ConversationController = require('./ConversationController');

const NewChatController = {
    chatPageEl: {
        selector: "#chat-page",
    },
    itemChatEl:{
        selector: ".chat-item-container-js"
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
        ConversationController.openConversationHandler(item);
        this.setChatItemActive(item);
    },
    setChatItemActive(item){
        item.addClass('selected');
    },
    removeActiveFromChatItems(){
        $(this.itemChatEl.selector).removeClass('selected');
    }
};

module.exports = NewChatController;
