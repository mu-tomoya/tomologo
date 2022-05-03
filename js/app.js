import { gsap } from "../node_modules/gsap";
import { ScrollTrigger } from 'gsap/ScrollTrigger'

gsap.registerPlugin(ScrollTrigger)

if (window.innerWidth > 780) {
  gsap.fromTo(".card-thumbnail",
    {
      opacity: 0,
      y: -10
    },
    {
      delay: 1,
      duration: 1.5,
      opacity: 1,
      y: 0,
      ease: "power2.out",
      // 複数要素を扱うプロパティ
      stagger: {
        from: "start",
        amount: 2 
      }
    });
} else {
  document.querySelectorAll(".card").forEach((item) => {
    gsap.fromTo(item,
    {
      autoAlpha:0,
      y:-10
    },
    {
      delay: 0.3,
      duration: 1,
      autoAlpha: 1,
      y: 0,
      ease: "power2.out",
      scrollTrigger: {
        trigger:item,
        start:"top center",
        toggleActions: "play none none reverse"
      }
    }); 
  })
}
  