<template>
  <div>
    <h3>Add Resume Experience:</h3>
    <div>
      <label for="company-name">Company Name:</label>
      <input type="text" id="company-name" v-model="experience.companyName">
      </br>
    </div>
    <div>
      <label for="job-title">Job Title:</label>
      <input type="text" id="job-title" v-model="experience.jobTitle">
      </br>
    </div>
    <div>
      <label for="start-date">Start Date:</label>
      <input type="text" id="start-date" v-model="experience.startDate">
      </br>
    </div>
    <div>
      <label for="end-date">End Date:</label>
      <input type="text" id="end-date" v-model="experience.endDate">
      </br>
    </div>
    <div>
      <label for="description">Description:</label>
      <textarea id="description" type="text" v-model="experience.description"></textarea>
      </br>
    </div>
    <button type="button" @click="addExperience" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Update</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      experience: {
        companyName: '',
        jobTitle: '',
        startDate: '',
        endDate: '',
        description: '', 
      }
    };
  },

  methods: {
    async addExperience() {
       const data = {
        company_name: this.experience.companyName,
        job_title: this.experience.jobTitle,
        start_date: this.experience.startDate,
        end_date: this.experience.endDate,
        description: this.experience.description,
       };

    const response = await this.$axios.post('/addexperience' , data)
        .then(response => {
            console.log("Successfully added Experience")
            this.$router.push("/")
        })
        .catch(error => {
            console.log("Could not add experience")
        });

    }
  }
}
</script>
