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
  }
}
</script>
