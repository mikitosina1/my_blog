import { createBrowserRouter } from 'react-router-dom';

import AppLayout from '@/layouts/AppLayout';

import About from '@/pages/About/About';
import Home from '@/pages/Home/Home';

const router = createBrowserRouter(
    [
        {
            path: '/',
            element: <AppLayout />,
            children: [
                {
                    index: true,
                    element: <Home />,
                },
                {
                    path: 'about',
                    element: <About />,
                },
            ],
        },
    ],
    {
        basename: '/react',
    },
);

export default router;