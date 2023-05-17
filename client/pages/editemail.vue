<template>
<div>


<label for="emailaddr"> <h3> New Email : </h3></label>
<input type="text" id="emailaddr" v-model="email.value"/>
<button type="button"  @click="updateEmail" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Update</button>


</div>
</template>


<script>
export default {
    data() {
        return {
            email: {
                value: '',
                id: 1, 
            }
        };
    },
methods: {
    async updateEmail() { 
        const data = {
            id: this.email.id, 
            email: this.email.value,
        };
        const response = await this.$axios.$post("/editcandidate", data)
            .then(response => {
                console.log("Successfully updated Experience")
                this.$router.push("/")
            })
            .catch(error => {
                console.log(error)
            });

    }
    }
}
</script>