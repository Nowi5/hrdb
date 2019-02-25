<template>
    <div class="container">
        <alert-success :form="form" message="Login successful! You will be redirected."></alert-success>
        <alert-error :form="form" message="There were some problems with your input."></alert-error>
        <form @submit.prevent="login" @keydown="form.onKeydown($event)">
            <div class="form-group">
                <label>E-Mail</label>
                <input v-model="form.email" type="text" name="email"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                <has-error :form="form" field="email"></has-error>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input v-model="form.password" type="password" name="password"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                <has-error :form="form" field="password"></has-error>
            </div>

            <button :disabled="form.busy" type="submit" class="btn btn-primary">Log In</button>
        </form>


    </div>
</template>

<script>
    export default {
        data () {
            return {
                // Create a new form instance
                form: new Form({
                    email: '',
                    password: '',
                    remember: true
                })
            }
        },
        methods: {
            login () {
                // Submit the form via a POST request
                this.form.post('/login')
                    .then(({ data }) => {
                        if(data.location){
                            window.location.replace(data.location);
                        }
                    });
            }
        },
        mounted() {
            console.log('Component "Login" mounted.')
        }
    }
</script>
