<template>
    <div class="container">
        <alert-success :form="form" message="Profile updated successfully!"></alert-success>
        <alert-error :form="form" message="There were some problems with your input."></alert-error>
        <form @submit.prevent="update" @keydown="form.onKeydown($event)">
            <div class="form-group">
                <label>Username*</label>
                <input v-model="form.name" type="text" name="name"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                <has-error :form="form" field="name"></has-error>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>First name*</label>
                        <input v-model="form.firstname" type="text" name="firstname"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('firstname') }">
                        <has-error :form="form" field="firstname"></has-error>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Last name*</label>
                        <input v-model="form.lastname" type="text" name="lastname"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('lastname') }">
                        <has-error :form="form" field="lastname"></has-error>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Position*</label>
                        <input v-model="form.position_title" type="text" name="position_title"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('position_title') }">
                        <has-error :form="form" field="position_title"></has-error>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Organization*</label>
                        <input v-model="form.organization_name" type="text" name="organization_name"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('organization_name') }">
                        <has-error :form="form" field="organization_name"></has-error>
                    </div>
                </div>
            </div>

            <button :disabled="form.busy" type="submit" class="btn btn-primary">Update</button>
        </form>


    </div>
</template>

<script>
    export default {
        data () {
            return {
                // Create a new form instance
                form: new Form({
                    name: '',
                    firstname: '',
                    lastname: '',
                    position_title: '',
                    organization_name: ''

                })
            }
        },
        methods: {
            update () {
                // Submit the form via a POST request
                this.form.patch('/api/v1/user')
                    .then(({ data }) => {
                        this.$vueEventBus.$emit('profileUpdated')
                    });
            }
        },
        mounted() {
            console.log('Component "ProfileForm" mounted.')
        },
        created() {
            this.form.name = 'Loading...';

            axios.get("api/v1/user")
                .then(({ data }) => (this.form.fill(data)));
        }
    }
</script>
