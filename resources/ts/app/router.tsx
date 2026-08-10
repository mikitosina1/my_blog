import { createBrowserRouter } from 'react-router-dom';

import AppLayout from '@/layouts/AppLayout';

import About from '@/pages/About/About';
import Home from '@/pages/Home/Home';

import modules from './generated/modules';

const coreRoutes = [
    {
        index: true,
        element: <Home />,
    },
    {
        path: 'about',
        element: <About />,
    },
];

const moduleRoutes = modules.flatMap(
    (module) => module.routes ?? [],
);

const router = createBrowserRouter(
    [
        {
            path: '/',
            element: <AppLayout />,
            children: [
                ...coreRoutes,
                ...moduleRoutes,
            ],
        },
    ],
    {
        basename: '/react',
    },
);

export default router;