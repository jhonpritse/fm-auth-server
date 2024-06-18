﻿var express = require("express");
const WS_MODULE = require("ws");
var fs = require('fs');

var ComfyWeb = require( "webwebwebs" );
//const http = require("http");
const http = require("https");

const app = express();
app.use(express.static(__dirname + '/public'));

app.get("/hello", (req, res) => {
    res.send("hello world");
});

// ComfyWeb.Run( 443, {
//     domain: "auth.thepocketportal.com",
//     email: "pfpmanila@gmail.com"
// } );

const server = http.createServer({
    key: fs.readFileSync('auth.thepocketportal.com_production_privkey.pem'),
    cert: fs.readFileSync('auth.thepocketportal.com_production_cert.pem')
},app);

ws = new WS_MODULE.Server({server});

server.listen(process.env.PORT, () => {
    console.log("Authentication Server turned on, port number:" + process.env.PORT);
});