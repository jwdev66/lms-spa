import Vue from 'vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faCog, faLock, faSignOutAlt, faUser } from '@fortawesome/free-solid-svg-icons'

import { faGithub } from '@fortawesome/free-brands-svg-icons'

// import { } from '@fortawesome/free-regular-svg-icons'

library.add(
  faUser, faLock, faSignOutAlt, faCog, faGithub
)

Vue.component('fa', FontAwesomeIcon)
