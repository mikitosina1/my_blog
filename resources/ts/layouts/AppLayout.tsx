import './AppLayout.scss';
import '@/components/core/core.scss';

import AppSidebar from '@/components/core/AppSidebar';
import AppTopbar from '@/components/core/AppTopbar';
import FloatingLayer from '@/components/core/FloatingLayer';

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
