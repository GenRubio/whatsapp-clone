const FormLoginController = require("./controllers/FormLoginController");
const UserSettingsController = require('./controllers/UsetSettingsController');
const FormRegisterController = require('./controllers/FormRegisterController');
const SearchFriendController = require('./controllers/SearchFriendController');
const MakeFriendController = require('./controllers/MakeFriendController');
const NotificationsController = require('./controllers/NotificationsController');
const ProfileImageController = require('./controllers/ProfileImageController');
const NewChatController = require('./controllers/NewChatController');
const MessagesController = require('./controllers/MessagesController');
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
        ProfileImageController.init();
        NewChatController.init();
        MessagesController.init();
        SocketNotificationsController.init();
    },
};

module.exports = ViewHandler;
