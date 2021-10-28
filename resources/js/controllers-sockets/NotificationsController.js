const Utils = require("../objects/Utils");
const Notifications = require('../controllers/NotificationsController');

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

        socket.on('friend-send-request-' + userChannel, (data) => {
            this.friendSendRequestHandler(data);
        });
    },
    friendSendRequestHandler(data){
        toastr.info(data.name + " te envio una solicitud de amistad.");
        Notifications.reloadNotificationsContent();
    },
    friendAcceptRequestHandler(data){
        toastr.info(data.name + " acepto la solicitud de amistad.");
    }
};

module.exports = NotificationsController;