<template>
    <div class="wrapper">
        <img src="https://i.etsystatic.com/13221305/r/il/19bb57/1456736458/il_fullxfull.1456736458_m4fi.jpg" 
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