document.addEventListener('DOMContentLoaded', function () {
    let index = document.getElementsByTagName('section')[0].children[0].children[0];
    let fLeft = document.querySelector('#left');
    let fRight = document.querySelector('#right');
    let burger = document.querySelector('#burger');
    let menuShow = document.querySelector('.menuShow');
    let close = menuShow.children[0];
    let home = menuShow.children[1].children[0];
    let francekBtn = menuShow.children[1].children[1].children[0];
    let francekDiv = menuShow.children[1].children[1];
    let francekBio = menuShow.children[1].children[1].children[1];
    let control = false;
    let control2 = false;

    let ms = document.querySelector('#appointments').getElementsByTagName('input')[0];
    let mr = document.querySelector('#appointments').getElementsByTagName('input')[1];

    let schedule = document.querySelector('#galBtn');
    let scheduleTxt = document.querySelector('#galBtn').children[0];
    let inputs = document.getElementsByClassName('ver');
    let checkB = document.querySelector('#checky');
    let policy = checkB.parentElement.nextElementSibling;
    let controlSend = false;

    let next = document.querySelector('#next');
    let prev = document.querySelector('#prev');

    let next1=document.querySelector('#next1');
    let prev1=document.querySelector('#prev1');
    let firstPic=document.querySelector('#pics').children[0];
    let cont1 =false;
    let cont1s =false;
    let cont2 =false;
    let cont2s =true;


    let qCont = document.querySelector('#qCont');

    let controlPre1=true;
    let controlPre2=true;
    let controlNext=true;

    let h1=document.getElementsByTagName('h1')[0];
    let p1=document.getElementsByTagName('p')[1];
    let appoint=document.querySelector('#appointments').children[0].children;
    let galBtn=document.querySelector('#galBtn');
    let pics=document.querySelector('#pics').getElementsByTagName('div');
    let quotes=document.querySelector('#quotes');

    setInterval(function () {
        console.log(window.pageYOffset)
    },500);

    console.log(quotes);

    function showTeam(list) {
        if (control2 === false) {
            for (let i = 0; i < list.length; i++) {
                setTimeout(function () {
                    list[i].classList.add('anim3')
                }, (i * 200));
                setTimeout(function () {
                    list[i].style.opacity = 1;
                    list[i].classList.remove('anim3')
                }, 2500)
            }
        } else {
        }
        control2 = true;
    }

    index.classList.add('anim1');
    h1.classList.add('anim3');
    setTimeout(function () {
        p1.classList.add('anim3');
    },500);
    setTimeout(function () {
        showTeam(appoint);
        control2=false;
        galBtn.classList.add('anim3')
    },1000);

    prev1.addEventListener('click',function () {
        cont2s=false;
        firstPic.addEventListener('animationend',function () {
           cont1=false
        });
        if (cont1===false && cont1s===false) {
            cont1=true;
            firstPic.classList.add('animPrev1');
            setTimeout(function () {
                firstPic.style.marginLeft=0;
                firstPic.classList.remove('animPrev1');
                cont1s=true;
                cont2s=false;
            },1600)
        }
    });

    next1.addEventListener('click',function () {
        firstPic.addEventListener('animationend',function () {
            cont2=false
        });
        if (cont2===false && cont2s===false) {
            cont2=true;
            firstPic.classList.add('animNext1');
            setTimeout(function () {
                firstPic.style.marginLeft=250+'px';
                firstPic.classList.remove('animNext1');
                cont2s=true;
                cont1s=false;
            },1600)
        }
    });

    prev.addEventListener('click', function () {
        controlPre1=false;
        let first=qCont.children[0];
        let second=qCont.children[1];
        qCont.children[0].addEventListener('animationend',function () {
            controlPre1=true;
        });
        if (controlPre1=== false) {
            first.classList.add('animPrev');
            setTimeout(function () {
                qCont.removeChild(first);
                qCont.appendChild(first);
                first.className='qText';
                second.classList='qText1'
            },1600);
        }
    });

    next.addEventListener('click',function () {
        let last=qCont.lastElementChild;
        let first=qCont.children[0];
        qCont.lastElementChild.addEventListener('animationend',function () {
            controlNext=true;
        });
        if (controlNext===false || controlPre1===false || controlPre2===false ) { console.log('nope2')} else {
            controlNext=false;

            qCont.removeChild(last);
            last.className='qTextMinus';
            last.classList.add('animNext');
            setTimeout(function () {
                last.className='qText1';
            },1600);
            first.className='qText1New';
            qCont.insertBefore(last,qCont.children[0])
        }
    });

    schedule.addEventListener('mouseover', function () {
        scheduleTxt.style.color = 'black'
    });

    schedule.addEventListener('mouseout', function () {
        scheduleTxt.style.color = '#B6A27F'
    });

    schedule.addEventListener('click', function () {
        let checkArr = [];
        policy.style.borderBottom = 'none';
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].style.border = 'none';
            checkArr.push(inputs[i].value)
        }
        for (let i = 0; i < inputs.length; i++) {
            if (checkArr[i] === '') {
                inputs[i].style.border = '1px solid #B6A27F';
            } else {
                controlSend = true
            }
        }
        if (checkB.checked === false) {
            policy.style.borderBottom = '1px solid #B6A27F'
        }
        if (checkB.checked && controlSend === true) {
            console.log('send it')
        }
    });

    ms.addEventListener('change', function () {
        if (ms.checked && mr.checked) {
            mr.checked = false;
        }
    });
    mr.addEventListener('change', function () {
        if (ms.checked && mr.checked) {
            ms.checked = false;
        }
    });

    francekBtn.addEventListener('click', function () {
        if (control === false) {
            francekBtn.style.color = '#FFFFFF';
            francekDiv.classList.add('menuAnim1');
            francekBio.classList.add('anim32');
            control = true;
        } else {
            francekBtn.style.color = '#ABABAB';
            francekDiv.classList.add('menuAnim1Rev');
            francekBio.classList.add('anim32Rev');
            setTimeout(function () {
                francekBio.className = '';
                francekDiv.className = '';
            }, 1000);
            control = false;
        }
    });

    burger.addEventListener('click', function () {
        menuShow.style.display = 'block';
        menuShow.classList.add('show')
    });

    close.addEventListener('click', function () {
        menuShow.classList.remove('show');
        menuShow.style.display = 'none';
        menuShow.classList.add('menuShow')
    });



    window.addEventListener('scroll', function () {

        if (window.pageYOffset>= 400) {
            showTeam(pics);
        }
        if (window.pageYOffset>= 900) {
            prev1.classList.add('anim3');
            setTimeout(function () {
                next1.classList.add('anim3')
            },500)
        }
        if (window.pageYOffset>= 1200) {
           quotes.classList.add('anim3')
        }

        if (window.pageYOffset >= 1500) {
            fLeft.classList.add('anim5');
            fRight.classList.add('anim11')
        }

    })

});