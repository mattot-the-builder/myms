import './bootstrap'
import 'flowbite'
import AOS from 'aos'
import 'aos/dist/aos.css' // You can also use <link> for styles

import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()
// ..
AOS.init()
