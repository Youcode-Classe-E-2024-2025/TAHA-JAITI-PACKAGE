"use strict";
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
