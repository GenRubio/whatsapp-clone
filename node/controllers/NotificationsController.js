
const NotificationsController = {
    socket: null,
    io: null,
    init(io, socket){
        this.io = io;
        this.socket = socket;
        this.setListeners();
    },
    setListeners(){
        const $this = this;
        this.socket.on("notification", (data) => {
            const item = JSON.parse(data);
            switch (item.channel) {
                case "friend-accept-request":
                    $this.friendAcceptRequest(item);
                    break;
                case "friend-send-request":
                    $this.friendSendRequest(item);
                    break;
            }
        });
    },
    friendSendRequest(item) {
        const response = {
            name: item.name,
        };
        this.io.emit("friend-send-request-" + item.uid, response);
    },
    friendAcceptRequest(item) {
        const response = {
            name: item.name,
        };
        this.io.emit("friend-accept-request-" + item.uid, response);
    },
};

module.exports = NotificationsController;
