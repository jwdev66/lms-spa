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

<style>
.VuePagination {
  text-align: center;
}

.vue-title {
  text-align: center;
  margin-bottom: 10px;
}

.vue-pagination-ad {
  text-align: center;
}

.glyphicon.glyphicon-eye-open {
  width: 16px;
  display: block;
  margin: 0 auto;
}

th:nth-child(3) {
  text-align: center;
}

.VueTables__child-row-toggler {
  width: 16px;
  height: 16px;
  line-height: 16px;
  display: block;
  margin: auto;
  text-align: center;
}

.VueTables__child-row-toggler--closed::before {
  content: "+";
}

.VueTables__child-row-toggler--open::before {
  content: "-";
}

.VueTables__search{
  float:left;
}

.VueTables__limit{
  float:right;
}

</style>
