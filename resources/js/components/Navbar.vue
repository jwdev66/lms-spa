<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <router-link :to="{ name: user ? 'home' : 'welcome' }" class="navbar-brand">
        {{ appName }}
      </router-link>

      <button aria-controls="navbarToggler" aria-expanded="false" class="navbar-toggler" data-target="#navbarToggler"
              data-toggle="collapse" type="button">
        <span class="navbar-toggler-icon"/>
      </button>

      <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav">
          <locale-dropdown/>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li> -->
        </ul>

        <ul class="navbar-nav ml-auto">
          <!-- Authenticated -->
          <li class="nav-item dropdown" v-if="user">
            <a aria-expanded="false"
               aria-haspopup="true" class="nav-link dropdown-toggle text-dark" data-toggle="dropdown" href="#" role="button"
            >
              <img :src="user.photo_url" class="rounded-circle profile-photo mr-1">
              {{ user.name }}
            </a>
            <div class="dropdown-menu">
              <router-link :to="{ name: 'settings.profile' }" class="dropdown-item pl-3">
                <fa fixed-width icon="cog"/>
                {{ $t('settings') }}
              </router-link>

              <div class="dropdown-divider"/>
              <a @click.prevent="logout" class="dropdown-item pl-3" href="#">
                <fa fixed-width icon="sign-out-alt"/>
                {{ $t('logout') }}
              </a>
            </div>
          </li>
          <!-- Guest -->
          <template v-else>
            <li class="nav-item">
              <router-link :to="{ name: 'login' }" active-class="active" class="nav-link">
                {{ $t('login') }}
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'register' }" active-class="active" class="nav-link">
                {{ $t('register') }}
              </router-link>
            </li>
          </template>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
    import {mapGetters} from 'vuex'
    import LocaleDropdown from './LocaleDropdown'

    export default {
        components: {
            LocaleDropdown
        },

        data: () => ({
            appName: window.config.appName
        }),

        computed: mapGetters({
            user: 'auth/user'
        }),

        methods: {
            async logout() {
                // Log out the user.
                await this.$store.dispatch('auth/logout')

                // Redirect to login.
                this.$router.push({name: 'login'})
            }
        }
    }
</script>

<style scoped>
  .profile-photo {
    width: 2rem;
    height: 2rem;
    margin: -.375rem 0;
  }
</style>
