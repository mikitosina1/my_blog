import { createBrowserRouter } from 'react-router-dom';

import tr from '@/services/TranslationService';

import AppLayout from '@/layouts/AppLayout';

import About from '@/pages/About/About';

const router = createBrowserRouter(
    [
        {
            path: '/',
            element: <AppLayout />,
            children: [
                {
                    index: true,
                    element: <div>{tr.t('aside.home')}</div>,
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