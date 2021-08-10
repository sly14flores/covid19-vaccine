<template>
  <div :class="containerClass" @click="onWrapperClick">
    <AppTopBar @menu-toggle="onMenuToggle" class="hidden" />
    <transition name="layout-sidebar" class="hidden">
      <div :class="sidebarClass" @click="onSidebarClick" v-show="isSidebarVisible()">
          <div class="layout-logo">
              <router-link to="/">
                  <img alt="Logo" :src="logo" />
              </router-link>
          </div>
          <AppProfile />
          <AppMenu :model="menu" @menuitem-click="onMenuItemClick" />
      </div>
    </transition>
    <component v-bind:is="pageComponent" class="layout-main"></component>
    <AppFooter class="hidden" />    
  </div>
</template>

<script>

import AppTopBar from './AppTopbar.vue';
import AppProfile from './AppProfile.vue';
import AppMenu from './AppMenu.vue';
import AppFooter from './AppFooter.vue';

import { useStore } from 'vuex';

import { summary, registrations, users, facilities, vaccines, vaccine_administration, reports } from './menu.js';

export default {
  props: ['pageComponent'],
  setup() {

    const store = useStore()

    const notAuth = store.state.profile.group_id != 4 && 5
    const _users =  (notAuth)?users:[]
    const _facilities = (notAuth)?facilities:[]
    const _reports = (notAuth)?reports:[]
    // const _screening = (isAdmin)?screening:[]
    // const _inoculation = (isAdmin)?inoculation:[]
    // const _monitoring = (isAdmin)?monitoring:[]

    const menu = [
      ...summary,
      ...registrations,
      ...vaccines,
      ...vaccine_administration,
      ..._reports,
      ..._facilities,
      ..._users,
      // ..._screening,
      // ..._inoculation,
      // ..._monitoring
    ]

    return {
      menu
    }

  },
  components: {
    AppTopBar,
    AppProfile,
    AppMenu,
    AppFooter
  },
  data() {
    return {
      layoutMode: 'static',
      layoutColorMode: 'dark',      
      staticMenuInactive: false,
      overlayMenuActive: false,
      mobileMenuActive: false,
    }
  },
  computed: {
    containerClass() {
        return ['layout-wrapper', {
          'layout-overlay': this.layoutMode === 'overlay',
          'layout-static': this.layoutMode === 'static',
          'layout-static-sidebar-inactive': this.staticMenuInactive && this.layoutMode === 'static',
          'layout-overlay-sidebar-active': this.overlayMenuActive && this.layoutMode === 'overlay',
          'layout-mobile-sidebar-active': this.mobileMenuActive,
          'p-input-filled': this.$appState.inputStyle === 'filled',
          'p-ripple-disabled': this.$primevue.ripple === false
        }];
    },
    sidebarClass() {
        return ['layout-sidebar', {
            'layout-sidebar-dark': this.layoutColorMode === 'dark',
            'layout-sidebar-light': this.layoutColorMode === 'light'
        }];
    },
    logo() {
        return (this.layoutColorMode === 'dark') ? "img/logo-banner2.png" : "img/logo.png";
    }    
  },
  methods: {
    onWrapperClick() {
        if (!this.menuClick) {
            this.overlayMenuActive = false;
            this.mobileMenuActive = false;
        }

        this.menuClick = false;
    },
    onMenuToggle() {
      this.menuClick = true;

      if (this.isDesktop()) {
        if (this.layoutMode === 'overlay') {
            if(this.mobileMenuActive === true) {
              this.overlayMenuActive = true;
            }

          this.overlayMenuActive = !this.overlayMenuActive;
          this.mobileMenuActive = false;
        }
        else if (this.layoutMode === 'static') {
                this.staticMenuInactive = !this.staticMenuInactive;
          }
      }
      else {
        this.mobileMenuActive = !this.mobileMenuActive;
      }

      event.preventDefault();
    },
    onSidebarClick() {
        this.menuClick = true;
    },
    onMenuItemClick(event) {
        if (event.item && !event.item.items) {
            this.overlayMenuActive = false;
            this.mobileMenuActive = false;
        }
    },    
    isDesktop() {
        return window.innerWidth > 1024;
    },
    isSidebarVisible() {
        if (this.isDesktop()) {
            if (this.layoutMode === 'static')
                return !this.staticMenuInactive;
            else if (this.layoutMode === 'overlay')
                return this.overlayMenuActive;
            else
                return true;
        }
        else {
            return true;
        }
    },    
  }
}
</script>

<style scoped>
img{
  height: 45px;
}
@media print
{    
    .hidden, .hidden *
    {
        display: none !important;
    }
}
</style>