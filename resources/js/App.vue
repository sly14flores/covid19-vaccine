<template>
  <div>
    <Menubar :model="items">
        <template #start>
        </template>
        <template #end>
            <Button label="Logout" icon="pi pi-power-off" :style="{'margin-left': '0 .5em'}"/>
        </template>
    </Menubar>
    <router-view />
  </div>
</template>

<script>

import Menubar from 'primevue/menubar/sfc';
import InputText from 'primevue/inputtext/sfc';
import Button from 'primevue/button/sfc';

import router from './router';

export default {
  components: {
    Menubar,
    InputText,
    Button
  },
  data() {
    return {
      items: [
          {
              label:'Dashboard',
              icon:'pi pi-fw pi-home',
              command: () => { router.push('/')  }
          },
          {
              label:'Users',
              icon:'pi pi-fw pi-users',
              items:[
                {
                    label:'New',
                    icon:'pi pi-fw pi-user-plus',
                    command: () => { router.push('/users/new')  }                    
                },
                {
                    label:'List',
                    icon:'pi pi-fw pi-users',
                    command: () => { router.push('/users')  }                        
                },
              ]
          },
          {
              label:'Responses',
              icon:'pi pi-fw pi-reply',
              command: () => { router.push('/')  }
          },          
        ]      
    }
  }
}
</script>