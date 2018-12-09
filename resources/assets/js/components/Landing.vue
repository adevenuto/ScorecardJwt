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
                let payload = {
                    title: 'This is the title whore',
                    subtitle: 'This is the sub title whore',
                    linkto: "<a href='/login'>Login</a>"
                }
                this.$store.commit('notificationMessage', payload);
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