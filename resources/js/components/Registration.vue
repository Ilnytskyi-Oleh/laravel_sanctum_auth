<template>
    <div class="w-25">
        <input type="email" v-model="email" placeholder="Email" class="form-control">
        <input type="text" v-model="name" placeholder="Name" class="form-control">
        <input type="password" v-model="password" placeholder="password" class="form-control">
        <input type="password" v-model="password_confirmation" placeholder="password_confirmation" class="form-control">
        <input type="submit" @click.prevent="register" value="Register" class="btn btn-primary">
    </div>
</template>

<script>
export default {
    name: "Registration",
    data() {
        return {
            email: null,
            password: null,
            name: null,
            password_confirmation: null,
        }
    },
    methods: {
        register() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/register', {
                    email: this.email,
                    name: this.name,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                })
                    .then(res => {
                        localStorage.setItem('x_xsrf_token', res.config.headers['X-XSRF-TOKEN'])
                        this.$router.push({name: 'user.personal'})
                    })
            });
        }
    }
}
</script>

<style scoped>

</style>
