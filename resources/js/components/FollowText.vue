<template>
    <div class="container">
        <a href="#" class="pl-3 text-decoration-none" @click="followUser" v-text="buttonText"></a>
    </div>
</template>

<script>
    export default {

        props: ['userId', 'follows'],

        mounted() {
            //
        },

        created() {
            this.$store.dispatch("setBooleanFlag", this.userId, this.follows);
        },

        data: function() {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                this.$store.dispatch("followUnFollow", this.userId, this.follows);
            }
        },

        computed: {
            buttonText() {
                var bool = this.follows;
                if (this.$store.state.status != undefined) {
                    bool = this.$store.state.status;
                }
                return bool ? 'Unfollow' : 'Follow';
            } 
        }
    }
</script>
