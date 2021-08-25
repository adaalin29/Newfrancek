document.addEventListener('DOMContentLoaded', function () {
    let fTitle = document.querySelector('#find');
    let join = document.querySelector('#join');
    let firstFace = document.querySelector('#firstFace');
    let blondFace = document.querySelector('#blondFace');
    let youngFace = document.querySelector('#youngFace');
    let beauFace = document.querySelector('#beauFace');
    let veryFace = document.querySelector('#veryFace');
    let zoomFaces = document.querySelectorAll('.zoom');
    let diff = 0.022;
    let titles = document.getElementsByClassName('head');
    let firstTitle = titles[0];
    let sTitle = titles[1];
    let tTitle = titles[2];
    let paras = document.getElementsByClassName('para');
    let fPara = paras[0];
    let sPara = paras[1];
    let tPara = paras[2];
    let brunette = document.querySelector('#brunetteSide');
    let blonde = document.querySelector('#girl');
    let about = document.querySelector('#textPhotoText');
    let pictures = document.querySelector('#pictures').children[0].children;
    let picturesTxt = document.querySelectorAll('.pText');
    let pictures2 = document.querySelector('#pictures2').children[0].children;
    let pictures2Txt = document.querySelectorAll('.p2Text');
    let lFooter = document.querySelector('#left');
    let rFooter = document.querySelector('#right');
    let burger = document.querySelector('#burger');
    let menuShow = document.querySelector('.menuShow');
    let close = menuShow.children[0];
    let home = menuShow.children[1].children[0];
    let francekBtn = menuShow.children[1].children[1].children[0];
    let francekDiv = menuShow.children[1].children[1];
    let francekBio = menuShow.children[1].children[1].children[1];
    console.log(francekBtn);
    let ext = 5;
    let control = false;

    /*setInterval(function () {
         console.log(window.pageYOffset)
     });*/

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

    function facezoom(faces) {
        let zoomIn;
        let zoomOut;
        for (let a = 0; a < faces.length; a++) {
            faces[a].addEventListener('mouseover', function () {
                if (a >= 5) {
                    zoomIn = 340;
                    zoomOut = 400
                } else {
                    zoomIn = 640;
                    zoomOut = 700;
                }
                faces[a].style.backgroundSize = zoomIn + 'px';
                let intB = setInterval(function () {
                    let bSize = parseFloat(faces[a].style.backgroundSize);
                    faces[a].style.backgroundSize = (bSize + ext) + 'px';
                    if (parseFloat(faces[a].style.backgroundSize) >= zoomOut) {
                        clearInterval(intB)
                    }
                }, 15);
            });
            faces[a].addEventListener('mouseout', function () {
                if (a >= 5) {
                    zoomIn = 340;
                    zoomOut = 400
                } else {
                    zoomIn = 640;
                    zoomOut = 700;
                }
                faces[a].style.backgroundSize = zoomOut + 'px';
                let intB2 = setInterval(function () {
                    let bSize = parseFloat(faces[a].style.backgroundSize);
                    faces[a].style.backgroundSize = (bSize - ext) + 'px';
                    if (parseFloat(faces[a].style.backgroundSize) <= zoomIn) {
                        clearInterval(intB2)
                    }
                }, 15);
            })
        }

    }

    let int = setInterval(function () {
        let opac = parseFloat(window.getComputedStyle(fTitle).getPropertyValue("opacity"));
        fTitle.style.opacity = opac + diff;
        if (opac === 1) {
            clearInterval(int)
        }
    }, 30);
    setTimeout(function () {
        let int2 = setInterval(function () {
            let opac2 = parseFloat(window.getComputedStyle(join).getPropertyValue("opacity"));
            join.style.opacity = opac2 + diff;
            if (opac2 === 1) {
                clearInterval(int2)
            }
        }, 30)
    }, 1200);

    facezoom(zoomFaces);

    window.addEventListener('scroll', function () {
        if (window.pageYOffset >= 300) {
            firstFace.classList.add('anim1');
            blondFace.classList.add('anim2');
            youngFace.classList.add('anim3');
            firstTitle.classList.add('anim3');
            sTitle.classList.add('anim3');
            fPara.classList.add('anim3');
            sPara.classList.add('anim3')
        }
        if (window.pageYOffset >= 700) {
            beauFace.classList.add('anim4');
            veryFace.classList.add('anim5');
            tTitle.classList.add('anim3');
            tPara.classList.add('anim3');
        }

        if (window.pageYOffset >= 1300) {
            about.classList.add('anim3');
            brunette.classList.add('anim6');
            setTimeout(function () {
                blonde.classList.add('anim6');
            }, 500)
        }

        if (window.pageYOffset >= 2200) {
            pictures[0].classList.add('anim3');
            setTimeout(function () {
                picturesTxt[0].classList.add('anim3');
            }, 600);
            setTimeout(function () {
                pictures[1].classList.add('anim3');
            }, 200);
            setTimeout(function () {
                picturesTxt[1].classList.add('anim3');
            }, 800);
            setTimeout(function () {
                pictures[2].classList.add('anim3');
            }, 600);
            setTimeout(function () {
                picturesTxt[2].classList.add('anim3');
            }, 1200);
            setTimeout(function () {
                pictures[3].classList.add('anim3');
            }, 1000);
            setTimeout(function () {
                picturesTxt[3].classList.add('anim3');
            }, 1600);
            setTimeout(function () {
                pictures[4].classList.add('anim3');
            }, 1400);
            setTimeout(function () {
                picturesTxt[4].classList.add('anim3');
            }, 2000);
        }

        if (window.pageYOffset >= 2900) {
            pictures2[0].classList.add('anim3');
            setTimeout(function () {
                pictures2Txt[0].classList.add('anim3');
            }, 600);
            setTimeout(function () {
                pictures2[1].classList.add('anim3');
            }, 200);
            setTimeout(function () {
                pictures2Txt[1].classList.add('anim3');
            }, 800);
            setTimeout(function () {
                pictures2[2].classList.add('anim3');
            }, 600);
            setTimeout(function () {
                pictures2Txt[2].classList.add('anim3');
            }, 1200);
        }

        if (window.pageYOffset >= 3100) {
            lFooter.classList.add('anim5');
            rFooter.classList.add('anim1');
        }

    });




});