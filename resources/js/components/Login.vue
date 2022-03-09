<template>
    <div class="w-25">
        <input type="email" v-model="email" placeholder="Email" class="form-control">
        <input type="password" v-model="password" placeholder="password" class="form-control">
        <input type="submit" @click.prevent="login" value="Login" class="btn btn-primary">
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            email: '',
            password: '',
        }
    },
    methods: {
        login() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login', {password: this.password, email: this.email})
                    .then(res => {
                        localStorage.setItem('x_xsrf_token', res.config.headers['X-XSRF-TOKEN'])
                        this.$router.push({name: 'user.personal'})
                    })
                    .catch(error => {
                        console.log(error.response);
                    })
            });
        }
    }
}
</script>

<style scoped>

</style>
