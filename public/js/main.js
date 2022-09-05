// NAVBAR
const toggle = document.querySelector('.toggle');
const nav = document.querySelector('.body-content .side-bar');

toggle.addEventListener('click', function() {
    nav.classList.toggle('slide');
});

const span2 = document.querySelector('.navbar span:nth-child(1)');
toggle.addEventListener('click', function(){
    span2.classList.toggle('span-1');
})

const span3 = document.querySelector('.navbar span:nth-child(2)');
toggle.addEventListener('click', function(){
    span3.classList.toggle('span-2');
})

const span4 = document.querySelector('.navbar span:nth-child(3)');
toggle.addEventListener('click', function(){
    span4.classList.toggle('span-3');
})


// SIDEBAR - Accordion
$(document).ready(function() {
    // toggle sub menu
    $('.sub-btn').click(function(){
        $(this).next('.sub-menu').slideToggle();
        $(this).find('.dropdown').toggleClass('rotate');
    });
});