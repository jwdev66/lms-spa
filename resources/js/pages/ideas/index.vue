<template>
  <card :title="$t('ideas')">
    {{ $t('failed_to_verify_email') }}

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
  created() {
        this.getIdeas();
    },

  methods: {
    async getIdeas () {
      // const { data } = await this.ideas.get('/api/ideas')
      // // Save the token.
      // await this.$store.dispatch('ideas/fetchIdeas', {
      //   ideas: data.ideas
      // })
      await ideas.get('/api/ideas').then(response => {            
            this.ideas = response.data;
        });
    }
  }

}
</script>
