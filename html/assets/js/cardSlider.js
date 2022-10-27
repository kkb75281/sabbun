const sliderWrap = document.querySelector(".cardSlider__wrap");               // 전체 이미지 슬라이드
const sliderImg = document.querySelector(".cardSlider__img");                 // 보여지는 영역
const sliderInner = document.querySelector(".cardSlider__inner");             // 움직이는 영역
const slider = document.querySelectorAll(".cardSlider");                      // 이미지

let currentIndex = 0,
    sliderLength = slider.length,
    sliderWidth = slider[0].offsetWidth,
    sliderFirst = slider[0],                    // 첫번째 이미지
    sliderLast = slider[sliderLength -1],       // 마지막 이미지
    cloneFirst = sliderFirst.cloneNode(true),   // 첫번째 이미지 복사
    cloneLast = sliderLast.cloneNode(true),     // 마지막 이미지 복사
    dotIndex = "",
    interval = 2000,
    sliderTimer = "";

    function init(){
    imgClone();         // 이미지 복사
    autoPlay();
}
init();

function autoPlay(){
    sliderTimer = setInterval(() => {
        let intervalNum = currentIndex + 1;
        gotoSlider(intervalNum);
    }, interval)
}
function stopPlay(){
    clearInterval(sliderTimer);
}
function imgClone(){
    sliderInner.appendChild(cloneFirst);
    sliderInner.insertBefore(cloneLast, sliderFirst);
}

function gotoSlider(index){
    sliderInner.classList.add("transition");
    let posInitial = sliderInner.offsetLeft;    // -600
    sliderInner.style.left = -sliderWidth * (index + 1) + "px";
    currentIndex = index;
}
function checkIndex(){
    sliderInner.classList.remove("transition");
    // 마지막 이미지
    if(currentIndex == sliderLength){
        sliderInner.style.left = -(1 * sliderWidth) + "px";
        currentIndex = 0;
    }
    // 처음 이미지
    if(currentIndex == -1){
        sliderInner.style.left = -(sliderLength * sliderWidth) + "px";
        currentIndex = sliderLength - 1;
    }
}

sliderInner.addEventListener("mouseenter", stopPlay);
sliderInner.addEventListener("mouseleave", autoPlay);
sliderInner.addEventListener("transitionend", checkIndex);