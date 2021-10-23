const FormLoginController = require("./controllers/FormLoginController");
const UserSettingsController = require('./controllers/UsetSettingsController');
const FormRegisterController = require('./controllers/FormRegisterController');

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
    },
};

module.exports = ViewHandler;
