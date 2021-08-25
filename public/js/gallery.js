document.addEventListener('DOMContentLoaded',function () {
    let index= document.getElementsByTagName('section')[0].children[0].children[0];
    let h1 =document.getElementsByTagName('section')[0].children[0].children[1];

    let fLeft =document.querySelector('#left');
    let fRight =document.querySelector('#right');
    let burger = document.querySelector('#burger');
    let menuShow = document.querySelector('.menuShow');
    let close = menuShow.children[0];
    let home = menuShow.children[1].children[0];
    let francekBtn = menuShow.children[1].children[1].children[0];
    let francekDiv = menuShow.children[1].children[1];
    let francekBio = menuShow.children[1].children[1].children[1];
    let pics=document.querySelector('#pictures').querySelector('.container2').children;
    console.log(h1);
    let ext = 5;
    let control = false;
    let control2 = false;

    function showTeam(list) {
        if (control2 === false) {
            for (let i = 0; i < list.length; i++) {
                setTimeout(function () {
                    list[i].classList.add('anim3')
                }, (i * 200));
            }
        } else {
        }
        control2 = true;
    }


    index.classList.add('anim1');
    h1.classList.add('anim2');
    showTeam(pics);

    francekBtn.addEventListener('click', function () {
        if (control === false) {
            francekBtn.style.color='#FFFFFF';
            francekDiv.classList.add('menuAnim1');
            francekBio.classList.add('anim32');
            control = true;
        } else {
            francekBtn.style.color='#ABABAB';
            francekDiv.classList.add('menuAnim1Rev');
            francekBio.classList.add('anim32Rev');
            setTimeout(function () {
                francekBio.className='';
                francekDiv.className='';
            },1000);
            control = false;
        }
    });

    burger.addEventListener('click', function () {
        menuShow.style.display='block';
        menuShow.classList.add('show')
    });

    close.addEventListener('click',function () {
        menuShow.classList.remove('show');
        menuShow.style.display='none';
        menuShow.classList.add('menuShow')
    });

    window.addEventListener('scroll',function () {

        if (window.pageYOffset >= 100) {
            fLeft.classList.add('anim5');
            fRight.classList.add('anim11')
        }

    })

});