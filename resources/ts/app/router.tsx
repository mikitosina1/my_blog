import { createBrowserRouter } from 'react-router-dom';

import tr from '@/services/TranslationService';

import AppLayout from '@/layouts/AppLayout';

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
                    element: <div>{tr.t('aside.about')}</div>,
                },
            ],
        },
    ],
    {
        basename: '/react',
    },
);

export default router;