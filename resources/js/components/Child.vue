<template>
  <transition mode="out-in" name="page">
    <slot>
      <router-view />
    </slot>
  </transition>
</template>

<script>
export default {
  name: 'Child'
}
</script>
