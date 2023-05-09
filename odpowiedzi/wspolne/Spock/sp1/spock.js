const komunikatWygranej = "Wygrałeś!";
const komunikatPrzegranej = "Przegrałeś!";
const komunikatRemisu = "Remis!";

const wybory = ["Kamień", "Papier", "Nożyce", "Jaszczur", "Spock"];

function wyborKomputera() {
  const index = Math.floor(Math.random() * wybory.length);
  return wybory[index];
}

function play(wyborGracza) {
        const komputer = wyborKomputera();
        let wynik;

        if (
          (wyborGracza === "Kamień" && komputer === "Nożyce") ||
          (wyborGracza === "Kamień" && komputer === "Jaszczur") ||
          (wyborGracza === "Papier" && komputer === "Kamień") ||
          (wyborGracza === "Papier" && komputer === "Spock") ||
          (wyborGracza === "Nożyce" && komputer === "Papier") ||
          (wyborGracza === "Nożyce" && komputer === "Jaszczur") ||
          (wyborGracza === "Jaszczur" && komputer === "Papier") ||
          (wyborGracza === "Jaszczur" && komputer === "Spock") ||
          (wyborGracza === "Spock" && komputer === "Kamień") ||
          (wyborGracza === "Spock" && komputer === "Nożyce")
        ) {
          wynik = komunikatWygranej;
        } else if (wyborGracza === komputer) {
          wynik = komunikatRemisu;
        } else {
          wynik = komunikatPrzegranej;
        }

        document.getElementById("wynik").innerHTML = `Ty wybrałeś ${wyborGracza}, komputer wybrał ${komputer}. ${wynik}`;
      }