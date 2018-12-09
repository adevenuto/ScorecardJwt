<template>
    <div :class="{'slide-in': notificationMessage.status}"  class="message-wrapper">
        <div class="message">
            <div class="title">
                {{notificationMessage.title}}
            </div>
            <div class="subtitle">
                {{notificationMessage.subtitle}} <span v-html="notificationMessage.linkto">{{notificationMessage.linkto}}</span>
            </div>
        </div>
        <div @click="notificationClose" class="message-close">
            <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg"><path d="M12.435 8.9l4.596 4.596a2.5 2.5 0 0 1-3.535 3.535l-4.597-4.596-4.596 4.596a2.5 2.5 0 0 1-3.535-3.535l4.596-4.597L.768 4.303A2.5 2.5 0 0 1 4.303.768L8.9 5.364 13.496.768a2.5 2.5 0 1 1 3.535 3.535L12.435 8.9z" fill="#000" fill-rule="evenodd"/></svg>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'Messages',
        data() {
            return {
                message: {
                    title: this.$store.state.notificationMessage.title,
                    subtitle: this.$store.state.notificationMessage.subtitle,
                    linkto: this.$store.state.notificationMessage.linkto
                }
            }
        },
        computed: {
			notificationMessage() {
				return this.$store.getters.notificationMessage;
			}
		},
        methods: {
            notificationClose() {
                this.$store.commit('notificationMessageClear');
            }
        }
    }
</script>
<style lang="scss" scoped>
    .message-wrapper {
        position: absolute;
        display: flex;
        width: 100%;
        min-height: 60px;
        top: -80px;
        transition: top 250ms ease-in-out;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        background: #00da05;
        box-shadow: 0px 0px 3px 0px #000;
        z-index: 9000;
        .message {
            color: #fff;
            .title {
                font-size: 1.2rem;
            }
            .subtitle {
                font-size: 1rem;
            }
        }
        .message-close {
            margin-left: 20px;
            svg {
                position: relative;
                top: 3px;
                cursor: pointer;
                &:hover path {
                    fill: #999;
                    transition: 100ms;
                }
            }
        }
    }
    .message-wrapper.slide-in {
        top: 0;
    }
    @media only screen and (max-width: 374px) {
        .message-wrapper .message .title {
            font-size: 1rem;
        }
        .message-wrapper .message .subtitle {
            font-size: .8rem;
        }
    }
</style>
