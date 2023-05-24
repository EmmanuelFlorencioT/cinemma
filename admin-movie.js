//Just allow to select one screening and erase
let timesToSelect = 1;
let time;
let screenID;

function selectTime(screenTime){
    let timeElement = screenTime.querySelector('p');
    time = timeElement.textContent;
    screenID = timeElement.getAttribute('data-screen');

    //Check if the element is already selected
    if(screenTime.classList.contains('btn-selected')){
        screenTime.classList.remove('btn-selected');
        timesToSelect = 1;
        return;
    }

    //Check if you can still select a time
    if(timesToSelect === 0){
        return;
    }

    //Select time
    screenTime.classList.add('btn-selected');
    timesToSelect = 0;
    console.log(time, screenID);
}

function removeTime(){
    if(timesToSelect === 0){
        let timeData = {
            screening_id: screenID,
            start_time: time
        };

        fetch('./remove_screening.php',{
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(timeData)
        })
        .then((response) => response.json())
        .then((respData) => {
            if(respData.wasReceived && respData.deleteStatus){
                location.reload();
            } else {
                console.log(respData.error);
            }
        })
    }
}