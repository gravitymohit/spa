<template>
    <div>
        <h3 class="text-center">Add Contact</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addContact">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="contact.name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" v-model="contact.email">
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" v-model="contact.phone">
                    </div>
                    <div class="form-group">
                        <label>Zip</label>
                        <input type="text" class="form-control" v-model="contact.zip">
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Add Contact</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
               // image: '',
                contact: {}
            }
        },
        methods: {

            
            addContact() {

                this.axios
                    .post('/api/contact/store', this.contact)
                    .then(response => (
                        this.$router.push({name: 'home'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script> 