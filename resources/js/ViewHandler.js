const FormLoginController = require("./controllers/FormLoginController");
const UserSettingsController = require('./controllers/UsetSettingsController');
const FormRegisterController = require('./controllers/FormRegisterController');
const SearchFriendController = require('./controllers/SearchFriendController');
const MakeFriendController = require('./controllers/MakeFriendController');
const NotificationsController = require('./controllers/NotificationsController');
const SocketNotificationsController = require('./controllers-sockets/NotificationsController');

const ViewHandler = {
    init(data) {
        this.outdatedBrowserRework = data.outdatedBrowserRework;

        document.addEventListener("DOMContentLoaded", () => {
            this.onDocumentReady();
        });
    },
    onDocumentReady() {
        FormLoginController.init();
        UserSettingsController.init();
        FormRegisterController.init();
        SearchFriendController.init();
        MakeFriendController.init();
        NotificationsController.init();
        SocketNotificationsController.init();
    },
};

module.exports = ViewHandler;
