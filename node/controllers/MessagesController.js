const MessagesController = {
    socket: null,
    io: null,
    init(io, socket) {
        this.io = io;
        this.socket = socket;
        this.setListeners();
    },
    setListeners() {
        const $this = this;
        this.socket.on("messages", (data) => {
            const item = JSON.parse(data);
            switch (item.channel) {
                case "send-message-to-friend":
                    $this.sendMessageToFriend(item);
                    break;
            }
        });
    },
    sendMessageToFriend(item) {
        const response = {
            friendCode: item.userCode,
            message: item.message
        };
        this.io.emit("receive-friend-message-" + item.uid, response);
    },
};

module.exports = MessagesController;
