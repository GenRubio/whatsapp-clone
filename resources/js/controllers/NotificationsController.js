const Utils = require("../objects/Utils");

const NotificationsController = {
    chatPageEl: {
        selector: "#chat-page",
    },
    cancelFriendRequestEl:{
        selector: ".remove-friend-request-js"
    },
    acceptFriendRequestEl: {
        selector: ".accept-friend-request-js"
    },
    bellEl:{
        selector: ".bell-messages-count-js"
    },
    requestsFriendListEl: {
        selector: ".notification-list-js"
    },
    csrfToken: {
        selector: 'meta[name="csrf-token"]'
    },
    init() {
        if (!Utils.checkSection(this.chatPageEl.selector)) {
            return false;
        } else {
            this.setListeners();
        }
    },
    setListeners() {
        $(document).on('click', this.cancelFriendRequestEl.selector, (e) => {
            this.cancelFriendHandler(e);
        });
    },
    cancelFriendHandler(e){
        const $this = this;
        const item = $(e.currentTarget);
        this.disableButtons();

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $(this.csrfToken.selector).attr("content"),
            },
            url: Utils.getUrl("removeFriendRequest"),
            method: "POST",
            data: {
                code: item.data('code')
            },
            success:function(data){
                $($this.requestsFriendListEl.selector).html(data.content);
                $($this.bellEl.selector).html(data.bell);
            }
        });
    },
    disableButtons(){
        $(this.cancelFriendRequestEl.selector).attr('disabled', true);
        $(this.acceptFriendRequestEl.selector).attr('disabled', true);
    }
};

module.exports = NotificationsController;