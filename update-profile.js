const modalContainer = document.getElementById('updtModalContainer');
const modalContent = document.getElementById('updtModalContent');

let form;
let formData;

document.getElementById('update-btn').addEventListener('click', function(event) {
    event.preventDefault();

    form = document.getElementById('updateForm');
    formData = new FormData(form); //Prepare the body of the HTTP request

    //Show the modal for confirmation
    modalContainer.classList.add('show');
    modalContainer.classList.remove('no-click');
    modalContent.classList.remove('no-click');
});

document.getElementById('cancel').addEventListener('click', function() {
    modalContainer.classList.remove('show');
    modalContainer.classList.add('no-click');
    modalContent.classList.add('no-click');   
});

document.getElementById('confirm').addEventListener('click', function() {
    modalContainer.classList.remove('show');
    modalContainer.classList.add('no-click');
    modalContent.classList.add('no-click');

    fetch(form.action, {
        method: 'POST',
        body: formData,
    })
    .then((response) => response.json())
    .then((respMssg) => {
        if(respMssg.Message === 'Update successful'){
            location.reload();
        } else {
            console.log(respMssg.Message);
        }
    })
})