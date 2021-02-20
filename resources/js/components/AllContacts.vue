<template>
    <div>
        <h3 class="text-center">All Contacts</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Zip Code</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="contact in contacts" :key="contact.id">
                <td>{{ contact.id }}</td>
                <td>{{ contact.name }}</td>
                <td>{{ contact.email }}</td>
                <td>{{ contact.phone }}</td>
                <td>{{ contact.zip }}</td>
                <td>{{ contact.address }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: contact.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteBook(contact.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
               contacts: []
            }
        },
        created() {
            this.axios
                .get('http://127.0.0.1:8000/api/contacts')
                .then(response => {
                    this.contacts = response.data;
                });
        },
        methods: {
            deleteBook(id) {
                this.axios
                    .delete(`http://127.0.0.1:8000/api/contact/delete/${id}`)
                    .then(response => {
                        let i = this.contacts.map(item => item.id).indexOf(id); // find index of your object
                        this.contacts.splice(i, 1)
                    });
            }
        }
    }
</script>