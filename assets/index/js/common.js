window.onscroll = function() {
    var t = document.documentElement.scrollTop || document.body.scrollTop;
    var scrollup = document.getElementById('header-bg');
    var scrollup2 = document.getElementById('special');
    var scrollup3 = document.getElementById('special2');
    if (t > 0) {
        scrollup.classList.add('scroll')
        scrollup2.classList.add('bg')
        scrollup3.classList.add('bg')

    } else { //恢复正常
        scrollup.classList.remove('scroll')
        scrollup2.classList.remove('bg')
        scrollup3.classList.remove('bg')
    }
}