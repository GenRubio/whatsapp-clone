const NotificationsController = require("./controllers/NotificationsController");
const MessagesController = require("./controllers/MessagesController");

const SocketHandler = {
    init(io) {
        this.setListeners(io);
    },
    setListeners(io) {
        io.on("connection", (socket) => {
            NotificationsController.init(io, socket);
            MessagesController.init(io, socket);
        });
    },
};

module.exports = SocketHandler;
