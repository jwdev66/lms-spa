<template>
  <card :title="$t('ideas')">
    {{ $t('failed_to_verify_email') }}
  </card>
</template>

<script>
export default {
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('ideas') }
  },
  data: () => ({
    form: []
  }),

  methods: {
    async getIdeas () {
      const { data } = await this.form.get('/api/ideas')

      // Save the token.
      await this.$store.dispatch('ideas/fetchIdeas', {
        ideas: data.ideas
      })
    }
  }

}
</script>
