export default [
    {
        label:'Summary',
        icon:'pi pi-fw pi-users',
        items:[
          {
              label:'Survey',
              icon:'pi pi-th-large',
              to: '/summary/surveys'                       
          },              
          {
              label:'Registrations',
              icon:'pi pi-fw pi-users',
              to: '/summary/registrations'                
          },
        ]
    },
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