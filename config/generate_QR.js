// Import the QRCode library
import QRCode from '/qrcodejs/qrcode.js';

// Function to generate a QR code based on provided text
function generateQRCode(text) {
    return new QRCode(document.getElementById("qrcode"), {
        text: text,
        width: 128,
        height: 128
    });
}