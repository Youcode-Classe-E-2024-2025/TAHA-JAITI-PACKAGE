const viewAuthorsBtn = document.getElementById('viewAuthors') as HTMLButtonElement;
const viewPackBtn = document.getElementById('viewPackages') as HTMLButtonElement;

const authorsDisplay = document.getElementById('authorsDisplay') as HTMLDivElement;
const packagesDisplay = document.getElementById('packagesDisplay') as HTMLDivElement;

let authorsOpen: boolean = false;
let packagesOpen: boolean = false;

viewAuthorsBtn.addEventListener('click', () => {
    if (authorsDisplay && !authorsOpen) {
        if (packagesOpen){
            packagesOpen = false;
            packagesDisplay.classList.add('hidden');
        }
        authorsDisplay.classList.remove('hidden');
        authorsOpen = true;

    } else if (authorsDisplay && authorsOpen) {
        authorsOpen = false;
        authorsDisplay.classList.add('hidden');
    }
});

viewPackBtn.addEventListener('click', () => {
    if (packagesDisplay && !packagesOpen) {
        if (authorsOpen){
            authorsOpen = false;
            authorsDisplay.classList.add('hidden');
        }
        packagesDisplay.classList.remove('hidden');
        packagesOpen = true;
    } else if (packagesDisplay && packagesOpen){
        packagesOpen = false;
        packagesDisplay.classList.add('hidden');
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const oldMsg = document.querySelector('.msg') as HTMLDivElement || null;
    if (oldMsg) {
        console.log('MSG EXISTS', oldMsg);
        setTimeout( () => {
            oldMsg.remove();
            console.log('MSG REMOVED');
        },5000)
    } else {
        console.log('no msg found');
        return;
    }
});