const SocketHandler = {
    init(io) {
        this.setListeners(io);
    },
    setListeners(io) {
        io.on("connection", socket => {
           socket.on("notification", data => {
               const item = JSON.parse(data);
               const response = {
                   name: item.name
               }
               io.emit('friend-accept-request-' + item.uid, response);
           })
        });
    }
};

module.exports = SocketHandler;
