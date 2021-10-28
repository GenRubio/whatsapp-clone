const NotificationsController = require('./controllers/NotificationsController');

const SocketHandler = {
    init(io) {
        this.setListeners(io);
    },
    setListeners(io) {
        io.on("connection", (socket) => {
            NotificationsController.init(io, socket);
        });
    }
};

module.exports = SocketHandler;
