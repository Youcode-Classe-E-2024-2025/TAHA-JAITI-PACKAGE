const viewAuthorsBtn = document.getElementById('viewAuthors') as HTMLButtonElement;
const viewPackBtn = document.getElementById('viewPackages') as HTMLButtonElement;
const authorsDisplay = document.getElementById('authorsDisplay') as HTMLDivElement;
const packagesDisplay = document.getElementById('packagesDisplay') as HTMLDivElement;

const openAdding = document.getElementById('openAdding') as HTMLButtonElement;
const addBtnsContainer = document.getElementById('addBtnsContainer') as HTMLDivElement;

const handlers = {
    author: {
        container: document.getElementById('authorContainer') as HTMLDivElement,
        openBtn: document.getElementById('openAuthor') as HTMLButtonElement,
        closeBtn: document.getElementById('closeAuthor') as HTMLButtonElement,
    },
    package: {
        container: document.getElementById('packageContainer') as HTMLDivElement,
        openBtn: document.getElementById('openPackage') as HTMLButtonElement,
        closeBtn: document.getElementById('closePackage') as HTMLButtonElement,
    },
    version: {
        container: document.getElementById('versionContainer') as HTMLDivElement,
        openBtn: document.getElementById('openVersion') as HTMLButtonElement,
        closeBtn: document.getElementById('closeVersion') as HTMLButtonElement,
    },
};

let authorsOpen: boolean = false;
let packagesOpen: boolean = false;
let addBtnsOpen: boolean = false;

openAdding.addEventListener('click', () => {
    if (addBtnsContainer && !addBtnsOpen){
        addBtnsContainer.classList.remove('hidden');
        addBtnsOpen = true;
    } else if (addBtnsOpen){
        addBtnsOpen = false;
        addBtnsContainer.classList.add('hidden');
    }
});

Object.keys(handlers).forEach((key) => {
    const item = handlers[key as keyof typeof handlers];
    if (item.container && item.closeBtn && item.openBtn){
        item.openBtn.addEventListener('click', () => {
            item.container.classList.remove('hidden');
        });

        item.closeBtn.addEventListener('click', () => {
            item.container.classList.add('hidden');
        });
    }
})

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