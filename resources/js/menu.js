export default [
    {
        label:'Summary',
        icon:'pi pi-fw pi-chart-line',
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
        label:'Registrations',
        icon:'pi pi-fw pi-users',
        items:[
          {
              label:'List',
              icon:'pi pi-fw pi-users',
              to: '/registrations'                       
          },              
          {
              label:'New',
              icon:'pi pi-fw pi-user-plus',
              to: '/registrations/new' 
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
    },
    {
        label:'Hospitals',
        icon:'pi pi-fw pi-sitemap',
        items:[
          {
              label:'List',
              icon:'pi pi-fw pi-list',
              to: '/hospitals'                       
          },              
          {
              label:'New',
              icon:'pi pi-fw pi-plus-circle',
              to: '/hospitals/new'          
          },
        ]
    },
    {
        label:'Vaccines',
        icon:'pi pi-fw pi-desktop',
        to: '/scanners/scan'
    }
]