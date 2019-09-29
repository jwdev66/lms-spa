<template>
  <card :title="$t('ideas')">
    <div class="container">
      <v-client-table
        :data="ideas"
        :columns="columns"
        :options="options"
      />
    </div>
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
    columns: ['id', 'user_id', 'title', 'description', 'type'],
    ideas: [],
    options: {
      headings: {
        id: 'ID',
        user_id: 'User',
        title: 'Title',
        description: 'Description',
        type: 'Type'
      },
      sortable: ['title', 'type'],
      filterable: ['title', 'type']
    }
  }),
  created () {
    this.getIdeas()
  },

  methods: {
    async getIdeas () {
      await axios.get('/api/ideas').then(response => {
        this.ideas = response.data.data
      })
    }
  }

}
</script>
