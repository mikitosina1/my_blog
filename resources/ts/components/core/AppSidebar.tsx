import Logo from "@/components/core/logo/Logo";
import Sidebar from "@/components/core/Sidebar";

export default function AppSidebar() {
    return (
        <aside className="app-sidebar">
            <div className="app-sidebar__header">
                <Logo />
            </div>

            <nav className="app-sidebar__navigation">
                <Sidebar />
            </nav>

            <footer className="app-sidebar__footer">

            </footer>
        </aside>
    );
}
