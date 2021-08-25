document.addEventListener('DOMContentLoaded',function () {
    let index= document.getElementsByTagName('section')[0].children[0].children[0];
    let h1 =document.getElementsByTagName('section')[0].children[0].children[1];
    let pic =document.getElementsByTagName('section')[0].children[0].children[2];
    let text1 =document.getElementsByTagName('section')[0].children[0].children[3];
    let text2 =document.getElementsByTagName('section')[0].children[0].children[4];
    let text3 =document.getElementsByTagName('section')[0].children[0].children[5];
    let text4 =document.getElementsByTagName('section')[0].children[0].children[6];
    let text5 =document.getElementsByTagName('section')[0].children[0].children[7];
    let text6 =document.getElementsByTagName('section')[0].children[0].children[8];
    let text7 =document.getElementsByTagName('section')[0].children[0].children[9];
    let text8 =document.getElementsByTagName('section')[0].children[0].children[10];
    let text9 =document.getElementsByTagName('section')[0].children[0].children[11];
    let text10 =document.getElementsByTagName('section')[0].children[0].children[12];
    let text11 =document.getElementsByTagName('section')[0].children[0].children[13];
    let fLeft =document.querySelector('#left');
    let fRight =document.querySelector('#right');
    let burger = document.querySelector('#burger');
    let menuShow = document.querySelector('.menuShow');
    // let close = menuShow.children[0];
    // let home = menuShow.children[1].children[0];
    // let francekBtn = menuShow.children[1].children[1].children[0];
    // let francekDiv = menuShow.children[1].children[1];
    // let francekBio = menuShow.children[1].children[1].children[1];
    // console.log(francekBtn);
    let ext = 5;
    let control = false;

    console.log(fLeft);


    index.classList.add('anim1');
    h1.classList.add('anim2');
    setTimeout(function () {
        pic.classList.add('anim2')
    },800);

    // francekBtn.addEventListener('click', function () {
    //     if (control === false) {
    //         francekBtn.style.color='#FFFFFF';
    //         francekDiv.classList.add('menuAnim1');
    //         francekBio.classList.add('anim32');
    //         control = true;
    //     } else {
    //         francekBtn.style.color='#ABABAB';
    //         francekDiv.classList.add('menuAnim1Rev');
    //         francekBio.classList.add('anim32Rev');
    //         setTimeout(function () {
    //             francekBio.className='';
    //             francekDiv.className='';
    //         },1000);
    //         control = false;
    //     }
    // });

    burger.addEventListener('click', function () {
        menuShow.style.display='block';
        menuShow.classList.add('show')
    });

    // close.addEventListener('click',function () {
    //     menuShow.classList.remove('show');
    //     menuShow.style.display='none';
    //     menuShow.classList.add('menuShow')
    // });

    window.addEventListener('scroll',function () {
        if (window.pageYOffset >= 100) {
            text1.classList.add('anim3')
        }
        if (window.pageYOffset >= 400) {
            text2.classList.add('anim3')
        }if (window.pageYOffset >= 600) {
            text3.classList.add('anim3')
        }if (window.pageYOffset >= 800) {
            text4.classList.add('anim3')
        }if (window.pageYOffset >= 1100) {
            text5.classList.add('anim3')
        }if (window.pageYOffset >= 1200) {
            text6.classList.add('anim3');
            text7.classList.add('anim3')
        }if (window.pageYOffset >= 1600) {
            text8.classList.add('anim3')
        }if (window.pageYOffset >= 1700) {
            text9.classList.add('anim3')
        }if (window.pageYOffset >= 1800) {
            text10.classList.add('anim3');
            text11.classList.add('anim3')
        }if (window.pageYOffset >= 2700) {
            text11.classList.add('anim3')
        }
        if (window.pageYOffset >= 2094) {
            fLeft.classList.add('anim5');
            fRight.classList.add('anim11')
        }

    })

});