const FormLoginController = require("./controllers/FormLoginController");
const UserSettingsController = require('./controllers/UsetSettingsController');
const FormRegisterController = require('./controllers/FormRegisterController');
const SearchFriendController = require('./controllers/SearchFriendController');
const MakeFriendController = require('./controllers/MakeFriendController');
const NotificationsController = require('./controllers/NotificationsController');
const ProfileImageController = require('./controllers/ProfileImageController');
const NewChatController = require('./controllers/NewChatController');
const MessagesController = require('./controllers/MessagesController');
const ConversationController = require('./controllers/ConversationController');
const SocketNotificationsController = require('./controllers-sockets/NotificationsController');
const SocketMessagesController = require('./controllers-sockets/MessagesController');

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
        ConversationController.init();
        SocketNotificationsController.init();
        SocketMessagesController.init();
    },
};

module.exports = ViewHandler;
