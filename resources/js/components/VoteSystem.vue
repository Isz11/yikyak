<template>
    <div class="container">
        <button style="border: none;" type="button" name="button" @click="vote('up')">
            <span style="color:black;" class="fas fa-angle-up"></span>
        </button>
        <div id="score">{{ yakScore }}</div>
        <button style="border: none;" type="button" name="button" @click="vote('down')">
            <span style="color:black;" class="fas fa-angle-down"></span>
        </button>
    </div>
</template>

<script>
    export default {
        props: ['yakId', 'yakScore', 'userId'],

        mounted() {
            console.log('Component mounted.')
        },

        // data: function () {
        //     return {
        //         count: 0
        //     }
        // },

        methods: {
            vote(message) {
                // alert(`You ${message}voted this yak`);
                let score = document.getElementById('score');
                if (message == 'up') {
                    console.log(`Upvote has been clicked on yak ${this.yakId} by ${this.userId}`);
                    score.textContent ++;
                } else {
                    console.log(`Downvote has been clicked on yak ${this.yakId} by ${this.userId}`);
                    score.textContent --;
                }
            }
        }
    }
</script>
