<template>
    <div class="container">
        <alert-success :form="form" message="Organization updated successfully!"></alert-success>
        <alert-error :form="form" message="There were some problems with your input."></alert-error>
        <form @submit.prevent="update" @keydown="form.onKeydown($event)">
            <div class="form-group">
                <label>Name*</label>
                <input v-model="form.name" type="text" name="name"
                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                <has-error :form="form" field="name"></has-error>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Website</label>
                        <input v-model="form.website" type="text" name="website"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('website') }">
                        <has-error :form="form" field="website"></has-error>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Mail Domain</label>
                        <input v-model="form.domain" type="text" name="domain" placeholder="@mail.com"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('domain') }">
                        <has-error :form="form" field="domain"></has-error>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Logo URL</label>
                        <input v-model="form.logo_url" type="text" name="logo_url" placeholder="http://mydomain/logo.png"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('logo_url') }">
                        <has-error :form="form" field="logo_url"></has-error>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Founded*</label>
                        <input v-model="form.founded" type="text" name="founded" placeholder="Year yyyy"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('founded') }">
                        <has-error :form="form" field="founded"></has-error>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea v-model="form.description" name="description" rows="4"
                               class="form-control" :class="{ 'is-invalid': form.errors.has('description') }">
                        </textarea>
                        <has-error :form="form" field="description"></has-error>
                    </div>
                </div>
            </div>

            <button :disabled="form.busy" type="submit" class="btn btn-primary">Save</button>
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
                    website: '',
                    logo_url: '',
                    description: '',
                    domain: '',
                    location_id: '',
                    founded: ''

                })
            }
        },
        methods: {
            load () {
                this.form.name = 'Loading...';
                axios.get("api/v1/organization")
                    .then(({ data }) => (this.form.fill(data)));
            },
            update () {
                // Submit the form via a POST request
                this.form.patch('/api/v1/organization')
                    .then(({ data }) => {
                        this.$vueEventBus.$emit('organizationUpdated')
                    });
            }
        },
        created() {
            this.load();
        },
        mounted() {
            console.log('Component "OrganizationForm" mounted.')
            this.$vueEventBus.$on('profileUpdated', this.load)
        },
        beforeDestroy() {
            this.$vueEventBus.$off('profileUpdated')
        }
    }
</script>
