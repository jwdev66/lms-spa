<template>
  <card :title="$t('home')">
    <router-link :to="{ name: 'ideas' }" class="nav-link">
      {{ 'Ideas' }}
    </router-link>

    <router-link :to="{ name: 'table' }" class="nav-link">
      {{ 'Idea/Table' }}
    </router-link>
  </card>
</template>

<script>
export default {
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
