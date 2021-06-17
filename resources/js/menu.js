const summary = [
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
          {
            label:'Vaccination',
            icon:'pi pi-fw pi-desktop',
            to: '/summary/vaccination'
        },
        ]
    },    
]

const registrations = [
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
]

const users = [
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
]

const facilities = [
    {
        label:'Vaccination Facility',
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
]

const vaccines = [
    {
        label:'Vaccines Administration',
        icon:'pi pi-fw pi-desktop',
        to: '/scanners/vaccines'
    }    
]

const screening = [
    {
        label:'Screening',
        icon:'pi pi-search',
        to: '/vaccines/list/screening'
    }    
]

const inoculation = [
    {
        label:'Inoculation',
        icon:'pi pi-check-square',
        to: '/vaccines/list/inoculation'
    }    
]

const monitoring = [
    {
        label:'Monitoring',
        icon:'pi pi-fw pi-desktop',
        to: '/vaccines/list/monitoring'
    }    
]

export {
    summary,
    registrations,
    users,
    facilities,
    vaccines,
    screening,
    inoculation,
    monitoring
}

/*
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
        label:'Vaccination Facility',
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
        to: '/scanners/vaccines'
    }
]
*/