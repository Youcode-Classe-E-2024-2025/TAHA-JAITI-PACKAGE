"use strict";
const author = document.querySelector('#authorContainer');
const openAuthor = document.querySelector('#openAuthor');
const closeAuthor = document.querySelector('#closeAuthor');
console.log(author);
openAuthor.addEventListener('click', (e) => {
    e.stopPropagation();
    author.classList.toggle('hidden');
});
closeAuthor.addEventListener('click', (e) => {
    e.stopPropagation();
    author.classList.toggle('hidden');
});
