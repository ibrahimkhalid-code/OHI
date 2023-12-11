let img = document.getElementById("home-img");
let imgs = ["img/11.jpg", "img/12.jpg", "img/13.jpg","img/14.jpg"];
let i = 0;



function slideshow() {
    img.setAttribute("src", imgs[i]);

    if (i == imgs.length-1) {
        i = 0;
    } else {
        i++;
    }
    setTimeout(function () {
        slideshow();
    },2000)
}

slideshow();


let headerList = document.getElementsByClassName("header-list .header-list-center");
let headerList2 = document.getElementsByClassName("header-list-center");
let btn = document.getElementById("btn-menu");
headerList.style.visibility = "visible";

