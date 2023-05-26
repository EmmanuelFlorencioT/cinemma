let seatsToSelect = 0;
let selectedSeats = [];

let maxSeats = document.getElementById('max-seats').getAttribute('data-max-seats');

let numSeatsElement = document.getElementById('num-seats');
let numSeats = 0;

let totalPrice = document.getElementById('total-price');

document.getElementById('add-seat').addEventListener('click', function() {
    if(numSeats + 1 > maxSeats){
        return;
    }
    
    numSeats++;
    numSeatsElement.innerText = numSeats;
    totalPrice.innerHTML = "$ " + (numSeats * 11.75);
    
    if(selectedSeats.length === 0){
        seatsToSelect = numSeats;
    } else {
        seatsToSelect = numSeats - selectedSeats.length;
    }
});

document.getElementById('sub-seat').addEventListener('click', function() {
    if(numSeats - 1 < 0){
        return;
    }

    numSeats--;
    numSeatsElement.innerHTML = numSeats;
    totalPrice.innerHTML = "$ " + (numSeats * 11.75);

    if(selectedSeats.length > numSeats){
        occupySeat(document.getElementById(selectedSeats.slice(-1)));
        seatsToSelect = 0;
    } else {
        seatsToSelect = numSeats - selectedSeats.length;
    }
});

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
        return;
    }
    
    //Check if you can still select seats
    if(seatsToSelect <= 0){
        return;
    }

    //Occupy the seat
    selectedSeats.push(seatID);
    seatsToSelect--;
    seatImg.src = './assets/armchair-off.png';
}

let startTime = document.getElementById('time-label').getAttribute('data-time');
let screeningID = document.getElementById('screen-label').getAttribute('data-screen');

document.getElementById('confirm-seats-btn').addEventListener('click', function(){
    if(numSeats === 0 || selectedSeats.length < numSeats){
        return;
    }

    seatsInfo = {
        'screeningID': screeningID,
        'startTime': startTime,
        'seats': selectedSeats
    };

    fetch('./insert_seats.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(seatsInfo)
    })
    .then((response) => response.json())
    .then((respMssg) => {
        if(respMssg.wasReceived){
            location.window.href = './index.php';
        } else {
            console.log('Data Not Recevied!');
        }
    })
    .catch((error) => {
        console.log(error);
    })
});