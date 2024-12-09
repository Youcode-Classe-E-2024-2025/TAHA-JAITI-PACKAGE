"use strict";
const viewAuthorsBtn = document.getElementById('viewAuthors');
const viewPackBtn = document.getElementById('viewPackages');
const authorsDisplay = document.getElementById('authorsDisplay');
const packagesDisplay = document.getElementById('packagesDisplay');
const openAdding = document.getElementById('openAdding');
const addBtnsContainer = document.getElementById('addBtnsContainer');
const handlers = {
    author: {
        container: document.getElementById('authorContainer'),
        openBtn: document.getElementById('openAuthor'),
        closeBtn: document.getElementById('closeAuthor'),
    },
    package: {
        container: document.getElementById('packageContainer'),
        openBtn: document.getElementById('openPackage'),
        closeBtn: document.getElementById('closePackage'),
    },
    version: {
        container: document.getElementById('versionContainer'),
        openBtn: document.getElementById('openVersion'),
        closeBtn: document.getElementById('closeVersion'),
    },
};
let authorsOpen = false;
let packagesOpen = false;
let addBtnsOpen = false;
openAdding.addEventListener('click', () => {
    if (addBtnsContainer && !addBtnsOpen) {
        addBtnsContainer.classList.remove('hidden');
        addBtnsOpen = true;
    }
    else if (addBtnsOpen) {
        addBtnsOpen = false;
        addBtnsContainer.classList.add('hidden');
    }
});
Object.keys(handlers).forEach((key) => {
    const item = handlers[key];
    if (item.container && item.closeBtn && item.openBtn) {
        item.openBtn.addEventListener('click', () => {
            item.container.classList.remove('hidden');
        });
        item.closeBtn.addEventListener('click', () => {
            item.container.classList.add('hidden');
        });
    }
});
viewAuthorsBtn.addEventListener('click', () => {
    if (authorsDisplay && !authorsOpen) {
        if (packagesOpen) {
            packagesOpen = false;
            packagesDisplay.classList.add('hidden');
        }
        authorsDisplay.classList.remove('hidden');
        authorsOpen = true;
    }
    else if (authorsDisplay && authorsOpen) {
        authorsOpen = false;
        authorsDisplay.classList.add('hidden');
    }
});
viewPackBtn.addEventListener('click', () => {
    if (packagesDisplay && !packagesOpen) {
        if (authorsOpen) {
            authorsOpen = false;
            authorsDisplay.classList.add('hidden');
        }
        packagesDisplay.classList.remove('hidden');
        packagesOpen = true;
    }
    else if (packagesDisplay && packagesOpen) {
        packagesOpen = false;
        packagesDisplay.classList.add('hidden');
    }
});
document.addEventListener('DOMContentLoaded', () => {
    const oldMsg = document.querySelector('.msg') || null;
    if (oldMsg) {
        console.log('MSG EXISTS', oldMsg);
        setTimeout(() => {
            oldMsg.remove();
            console.log('MSG REMOVED');
        }, 5000);
    }
    else {
        console.log('no msg found');
        return;
    }
});
