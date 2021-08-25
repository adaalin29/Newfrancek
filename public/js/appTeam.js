document.addEventListener('DOMContentLoaded', function () {
        let index = document.getElementsByTagName('section')[0].children[0].children[0];
        let h1 = document.getElementsByTagName('section')[0].children[0].children[1];
        let pic = document.getElementsByTagName('section')[0].children[0].children[2];
        let next = document.querySelector('#next');
        let prev = document.querySelector('#prev');
        let picture = document.querySelector('#teamPics').children[0];
        let text1 = document.querySelectorAll('.pTeam')[0];
        let text2 = document.querySelectorAll('.pTeam')[1];
        let h1s = document.querySelector('.container2').children[5];
        let text3 = document.querySelector('#pTeam2');
        let text4 = document.querySelectorAll('.pTeam2');
        let teamPics = document.querySelector('#teamPics').children;
        let left = document.querySelector('#left');
        let right = document.querySelector('#right');
        let names = document.querySelectorAll('.names');
        let persShow = document.querySelector('#persShow');
        let persPic = document.querySelector('#persPic');
        let persName = document.querySelector('#textShow').children[0];
        let persDescr = document.querySelector('#textShow').children[1];
        let close = document.querySelector('#person').children[0];
        let descriptions = ['ADI Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ' +
        'ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non' +
        ' proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'SAB Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut ' +
            'aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui ' +
            'officia deserunt mollit anim id est laborum.',
            'NINO Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut ' +
            'aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui ' +
            'officia deserunt mollit anim id est laborum.',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut ' +
            'aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui ' +
            'officia deserunt mollit anim id est laborum.',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut ' +
            'aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui ' +
            'officia deserunt mollit anim id est laborum.',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut ' +
            'aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui ' +
            'officia deserunt mollit anim id est laborum.'];
        let control = false;
        let control2 = false;
        let burger = document.querySelector('#burger');
        let menuShow = document.querySelector('.menuShow');
        let close2 = menuShow.children[0];
        let home = menuShow.children[1].children[0];
        let francekBtn = menuShow.children[1].children[1].children[0];
        let francekDiv = menuShow.children[1].children[1];
        let francekBio = menuShow.children[1].children[1].children[1];
        let control3 = false;

        let aaa = names[0].parentElement;

        console.log(window.getComputedStyle(aaa).getPropertyValue("background-image"));


        francekBtn.addEventListener('click', function () {
            if (control3 === false) {
                francekBtn.style.color = '#FFFFFF';
                francekDiv.classList.add('menuAnim1');
                francekBio.classList.add('anim32');
                control3 = true;
            } else {
                francekBtn.style.color = '#ABABAB';
                francekDiv.classList.add('menuAnim1Rev');
                francekBio.classList.add('anim32Rev');
                setTimeout(function () {
                    francekBio.className = '';
                    francekDiv.className = '';
                }, 1000);
                control3 = false;
            }
        });

        burger.addEventListener('click', function () {
            menuShow.style.display = 'block';
            menuShow.classList.add('show')
        });

        close2.addEventListener('click', function () {
            menuShow.classList.remove('show');
            menuShow.style.display = 'none';
            menuShow.classList.add('menuShow')
        });


        function showEachMember(memberNames) {
            for (let i = 0; i < memberNames.length; i++) {
                memberNames[i].addEventListener('click', function () {
                    persShow.classList.add('show');
                    let image = memberNames[i].parentElement;
                    persPic.style.backgroundImage = window.getComputedStyle(image).getPropertyValue("background-image");
                    persName.innerText = memberNames[i].innerText;
                    persDescr.innerText = descriptions[i]
                })
            }
        }


        close.addEventListener('click', function () {
            persShow.classList.remove('show');
            persShow.classList.remove('anim4')

        });

        showEachMember(names);


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
        h1.classList.add('anim2');
        setTimeout(function () {
            pic.classList.add('anim2')
        }, 800);

        next.addEventListener('click', function () {
            if (control === false) {
                picture.classList.add('animNext');
                setTimeout(function () {
                    picture.style.marginLeft = -34 + 'px';
                    picture.classList.remove('animNext')
                }, 2000);
            } else {
            }
            control = true;
        });
        prev.addEventListener('click', function () {
            if (control === true) {
                picture.classList.add('animPrev');
                setTimeout(function () {
                    picture.style.marginLeft = 250 + 'px';
                    picture.classList.remove('animPrev')
                }, 2000);
            } else {
            }
            control = false;
        });

        window.addEventListener('scroll', function () {
            if (window.pageYOffset >= 100) {
                text1.classList.add('anim3')
            }
            if (window.pageYOffset >= 200) {
                text2.classList.add('anim3')
            }
            if (window.pageYOffset >= 400) {
                h1s.classList.add('anim3')
            }

            if (window.pageYOffset >= 500) {
                text3.classList.add('anim3');
                text4.forEach(function (e) {
                    e.classList.add('anim3')
                })
            }
            if (window.pageYOffset >= 700) {
                showTeam(teamPics);
                setTimeout(function () {
                }, 1000)
            }

            if (window.pageYOffset >= 1200) {
                left.classList.add('anim5');
                right.classList.add('anim11')
            }
        })

        /* window.addEventListener('scroll',function () {
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

         });*/

    }
);