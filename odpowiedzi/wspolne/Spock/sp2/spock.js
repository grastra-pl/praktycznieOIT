const kontenerGry = document.getElementById('gra');

const mozliweWybory = [
  { nazwa: 'kamień', pokonuje: ['nożyce', 'jaszczur'] },
  { nazwa: 'papier', pokonuje: ['kamień', 'Spock'] },
  { nazwa: 'nożyce', pokonuje: ['papier', 'jaszczur'] },
  { nazwa: 'Spock', pokonuje: ['nożyce', 'kamień'] },
  { nazwa: 'jaszczur', pokonuje: ['papier', 'Spock'] }
];

let mozliweWyboryHtml = '';
mozliweWybory.forEach(wybor => {
  mozliweWyboryHtml += `<button class="wybor">${ wybor.nazwa }</button>`;
});

const html = `<h1>Gra: Kamień, papier, nożyce, Spock, jaszczur</h1>
              ${mozliweWyboryHtml}
              <p>Wybór komputera: <span id="wybor-komputera"></span></p>
              <p>Wynik: <span id="wynik"></span></p>`;

kontenerGry.innerHTML = html;

const przyciski = document.querySelectorAll('.wybor');
przyciski.forEach(przycisk => przycisk.addEventListener('click', gdyKliknie));

function gdyKliknie(event) {
  const wyborGracza = event.target.textContent;
  const wyborKomputera = mozliweWybory[Math.floor(Math.random() * mozliweWybory.length)];

  document.getElementById('wybor-komputera').textContent = wyborKomputera.nazwa;

  const wynik = sprawdzWynik(wyborGracza, wyborKomputera.nazwa);
  document.getElementById('wynik').textContent = wynik;
}

function sprawdzWynik(wyborGracza, wyborKomputera) {
  if (wyborGracza === wyborKomputera) {
    return 'Remis!';
  }

  const wyborGraczaObj = mozliweWybory.find(choice => choice.nazwa === wyborGracza);
  if (wyborGraczaObj.pokonuje.includes(wyborKomputera)) {
    return 'Wygrałeś!';
  }

  return 'Przegrałeś!';
}
