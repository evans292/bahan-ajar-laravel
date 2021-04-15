require('./bootstrap');

window.addEventListener('scroll', function() {
    let header = document.querySelector('header');
    let aboutDesc = document.querySelector('.about-desc');
    header.classList.toggle('sticky', window.scrollY > 0);
    aboutDesc.classList.toggle('fade', window.scrollY > 400);
});

class TypeWriter {
    constructor(txtType, words, wait = 3000) {
        this.txtType = txtType;
        this.words = words;
        this.wait = parseInt(wait);
        this.txt = '';
        this.wordsIndex = 0;
        this.type();
        this.isDeleting = false;
    }

    type() {
        const currentIndex = this.wordsIndex % this.words.length;
        const fullWords = this.words[currentIndex];

        if (this.isDeleting) {
            this.txt = fullWords.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullWords.substring(0, this.txt.length + 1);
        }

        this.txtType.innerHTML = `<span class="txt">${this.txt}</span>`;

        let typeSpeed = 300;

        if (this.isDeleting) {
            typeSpeed /= 2;
        }

        if (!this.isDeleting && this.txt === fullWords) {
            typeSpeed = this.wait;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.wordsIndex++;

            typeSpeed = 500;
        }

        setTimeout(() => this.type(), typeSpeed);
    }
}

document.addEventListener('DOMContentLoaded', init);

function init() {
    const txtType = document.querySelector('.txt-type');
    const words = JSON.parse(txtType.getAttribute('data-words'));
    const wait = txtType.getAttribute('data-wait');

    new TypeWriter(txtType, words, wait);
}
