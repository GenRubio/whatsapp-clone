const SocketHandler = {
    io: null,
    init(io) {
        this.io = io;
        this.setListeners();
    },
    setListeners() {
        const $this = this;
        this.io.on("connection", (socket) => {
            socket.on("notification", (data) => {
                const item = JSON.parse(data);
                switch (item.channel) {
                    case "friend-accept-request":
                        $this.sendNotificationFriendAcceptRequest(item);
                        break;
                    case "friend-send-request":
                        $this.sendNotificationFriendSendRequest(item);
                        break;
                }
            });
        });
    },
    sendNotificationFriendSendRequest(item) {
        const response = {
            name: item.name,
        };
        this.io.emit("friend-send-request-" + item.uid, response);
    },
    sendNotificationFriendAcceptRequest(item) {
        const response = {
            name: item.name,
        };
        this.io.emit("friend-accept-request-" + item.uid, response);
    },
};

module.exports = SocketHandler;
