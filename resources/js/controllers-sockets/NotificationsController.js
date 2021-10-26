const Utils = require("../objects/Utils");

const NotificationsController = {
    chatPageEl:{
        selector: "#chat-page"
    },
    init(){
        if (!Utils.checkSection(this.chatPageEl.selector)) {
            return false;
        } else {
            this.setListeners();
        }
    },
    setListeners(){
        socket.on('friend-accept-request-' + userChannel,  (data) => {
            this.friendAcceptRequestHandler(data);
        });
    },
    friendAcceptRequestHandler(data){
        toastr.success(data.name + ": acepto la solicitud de amistad.");
    }
};

module.exports = NotificationsController;