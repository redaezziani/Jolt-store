import 'trix';
import 'trix/dist/trix.css';
import './datepicker.js'
import './dashboard.js'

import './bootstrap';
// import './libs/trix';
import 'preline';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger);
// Ensure GSAP is loaded before this script runs
document.addEventListener('DOMContentLoaded', function () {
    // Title animation
    gsap.from("#hero-title", {
        opacity: 0,
        y: 50,
        duration: 1,
        ease: "power2.out"
    });

    // Description animation with delay
    gsap.from("#hero-description", {
        opacity: 0,
        y: 50,
        duration: 1,
        delay: 0.5,
        ease: "power2.out"
    });

    // Button animation with delay
    gsap.from("#hero-button button", {
        opacity: 0,
        y: 50,
        duration: 1,
        delay: 1,
        ease: "power2.out",
        onComplete: function() {
            // Optional: Add a little bounce effect to the button after it appears
            gsap.to("#hero-button button", {
                scale: 1.05,
                duration: 0.2,
                yoyo: true,
                repeat: 1
            });
        }
    });
});
