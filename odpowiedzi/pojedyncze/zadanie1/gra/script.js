const gameBoard=document.querySelector("#gameboard");
const infoDisplay=document.querySelector("#info");
const startCells = [
    "","","","","","","","",""
]

var go="koło";
infoDisplay.textContent="Teraz gra koło"

function createBoard() {
    startCells.forEach((_cell,index) =>{
        const cellElement=document.createElement('div');
        cellElement.classList.add('square');
        cellElement.id=index;
        cellElement.addEventListener('click',whose_turn);
        gameBoard.append(cellElement);
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

}
function checkScore(){
    const allSquares=document.querySelectorAll(".square")
    console.log(allSquares)
    const winningCombos=[
        [0,1,2], [3,4,5], [6,7,8],
        [0,3,6], [1,4,7], [2,5,8],
        [0,4,8], [2,4,6]
    ]
        
    winningCombos.forEach(array=>{
       const circleWins= array.every(cell=>allSquares[cell].firstChild?.classList.contains('koło'))

       const crossWins= array.every(cell=>allSquares[cell].firstChild?.classList.contains('krzyżyk'))

    

       if(circleWins){
        infoDisplay.textContent = "Koło wygrywa!";
        allSquares.forEach(square => square.replaceWith(square.cloneNode(true)))
        return;
       }
        if(crossWins){
        infoDisplay.textContent = "Krzyżyk wygrywa!";
        allSquares.forEach(square => square.replaceWith(square.cloneNode(true)))
        return;
       }
       
    
       
    })

    
    
}