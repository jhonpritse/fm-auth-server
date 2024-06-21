
var express = require("express");
var fs = require('fs');

var ComfyWeb = require( "webwebwebs" );

const WS_MODULE = require("ws");
const http = require("https");

const app = express();
app.use(express.static(__dirname + '/public'));


// ComfyWeb.Run( 4001, {
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