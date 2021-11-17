const Utils = require("../objects/Utils");

const SearchChatController = {
    chatPageEl: {
        selector: "#chat-page",
    },
    inputSearchEl:{
        selector: "#searchNewChatInput"
    },
    friendListContainerEl:{
        selector: ".friends-list-container-js"
    },
    init(){
        if (!Utils.checkSection(this.chatPageEl.selector)) {
            return false;
        } else {
            this.setListeners();
        }
    },
    setListeners(){
        $(document).on("keyup", this.inputSearchEl.selector, (e) => {
            this.searchChatHandler(e);
        });
    },
    searchChatHandler(e){
        e.preventDefault();
        const $this = this;
        const item = $(e.currentTarget);
        setTimeout(function(){
            $.ajax({
                url: Utils.getUrl("chatSearch"),
                method: "GET",
                data: {
                    value: item.val(),
                },
                success: function (data) {
                    $($this.friendListContainerEl.selector).html(
                        data.content
                    );
                },
            });
        }, 1000);
    }
};

module.exports = SearchChatController;