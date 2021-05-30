// const upBtn = document.querySelector('.up_btn');
// let upIcon = document.querySelector('#up_icon');
//
// const downBtn = document.querySelector('.down_btn');
// let downIcon = document.querySelector('#down_icon');

// let clickedUp = false;
// let clickedDown = false;
//
// upBtn.addEventListener("click", () => {
//     if (!clickedUp) {
//         clickedUp = true;
//         clickedDown = false;
//         downIcon.innerHTML = `<i class="fas fa-angle-down"></i>`;
//         upIcon.innerHTML = `<i class="fas fa-chevron-circle-up"></i>`;
//     } else {
//         clickedUp = false;
//         upIcon.innerHTML = `<i class="fas fa-angle-up"></i>`;
//     }
// });
//
// downBtn.addEventListener("click", () => {
//     if (!clickedDown) {
//         clickedDown = true;
//         clickedUp = false;
//         upIcon.innerHTML = `<i class="fas fa-angle-up"></i>`;
//         downIcon.innerHTML = `<i class="fas fa-chevron-circle-down"></i>`;
//     } else {
//         clickedDown = false;
//         downIcon.innerHTML = `<i class="fas fa-angle-down"></i>`;
//     }
// });

// let yakscores = document.querySelectorAll('.votescore');
// let yakscoresarray = Array.from(yakscores);
// console.log(yakscoresarray);
// yakscores.forEach(yakscore => {
//     let yakid = `${yakscore.dataset.id}`;
//     let yakvote = `${yakscore.textContent}`;
//     //let score = document.getElementById(`${yakscore.dataset.id}`);
//     let yakscoresarray = Array.from(yakscore);
//     console.log(yakscoresarray);
// });


const yaksup = document.querySelectorAll('.up_btn');
yaksup.forEach(yak => {
    yak.addEventListener('click', yakUpVote);

    function yakUpVote(){ // put an 'e' in the brackets and uncomment to cancel behaviour such as form submission.
        //e.preventDefault();
        console.log(`I was clicked and my yak number is ${this.dataset.id}`);

        let yakid = `${this.dataset.id}`;
        let score = document.getElementById(`scoreOf${this.dataset.id}`);
        score.textContent ++;

        let xhr = new XMLHttpRequest();
        let params = `yakid=${this.dataset.id}&id=${userid}`;    // yakid='15.'&id='.55
        xhr.open('POST', 'vote_yak_up.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function(){
            console.log(this.responseText);
        }
        xhr.send(params);
        console.log(params);
    }
});

const yaksdown = document.querySelectorAll('.down_btn');
yaksdown.forEach(yak => {
    yak.addEventListener('click', yakDownVote);

    function yakDownVote(){
        console.log(`I was clicked and my yak number is ${this.dataset.id}`);

        let yakid = `${this.dataset.id}`;
        let score = document.getElementById(`scoreOf${this.dataset.id}`);
        score.textContent --;

        let xhr = new XMLHttpRequest();
        let params = `yakid=${this.dataset.id}&id=${userid}`;    // yakid='15.'&id='.55
        xhr.open('POST', 'vote_yak_down.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function(){
            console.log(this.responseText);
        }
        xhr.send(params);
        console.log(params);
    }
});
