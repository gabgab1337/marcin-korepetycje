function kalkulator() {
    let kwotaPoczatkowa = document.querySelector('#kwotaPoczatkowa').value;
    let kwotaMiesieczna = document.querySelector('#kwotaMiesieczna').value;
    let ileLat = document.querySelector('#ileLat').value;
    const STOPA_PROCENTOWA = 0.05;
    let kwotaKoncowa;
    kwotaKoncowa = kwotaPoczatkowa * Math.pow(1 + STOPA_PROCENTOWA/1, 1 * ileLat);
    for (let i = 0; i < ileLat; i++) {
      kwotaKoncowa += kwotaMiesieczna * 12 * Math.pow(1 + STOPA_PROCENTOWA/1, 1 * (ileLat - i));
    }
    let wyswietl = document.querySelector('#wyswietl');
    wyswietl.innerHTML = kwotaKoncowa;
}