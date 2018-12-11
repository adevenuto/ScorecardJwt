<template>
    <div class="wrapper">
        <img src="http://res.publicdomainfiles.com/pdf_view/56/13528810214208.png" 
                alt=""
                class="img-fluid" 
                style="margin: 0 auto;"
                width="700px"
                > 
        <button @click="notificationMessage">NotificationMessage</button>
       
    </div>
</template>
<script>
    export default {
        name: 'landing',
        methods: {
            notificationMessage() {
                this.$store.commit('notificationMessage', {
                    type: 'warning',
                    title: 'Delete this game?',
                    subtitle: 'This cannot be undone, ',
                    linkto: "<a href=''>Delete game</a>",
                    timeout: null
                });
            }
        }
    }
</script>
<style>
    .wrapper {
        display: flex;
        flex-direction: column;
        min-height: 600px;
        align-items: center;
        justify-content: center;
    }
</style>