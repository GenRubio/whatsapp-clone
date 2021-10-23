const SocketHandler = {
    init(io) {
        this.setListeners(io);
    },
    setListeners(io) {
        io.on("connection", socket => {
           
        });
    }
};

module.exports = SocketHandler;
