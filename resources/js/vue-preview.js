const { default: Axios } = require("axios");
img = document.getElementById('image').value;
// TOASK: chiedi conto di questa soluzione a prof/tutor
console.log(img);
var app = new Vue({
    el: '#edit',
    data: {
        previewImage: ''
    },
    mounted() {
        this.previewImage = img;
    }
    
});