const cbox = document.querySelector('input.cbox');
const profilTambahan = document.querySelector('.profil-tambahan');

cbox.addEventListener('click', function(){
    profilTambahan.classList.toggle('scale');
});
