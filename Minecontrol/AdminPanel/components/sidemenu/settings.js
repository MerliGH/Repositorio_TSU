export var menu = [
    {
        module: 'home',
        icon: 'home',
        title: ['Inicio', 'Home'],
        component: 'components/home'
    },
    {
        module: 'Mines',
        icon: 'map',
        title: ['Minas', 'Mines'],
        component: 'components/mines'
    },
    {
        module: 'Reports',
        icon: 'chart-bar',
        title: ['Informes', 'Reports'],
        component: 'components/reports'
    },
    {
        module: 'Inventories',
        icon: 'th-list',
        title: ['Inventarios', 'Inventories'],
        submenu: [
            {
                title: ["Empleaaados","Employees"]
            },
            {
                title: ["Clientes","Customers"]
            },
            {
                title: ["Minerales","Minerals"]
            },
            {
                title: ["Proveedores","Suppliers"]
            }
        ]
    },
    {
        module: 'settings',
        icon: 'cog',
        title: ['Editar perfil', 'Edit Profile'],
        submenu: [
            {
                title: ["Ajustes de cuenta","Account Settings"]
            },
            {
                title: ["Altas / bajas", "Employment / Separation"]
            },
            {
                title: ["Ver suscripciones","View Subscriptions"]
            }
        ]
    }
    
  
]