<template>
    <div class="wrapper">
        <img src="img/golf-hole.jpg" 
                alt=""
                class="img-fluid" 
                style="margin: 0 auto;"
                > 
        <!-- <button @click="notificationMessage">NotificationMessage</button> -->
       
    </div>
</template>
<script>
    export default {
        name: 'landing',
        methods: {
            // notificationMessage() {
            //     this.$store.commit('notificationMessage', {
            //         type: 'warning',
            //         title: 'Delete this game?',
            //         subtitle: 'This cannot be undone, ',
            //         linkto: "<a href=''>Delete game</a>",
            //         timeout: null
            //     });
            // }
        }
    }
</script>
<style>
    .wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
</style>