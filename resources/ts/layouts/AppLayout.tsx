import './AppLayout.scss';

import {Outlet} from 'react-router-dom';

import {AppSidebar} from '@/components/core/sidebar';
import {AppTopbar} from '@/components/core/topbar';
import {FloatingLayer} from '@/components/core/floating';

import ScrollToTop from '@/components/core/ScrollToTop';

export default function AppLayout() {
    return (
        <div className="app-layout">
            <ScrollToTop/>

            <AppSidebar/>

            <AppTopbar/>

            <main className="app-layout__content">
                <Outlet/>
            </main>

            <FloatingLayer/>

        </div>
    );
}
