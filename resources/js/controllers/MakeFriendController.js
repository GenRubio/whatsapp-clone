const Utils = require("../objects/Utils");

const MakeFriendController = {
    chatPageEl: {
        selector: "#chat-page",
    },
    addFriendButtonEl: {
        selector: ".add-new-friend-button-js",
    },
    csrfToke: {
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
        $(document).on("click", this.addFriendButtonEl.selector, (e) => {
            this.addFriendHandler(e);
        });
    },
    addFriendHandler(e) {
        const $item = this;
        const item = $(e.currentTarget);
        this.disableSendButton();

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $(this.csrfToke.selector).attr("content"),
            },
            url: Utils.getUrl("friendSendRequest"),
            method: "POST",
            data: {
                friendCode: item.data('code'),
            },
            success:function(data){
                if (data.success){
                    toastr.success(data.message);
                    $($item.addFriendButtonEl.selector).html('Pending');
                }
                else{
                    toastr.error(data.message);
                }
            }
        });
    },
    disableSendButton(){
        $(this.addFriendButtonEl.selector).attr('disabled', true);
    }
};

module.exports = MakeFriendController;
