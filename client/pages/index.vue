<template>
<div>
    <div class="px-4 sm:px-0">
    <h3 class="text-base font-semibold leading-7 text-gray-900">Applicant Information</h3>
    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>
    </div>

<div class="mt-6 border-t border-gray-100">
    <dl class="divide-y divide-gray-100">
      <div id="Name" class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{resumes.Candidate.name}}</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Application for</dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">Kubernetes Devops Engineer</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">Email address</dt>
            <div class="mt-2 flex items-center gap-x-3">
            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{resumes.Candidate.email}}</dd>
            <nuxt-link to="/editemail"class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Update</nuxt-link>
          </div>

      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900">About</dt>
        <div class="flex flex-col">

          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
          I am Anthony Rozario, a highly skilled and experienced DevOps engineer with a strong background in creating, maintaining, and scaling developer infrastructure, I have demonstrated my ability to optimize processes and streamline operations. My achievements include successfully migrating data, optimizing build processes, and implementing automated container scanning. 
          As a Solutions Architect at Codefresh, I have collaborated with customers to drive successful adoption of solutions and managed complex demo environments. 
          With expertise in AWS, Docker, Kubernetes, and GitOps tools, I am well-prepared to contribute to Rimsys as a Senior DevOps Engineer, helping to streamline regulatory activities and accelerate product delivery for medical technology companies.
          </dd>
          <nuxt-link to="/editabout" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Update</nuxt-link>
      </div>
      </div>
      
      <div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Skills</dt>
          <dd class="mt-2 text-sm text-gray-900 sm:col-span-1 sm:mt-0">
            <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200" v-for="skill in resumes.Skills">
              <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                <div class="flex w-0 flex-1 items-center justify-end">
                  <div class="ml-4 flex min-w-0 flex-1 gap-2">
                    <span class="truncate font-medium">{{ skill.name }}</span>
                    <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" @click="deleteSkill(skill.id)">Delete</button>
                  </div>
                </div>
              </li>
            </ul>
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                  <nuxt-link to="/addskill" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 mt-4 sm:col-start-2">Add Skill</nuxt-link>
              </div>
          </dd>
        </div>
      </div>
      
<div class="mt-6 border-t border-gray-100">
  <h3 class="text-base font-semibold leading-7 text-gray-900">Experience</h3>
  <dl class="divide-y divide-gray-100">
    <template v-for="(exp, index) in resumes.Experience">
      <div :key="index" class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm font-medium leading-6 text-gray-900"> {{ exp.company_name }} </dt>
        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
          <div> {{ exp.job_title }} {{ exp.start_date }} - {{ exp.end_date }}</div>
          <br>
          <div>{{ exp.description }}</div>
          <nuxt-link to="/editexperience" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Update</nuxt-link>
          <button type="button"  @click="deleteExperience(exp.id)" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Delete</button>
        </dd>
      </div>
    </template>
    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
      <button type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 mt-4 sm:col-start-2">Add Experience</button>
    </div>
  </dl>
</div>

    </dl>
  </div>

</div>
</template>

<script lang="ts">
import Vue from 'vue'
import { Skill, Skills, Resume } from '@/types/resume.d'

export default Vue.extend ({

  data() {
    return {
      resumes : {}
    }
  },

  async fetch() {
    const response = await this.$axios.$get('/anthony')
      .then(response => {
        this.resumes = response.data
      })
      .then(error => {
        console.error("Could not fetch resume data")
      })
  },

methods: {
  deleteSkill(skillId: string) {

    const url = `/deleteskill/${skillId}`

    console.log(url)

    const response = this.$axios.$delete(url)
      .then(response => {
        // Handle the successful deletion, such as updating the UI
        console.log(`Skill with ID ${skillId} deleted successfully`);
        this.$toast.show({
          type: 'success',
          title: 'Success',
          message: 'Successfully Deleted Skill!',
        })
        location.reload(); 
      })
      .catch(error => {
        console.error(`Error deleting skill with ID ${skillId}`);
      });

  },
  deleteExperience(expID: string) {

    const url = `/deleteexperience/${expID}`
    console.log(url)
    const response = this.$axios.$delete(url)
      .then(response => {
        // Handle the successful deletion, such as updating the UI
        console.log(`Skill with ID ${expID} deleted successfully`);
        this.$toast.show({
          type: 'success',
          title: 'Success',
          message: 'Successfully Deleted Skill!',
        })
        location.reload(); 
      })
      .catch(error => {
        console.error(`Error deleting Experience with ID ${expID}`);
      });
  },
}
 
})
</script>
