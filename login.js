const modalContainer = document.getElementById('modalContainer');
const modalContent = document.getElementById('modalContent');

document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form); //Retrieve the data from the previous Form

    //form.action contains the redirection URL
    fetch(form.action, {
        method: 'POST',
        body: formData //Here you can put a trailing comma
    })
    .then((response) => response.json()) //Wait for the auth_cinemma response
    .then((respData) => {
        if(respData.adminIn){
            window.location.href = './admin-index.php';
        } else if(respData.userIn){
            window.location.href = './index.php';
        } else {
            console.log('Authentication failed');
            modalContainer.classList.add('show');
            modalContainer.classList.remove('no-click');
            modalContent.classList.remove('no-click');
        }
    }).catch((error) => {
        console.log(error);
    })
});

document.getElementById('close').addEventListener('click', function() {
    modalContent.classList.add('no-click');
    modalContainer.classList.add('no-click');
    modalContainer.classList.remove('show');
});