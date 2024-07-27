import './bootstrap';
import 'preline';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);

const title = document.querySelector('#title');
const description = document.querySelector('#description');
const shopButton = document.querySelector('#shopButton');
const navbar = document.getElementById('nav-bar');
const itemLinks = document.querySelectorAll('.item-link');

// GSAP animations for title and description
gsap.from(title, {
    duration: 1,
    y: 20,
    opacity: 0,
    ease: 'expo.inOut',
    delay: 1
});

gsap.from(description, {
    duration: 1,
    y: 20,
    opacity: 0,
    ease: 'expo.inOut',
    delay: 1.4
});

gsap.from(shopButton, {
    duration: 1,
    y: 200,
    opacity: 0,
    ease: 'expo.inOut',
    scale: 0.8,
    delay: 1.6
});
