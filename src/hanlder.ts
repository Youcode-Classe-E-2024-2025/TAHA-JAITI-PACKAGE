const author = document.querySelector('#authorContainer') as HTMLDivElement;
const openAuthor = document.querySelector('#openAuthor') as HTMLButtonElement;
const closeAuthor = document.querySelector('#closeAuthor') as HTMLButtonElement;

console.log(author);


openAuthor.addEventListener('click', (e) => {
    e.stopPropagation();
    author.classList.toggle('hidden');
});

closeAuthor.addEventListener('click', (e) => {
    e.stopPropagation();
    author.classList.toggle('hidden');
});

