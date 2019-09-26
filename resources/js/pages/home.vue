<template>
  <card :title="$t('home')">
    {{ $t('you_are_logged_in') }}
    <router-link :to="{ name: 'ideas' }" active-class="active" class="nav-link">
      {{ $t('register') }}
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
