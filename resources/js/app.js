import './bootstrap';
import { lottie } from "lottie-web";

lottie.loadAnimation({
    container:document.getElementById('my-lottie'),
    renderer:'svg',
    loop:true,
    autoplay:true,
    path:'~/Documents/E-Raport-Daaruttaqwa/public/img/404.json',
});
