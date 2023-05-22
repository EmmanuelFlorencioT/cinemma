seatsToSelect = 2;
let selectedSeats = [];

//seat was sent because we sent 'this' as an argument to the function.
function occupySeat(seat) {
    seatID = seat.id;
    const seatImg = seat.querySelector('img');

    //Check if the seat is already selected
    if(selectedSeats.includes(seatID)){
        let idx = selectedSeats.indexOf(seatID);
        if(idx !== -1){
            selectedSeats.splice(idx, 1); //Remove one element from the specified index
            seatsToSelect++;
            seatImg.src = './assets/armchair.png';
        }
        printSelectedSeats();
        return;
    }
    
    //Check if you can still select seats
    if(seatsToSelect - selectedSeats.length < 0){
        return;
    }

    //Occupy the seat
    selectedSeats.push(seatID);
    seatsToSelect--;
    seatImg.src = './assets/armchair-off.png';
    printSelectedSeats();
}

function printSelectedSeats(){
    console.log(selectedSeats);
}