// Import the QRCode library
import QRCode from 'qrcode';

// Function to generate a QR code based on provided text
function generateQRCode(text) {
    let qrcode = new QRCode(document.getElementById("qrcode"), {
        text: text,
        width: 128,
        height: 128
    });
    return qrcode;
}