const yaksup = document.querySelectorAll('.up_btn');
yaksup.forEach(yak => {
    yak.addEventListener('click', yakUpVote);


    function yakUpVote(){ // put an 'e' in the brackets and uncomment to cancel behaviour such as form submission.
        //e.preventDefault();
        console.log(`I was clicked and my yak number is ${this.dataset.id}`);

        let yakid = `${this.dataset.id}`;
        let score = document.getElementById(`scoreOf${this.dataset.id}`);

        let xhr = new XMLHttpRequest();
        let params = `yakid=${this.dataset.id}&id=${userid}`;    // yakid='15.'&id='.55
        xhr.open('POST', 'vote_yak_up.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function(){
            console.log(this.responseText);
        }
        xhr.send(params);
        console.log(params);

        let upIcon = document.getElementById(`upVoted${yakid}`);
        let downIcon = document.getElementById(`downVoted${yakid}`);

        if (upIcon.innerHTML.includes(`class="fas fa-angle-up"`) && downIcon.innerHTML.includes(`class="fas fa-angle-down"`)) {
            upIcon.innerHTML = `<i class="fas fa-chevron-circle-up"></i>`;
            score.textContent ++;
        } else if (upIcon.innerHTML.includes(`class="fas fa-angle-up"`) && downIcon.innerHTML.includes(`class="fas fa-chevron-circle-down"`)) {
            upIcon.innerHTML = `<i class="fas fa-chevron-circle-up"></i>`;
            downIcon.innerHTML = `<i class="fas fa-angle-down"></i>`;
            score.textContent ++;
            score.textContent ++;
        } else {
            upIcon.innerHTML = `<i class="fas fa-angle-up"></i>`;
            score.textContent --;
        };
    }
});

const yaksdown = document.querySelectorAll('.down_btn');
yaksdown.forEach(yak => {
    yak.addEventListener('click', yakDownVote);

    function yakDownVote(){
        console.log(`I was clicked and my yak number is ${this.dataset.id}`);

        let yakid = `${this.dataset.id}`;
        let score = document.getElementById(`scoreOf${this.dataset.id}`);

        let xhr = new XMLHttpRequest();
        let params = `yakid=${this.dataset.id}&id=${userid}`;    // yakid='15.'&id='.55
        xhr.open('POST', 'vote_yak_down.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function(){
            console.log(this.responseText);
        }
        xhr.send(params);
        console.log(params);

        let upIcon = document.getElementById(`upVoted${yakid}`);
        let downIcon = document.getElementById(`downVoted${yakid}`);

        if (upIcon.innerHTML.includes(`class="fas fa-angle-up"`) && downIcon.innerHTML.includes(`class="fas fa-angle-down"`)) {
            downIcon.innerHTML = `<i class="fas fa-chevron-circle-down"></i>`;
            score.textContent --;
        } else if (downIcon.innerHTML.includes(`class="fas fa-angle-down"`) && upIcon.innerHTML.includes(`class="fas fa-chevron-circle-up"`)) {
            downIcon.innerHTML = `<i class="fas fa-chevron-circle-down"></i>`;
            upIcon.innerHTML = `<i class="fas fa-angle-up"></i>`;
            score.textContent --;
            score.textContent --;
        } else {
            downIcon.innerHTML = `<i class="fas fa-angle-down"></i>`;
            score.textContent ++;
        };
    }
});
