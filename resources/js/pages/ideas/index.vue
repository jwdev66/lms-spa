<template>
  <card :title="$t('ideas')">
    <h2>My Cool Idea </h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Type</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="idea in ideas" :key="idea.id">
          <td>{{ idea.id }}</td>
          <td>{{ idea.title }}</td>
          <td>asdasd</td>
        </tr>
      </tbody>
    </table>
  </card>
</template>

<script>
import axios from 'axios'

export default {
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('ideas') }
  },
  data: () => ({
    ideas: []
  }),
  created () {
    this.getIdeas()
  },

  methods: {
    async getIdeas () {
      await axios.get('/api/ideas').then(response => {
        this.ideas = response.data
      })
    }
  }

}
</script>
