let slides = document.querySelectorAll(".slide");
let index = 0;

function showSlide() {
    slides.forEach(slide => slide.classList.remove("active"));
    slides[index].classList.add("active");

    index++;

    if (index >= slides.length) {
        index = 0;
    }
}

// change every 2 seconds
setInterval(showSlide, 2000);




let hero = document.querySelector(".hero");

let images = [
    "assets/images/banners/banner1.jpg",
    "assets/images/banners/banner2.jpg",
    "assets/images/banners/banner3.jpg"
    // "assets/images/banners/banner4.jpg"
];

let i = 0;

function changeHeroBackground() {
    hero.style.backgroundImage = `url('${images[i]}')`;

    i++;

    if (i >= images.length) {
        i = 0;
    }
}

// প্রথমে run করো
changeHeroBackground();

// প্রতি 3 সেকেন্ডে change
setInterval(changeHeroBackground, 3000);



// Timer

// Set deadline
let deadline = new Date("April 20, 2026 23:59:59").getTime();

let x = setInterval(function() {

    let now = new Date().getTime();
    let distance = deadline - now;

    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").innerHTML = days;
    document.getElementById("hours").innerHTML = hours;
    document.getElementById("minutes").innerHTML = minutes;
    document.getElementById("seconds").innerHTML = seconds;

    // When countdown finished
    if (distance < 0) {
        clearInterval(x);
        document.querySelector(".countdown").innerHTML = "🔥 Event Started!";
    }

}, 1000);





// group slider
    
let slider = document.querySelector(".group-slider");

setInterval(() => {
    slider.scrollLeft += 130;

    if (slider.scrollLeft >= slider.scrollWidth - slider.clientWidth) {
        slider.scrollLeft = 0;
    }
}, 2000);