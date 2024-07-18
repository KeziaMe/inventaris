import "./bootstrap";

import Dropzone from "dropzone";
Dropzone.autoDiscover = false;

// Inisialisasi Dropzone
document.addEventListener("DOMContentLoaded", function () {
    new Dropzone("#tinydash-dropzone", {
        url: document
            .querySelector("#tinydash-dropzone")
            .getAttribute("action"),
        paramName: "textNota",
        maxFilesize: 2, // MB
        acceptedFiles: "image/*",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        init: function () {
            this.on("success", function (file, response) {
                window.location.href = "/path/to/your/success/page";
            });
            this.on("error", function (file, response) {
                console.log(response);
            });
        },
    });
});
