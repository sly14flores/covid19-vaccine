<template>
  <div :class="containerClass" @click="onWrapperClick">
    <AppTopBar @menu-toggle="onMenuToggle" />
    <transition name="layout-sidebar">
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
		<div class="layout-main">
			<router-view />
		</div>
		<AppFooter />    
  </div>
</template>

<script>

import AppTopBar from './AppTopbar.vue';
import AppProfile from './AppProfile.vue';
import AppMenu from './AppMenu.vue';
import AppFooter from './AppFooter.vue';

export default {
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
      menu : [
        {label: 'Dashboard', icon: 'pi pi-fw pi-home', to: '/'},
        {label: 'Responses', icon: 'pi pi-fw pi-th-large', to: '/responses'},
        {label: 'Registrations', icon: 'pi pi-fw pi-list', to: '/registrations'},
        {
            label:'Users',
            icon:'pi pi-fw pi-users',
            items:[
              {
                  label:'List',
                  icon:'pi pi-fw pi-users',
                  to: '/users'                       
              },              
              {
                  label:'New',
                  icon:'pi pi-fw pi-user-plus',
                  to: '/users/new'                  
              },
            ]
        }
      ]             
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
        return (this.layoutColorMode === 'dark') ? "assets/images/logo-white.svg" : "assets/images/logo.svg";
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