<template>
  <li class="nav-item dropdown">
    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle"
       data-toggle="dropdown" href="#" role="button"
    >
      {{ locales[locale] }}
    </a>
    <div class="dropdown-menu">
      <a :key="key" @click.prevent="setLocale(key)" class="dropdown-item" href="#"
         v-for="(value, key) in locales"
      >
        {{ value }}
      </a>
    </div>
  </li>
</template>

<script>
    import {mapGetters} from 'vuex'
    import {loadMessages} from '~/plugins/i18n'

    export default {
        computed: mapGetters({
            locale: 'lang/locale',
            locales: 'lang/locales'
        }),

        methods: {
            setLocale(locale) {
                if (this.$i18n.locale !== locale) {
                    loadMessages(locale)

                    this.$store.dispatch('lang/setLocale', {locale})
                }
            }
        }
    }
</script>
