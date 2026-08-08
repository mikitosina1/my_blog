import './AppLayout.scss';

import { Outlet } from 'react-router-dom';

import { AppSidebar } from '@/components/core/sidebar';
import { AppTopbar } from '@/components/core/topbar';
import { FloatingLayer } from '@/components/core/floating';

export default function AppLayout() {
    return (
        <div className="app-layout">

            <AppSidebar/>

            <AppTopbar/>

            <main className="app-layout__content">
                <Outlet />
            </main>

            <FloatingLayer/>

        </div>
    );
}
