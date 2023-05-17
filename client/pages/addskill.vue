<template>
<div>

<label for="newSkill"> <h3> New Skill : </h3></label>
<input type="text" id="newSkill" v-model="skill.name"/>
<button type="button"  @click="addSkill" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Add Skill</button>

</div>
</template>


<script>
export default {
    data() {
        return {
            skill: {
                name: '',
                id: 1, 
            }
        };
    },
methods: {
    async addSkill() { 
        const data = {
            skill: this.skill.name,
        };
        const response = await this.$axios.$post("/addskill", data)
            .then(response => {
                console.log("Successfully Added Skill")
                this.$router.push("/")
            })
            .catch(error => {
                console.log(error)
            });
    }
    }
}
</script>