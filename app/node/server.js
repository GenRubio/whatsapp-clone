const express = require("express");
const app = express();
const server = require("http").createServer(app);
const SocketHandler = require('./SocketHandler');

const io = require("socket.io")(server, {
    cors: { origin: "*" },
});
server.listen(3000, () => {
    console.log("Socket server is running.");
    SocketHandler.init(io);
});