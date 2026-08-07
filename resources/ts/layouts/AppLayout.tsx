import './AppLayout.scss';

import { AppSidebar } from '@/components/core/sidebar';
import { AppTopbar } from '@/components/core/topbar';
import { FloatingLayer } from '@/components/core/floating';

export default function AppLayout() {
    return (
        <div className="app-layout">

            <AppSidebar/>

            <AppTopbar/>

            <main className="app-layout__content">
                Content here
            </main>

            <FloatingLayer/>

        </div>
    );
}
