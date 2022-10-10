// Navbar
const containerSatu = document.querySelector('div.toggle input');
const navigation = document.querySelector('nav ul');
const slider = document.querySelector('.slider');

containerSatu.addEventListener('click', function(){
    navigation.classList.toggle('slider');
});
// End Navbar

// Logout
const navLogout = document.querySelector('div.navLogout');
const btnLogout = document.querySelector('.btn-logout');
const besar = document.querySelector('.besar');
const kecil = document.querySelector('.kecil');
const ok = document.querySelector('.ok');
const cancel = document.querySelector('.cancel');
const x = document.querySelector('.x');
const nLogout = document.querySelector('#nLogout')

btnLogout.addEventListener('click', function(){
    navLogout.classList.add('besar');

    if(navLogout.classList.contains('kecil')){
        navLogout.classList.remove('kecil');
    };
});

x.addEventListener('click', function(){
    navLogout.classList.add('kecil');
    if(navLogout.classList.contains('besar')){
        navLogout.classList.remove('besar');
    };
});

cancel.addEventListener('click', function(){
    navLogout.classList.add('kecil');
    if(navLogout.classList.contains('besar')){
        navLogout.classList.remove('besar');
    };
});

ok.addEventListener('click', function(){
    navLogout.classList.remove('besar');
});

btnLogout.addEventListener('click', function(){
    navLogout.classList.add('besar');
});


// End Logout


// slider Profil
const sliderDua = document.querySelector('.slider-dua');
const navDua = document.querySelector('.sDua');
const btnProfil = document.querySelector('.profil div input');

btnProfil.addEventListener('click', function(){
    navDua.classList.toggle('slider-dua');
});
// End Slider Profil
