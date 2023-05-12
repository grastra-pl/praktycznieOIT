const gameBoard=document.querySelector("#gameboard");
const infoDisplay=document.querySelector("#info");
const startCells = [
    "","","","","","","","",""
]

//Tworzy stałą tablicę startCells, która reprezentuje pustą planszę gry.

var go="koło"; 
infoDisplay.textContent="Teraz gra koło"
//okręśla kto zaczyna grę

function createBoard() {
    startCells.forEach((_cell,index) =>{
        const cellElement=document.createElement('div');
        cellElement.classList.add('square'); 
        cellElement.id=index; 
        cellElement.addEventListener('click',whose_turn);
        gameBoard.append(cellElement); 
        //tworzy 9 części planszy
        //przypisuje im klasę square oraz id odpowiednio od 0 do 8
        //za każdym kliknięciem przycisku wywołana jest funkcja, która okręśla czyja jest teraz kolej
        //dodaje komórki do planszy
    })
}

createBoard();

function whose_turn(e){
const goDisplay = document.createElement('div');
goDisplay.classList.add(go);
e.target.append(goDisplay);
go = go=="koło" ? "krzyżyk" : "koło";
infoDisplay.textContent= "Teraz gra "+go+"!";
e.target.removeEventListener('click',whose_turn);
checkScore();
//tworzy wewnątrz div'ów square inne divy o klasie odpowiednio koło lub krzyżyk
// za pomocą instrukcji warunek ? coś : coś ,
// zmieniane są wartości zmiennej go która przechowuje albo koło albo krzyżyk
//zależnie od tego co teraz powinno grać 
// instrukcja działa tak że jeśli warunek jest spełniony to robi to po prawej stronie : a w innym przypadku to po lewej stronie :
}
function checkScore(){
    const allSquares=document.querySelectorAll(".square")
    console.log(allSquares)
    const winningCombos=[
        [0,1,2], [3,4,5], [6,7,8],
        [0,3,6], [1,4,7], [2,5,8],
        [0,4,8], [2,4,6]
    ]
    //wyżej rozpisane są wszystkie wygrywające kombinacje
    let isFilled = true;

    winningCombos.forEach(array=>{
       const circleWins= array.every(cell=>allSquares[cell].firstChild?.classList.contains('koło'))

       const crossWins= array.every(cell=>allSquares[cell].firstChild?.classList.contains('krzyżyk'))

    

       if(circleWins){
        infoDisplay.textContent = "Koło wygrywa!";
        allSquares.forEach(square => square.replaceWith(square.cloneNode(true))) // uniemożliwia dalsze granie po określeniu wyniku
        return;
       }
        if(crossWins){
        infoDisplay.textContent = "Krzyżyk wygrywa!";
        allSquares.forEach(square => square.replaceWith(square.cloneNode(true))) 
        return;
       }
       array.forEach(cell => {
            if (!allSquares[cell].firstChild) {
                isFilled = false;
            }
        });
    
       
    })
    if (isFilled) {
        infoDisplay.textContent = "Remis";
        allSquares.forEach(square => square.replaceWith(square.cloneNode(true))); 
    }
    
    const restartButton = document.getElementById("restartButton");
    restartButton.addEventListener("click", restartGame);
}
function restartGame() {
    const allSquares = document.querySelectorAll(".square");
    allSquares.forEach(square => {
      square.innerHTML = ""; //wstawia puste pola, czyści kwadraty
      square.addEventListener('click', whose_turn);
      infoDisplay.textContent="Teraz gra koło"
    });

  }