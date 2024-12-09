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